<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\MasterClass;
use App\Models\MasterCourse;
use App\Models\MasterStudent;
use App\Models\MasterTask;
use App\Models\MasterTrainer;
use App\Models\Task;
use App\Models\TaskDetail;
use App\Models\TaskSubmit;
use App\Models\User;
use App\Notifications\NewTask;
use App\Notifications\ResponseTaskSubmit;
use App\Notifications\StudentAttempt;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Facades\Notification;

class TaskController extends Controller
{
    public function store(Request $request){

        // $this->authorize('create_task');

        $file_format = [
            'application/pdf',
            'text/plain',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'application/vnd.ms-powerpoint',
            'application/json',
            'text/css',
            'text/csv',
            'text/html',
        ];

        $image_format = [
                    'image/png',
                    'image/svg+xml',
                    'image/webp',
                    'image/x-icon',
                    'image/jpeg',
        ];
        
        $video_format = [
            'video/mp4',
            'video/x-matroska',
            'video/mpeg',
            'video/x-ms-wmv',
            'video/x-flv',
            'video/x-m4v',
        ];

        $file_json=[];
        $image_json=[];
        $video_json=[];
        $other_json=[];

        foreach($request->file() as $this_file){
            $filename = $this_file->getClientOriginalname();
            $this_file->move(public_path('task_file'), $filename);
            if(in_array($this_file->getClientMimeType(),$file_format)){
                array_push($file_json,$filename);
            }elseif(in_array($this_file->getClientMimeType(),$image_format)){
                array_push($image_json,$filename);
            }elseif(in_array($this_file->getClientMimeType(),$video_format)){
                array_push($video_json,$filename);
            }else{
                array_push($other_json,$filename);
            };

        }

        $all_students = MasterStudent::where('class_id',$request->task_class_id)->get();


        $master_task_data = [
            'trainer_id' => $request->task_trainer_id,
            'class_id' => $request->task_class_id,
            'title' => $request->task_title,
            'date_start' => $request->task_date_start,
            'date_end' => $request->task_date_end,
            'time_start' => $request->task_time_start,
            'time_end' => $request->task_time_end,
        ];

        $master_task = new MasterTask($master_task_data);
        $master_task->save();

        $course_of_task = MasterCourse::where('id',$master_task->trainer_id)->first();

        if($all_students){
            foreach($all_students as $student){
    
                $task_data = [
                    'master_task_id'=> $master_task->id,
                    'student_id' => $student->id,
                ];

                $task = new TaskSubmit($task_data);
                $task->save();
    
                // $task = Task::create($task_data);
    
                $task_detail = [
                    'master_task_id'=> $master_task->id,
                    'description_one' => $request->task_description_one,
                    'description_two' => $request->task_description_two,
                    'file' => $file_json,
                    'image' => $image_json,
                    'video' => $video_json,
                    'other' => $other_json,
                ];

                $task_details = new TaskDetail($task_detail);
                $task_details->save();

                $user_student = User::where('id',$student->user_id)->first();

                Notification::send($user_student,new NewTask($master_task->title,$course_of_task->id,$master_task->date_end));
                
            }
            return response()->json([
                'status' => 200,
                'message' => 'Task added succesfully'
            ]);
        }else{
            return response()->json([
                'status' => 200,
                'message' => 'Task added succesfully'
            ]);
        }
    }

    public function fetch_task(Request $request,$trainer_id,$class_id){
        $task = MasterTask::where('trainer_id',$trainer_id)->where('class_id',$class_id)->with('task_detail','task_student')->get();
        // $task_detail = TaskDetail::where('task_id',$task->id)->with('task')->first();
        return response()->json([
            'tasks' =>$task,
            // 'task_detail' => $task_detail,
        ]);
    }

    public function fetch_all_task(Request $request,$trainer_id,$class_id){
        $all_task = MasterTask::where('trainer_id',$trainer_id)->where('class_id',$class_id)->get();
        return response()->json([
            'all_task' => $all_task,
        ]);
    }

    public function fetch_student_this_task(Request $request,$task_id){

        $all_student = TaskSubmit::join('master_students','master_students.id','=','task_students.student_id')
        ->select('master_students.*')
        ->join('users','users.id','=','master_students.user_id')
        ->select('users.*')
        ->join('personal_details','personal_details.user_id','=','users.id')
        // ->select(DB::raw("CONCAT(personal_details.first_name,' ',personal_details.last_name) AS full_name"),'task_students.file_submitted AS file_submit','task_students.date_submit AS date_submit')
        ->select(DB::raw("CONCAT(personal_details.first_name,' ',personal_details.last_name) AS full_name"),'task_students.date_submit AS date_submit','master_students.id','task_students.master_task_id as task_student_id')
        ->where('task_students.master_task_id',$task_id)
        ->get();

        return DataTables::of($all_student)->addIndexColumn()->
        // ->addColumn('actions',functon($row){
        //     // $btn = '<button class="btn btn-success me-1" type="button"><i class="fa-sharp fa-solid fa-circle-check"></i></button>
        //     // <button class="btn btn-danger me-1" type="button"><i class="fa-solid fa-circle-xmark"></i></button>
        //     // <button class="btn btn-danger" type="button"><i class="fa-solid fa-circle-xmark"></i></button>';
        //     return $btn;
        // })->addColumn('mark',function($row){
        //     $btn = '<input type="text" class="form-control w-100" style="width:1000px">';
        //     return $btn;
        addColumn('file_submit',function($row){
            $btn = '<button class="btn btn-success me-1 ViewSubmittedFile" type="button" class="view_file_submit" value="" submitted_student_id="'.$row->id.'" submitted_task_id="'.$row->task_student_id.'" data-bs-toggle="modal" data-bs-target="#view_submitted_Modal">View File</button>';
            return $btn;
        })->
        addColumn('actions',function($row){
            $btn = '<button class="btn btn-success me-1 btnResponseTask" type="button" data-bs-toggle="modal" data-bs-target="#response_submitted_Modal" this_task_id="'.$row->task_student_id.'" this_student_id="'.$row->id.'" value="1">Approve</button>
                    <button class="btn btn-danger me-1 btnResponseTask" type="button" data-bs-toggle="modal" data-bs-target="#response_submitted_Modal" this_task_id="'.$row->task_student_id.'" this_student_id="'.$row->id.'" value="0">Reject</button>';
            return $btn;
        })
        ->rawColumns(['file_submit','actions'])->make(true);

        // $all_task = MasterTask::where('id','master_task_id')->get();
        // return response()->json([
        //     'all_student'=>$all_student,
        //     // 'all_task'=> $all_task,
        // ]);
    }

    public function store_attempt(Request $request){

        
        $student = MasterStudent::where('id',$request->attempt_user_id)->with('user')->first();
        $task = MasterTask::where('id',$request->attempt_task_id)->first();
        $task_student = TaskSubmit::where('master_task_id',$request->attempt_task_id)->where('student_id',$request->attempt_user_id)->first();
        $current_date = Carbon::now()->format('Y-m-d');
        $current_time = Carbon::now()->format('H:i:m');
        $trainer = MasterTrainer::where('id',$task->trainer_id)->with('user')->first();
        $trainer_user = User::where('id',$trainer->user_id)->first();
        
        if($request->file()){
            $file_iterator = 1;
            $attempt_file =[];
            foreach ($request->file() as $file) {
                $filename = $student->user->name.$task->id.Carbon::now()->format('dmY').'.'.$file->getClientOriginalExtension();
                $file->move(public_path('task_submit'),$filename);
                $attempt_file[$file_iterator] = $filename;
                $file_iterator ++;
            }
        }else{
            $attempt_file =[];
        };
        
        $text_attempt = [
            "title" => $request->attempt_task_title,
            "description" => $request->attempt_task_description,
        ];
        
        $task_student->file_submitted = $attempt_file;
        $task_student->text_attempt = $text_attempt;
        $task_student->date_submit = $current_date;
        $task_student->time_submit = $current_time;
        $task_student->is_finish = true;
        // $updated_data_attempt = [
            //     'file_submitted' =>$attempt_file,
        //     ' text_attempt' => $text_attempt,
        //     ' date_submit' => $current_date,
        //     ' time_submit' => $current_time,
        //     ' is_finish' => true,
        // ];
        $task_student->save();

        Notification::send($trainer_user,new StudentAttempt($student->id,$task->id));

        return response()->json([
            'message' => 'Your attempts have been sent !',
            'status' => 200,
        ],200);
    }

    public function fetch_attempt(Request $request,$student_id,$task_attempt_id){
        $task_attempt = TaskSubmit::where('student_id',$student_id)->where('master_task_id',$task_attempt_id)->with('master_task')->first();
        $student = MasterStudent::
        join('personal_details','personal_details.user_id','=','master_students.user_id')
        ->select(DB::raw('CONCAT(personal_details.first_name," ",personal_details.last_name) AS student_fullname'))
        ->where('master_students.id',$student_id)
        ->first();
        
        return response()->json([
            'student' => $student,
            'task_attempt' => $task_attempt
            // 'request' => $request,
            // 'student_id' => $student_id,
            // 'task_attempt_id' => $task_attempt_id,
        ],200);
    }

    public function response_submit_task(Request $request){

        $task_students = TaskSubmit::with('master_task')->where('master_task_id',$request->task_id)->where('student_id',$request->student_id)->first();

        $task_students->approved = $request->result_id; 
        $task_students->mark = $request->response_task_mark; 
        $task_students->comment = $request->response_task_comment; 
        $task_students->save();

        $student = MasterStudent::where('id',$task_students->student_id)->first();
        $user = User::where('id',$student->user_id)->first();

        if($request->result_id == 1){
            $response_task = 'approved';
        }else{
            $response_task = 'rejected';
        }
        
        Notification::send($user, new ResponseTaskSubmit('Your task have been ',$response_task,' by your trainer.'));

        return response()->json([
            'status' => 200,
            'message' => 'Your response have been sent !'
        ]);
    }
}
