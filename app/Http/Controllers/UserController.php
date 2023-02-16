<?php

namespace App\Http\Controllers;

use App\Models\ClassCourse;
use App\Models\Lecture;
use App\Models\MasterClass;
use App\Models\MasterCourse;
use App\Models\MasterStudent;
use App\Models\MasterTask;
use App\Models\MasterTrainer;
use App\Models\Task;
use App\Models\TaskDetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class UserController extends Controller
{
    public function index(Request $request){

        $auth_user = Auth()->user();

        if($auth_user){
            if($auth_user->role_id == 3){
                // $try = MasterClass::where('id',1)->with('master_course')->get();
                $user = MasterStudent::where('user_id',$auth_user->id)->with('user','master_class')->first();
                $notifications = $auth_user->unreadNotifications;
                $routeName = \Route::currentRouteName();
                return view('dashboard.index',compact('user','notifications','routeName'));
            }elseif($auth_user->role_id == 2){
                $user = MasterTrainer::where('user_id',$auth_user->id)->with('user')->with(['master_course'=>function($query){
                    $query->with('list_class')->get();}])->first();
                $notifications = $auth_user->unreadNotifications;
                $routeName = \Route::currentRouteName();
                return view('dashboard.index',compact('user','notifications','routeName'));
            }else{
                $user = User::where('id',$auth_user->id)->first();
                $notifications = $auth_user->unreadNotifications;
                $routeName = \Route::currentRouteName();
                return view('dashboard.index',compact('user','notifications','routeName'));
            }
        }else{
            return redirect()->route('home.index');
        }
    }

    public function my_class(){
        $this_user = Auth()->user();
        if($this_user->role_id == 3){
            // $user = MasterStudent::where('user_id',$this_user->id)->with(['user'=>function($query){
            //     $query->with('personal_detail')->first();
            // }])->with(['master_class'=> function($query){
            //     $query->with(['course'=>function($query){
            //         $query->with(['master_trainer'=> function($query){
            //             $query->with('user')->get();
            //         }])->get();
            //     }])->get();
            // }])->first();

            $user = MasterStudent::
            with('master_class')
            ->join('class_courses','class_courses.class_id','=','master_students.class_id')
            ->with('user')->with(['master_class'=>function($query){
                $query->with(['course'=>function($query){
                    $query->with(['master_trainer' =>function($query){
                        $query->with('user')->get();
                    }])->get();
                }])->get();
            }])
            ->where('user_id',$this_user->id)
            ->first();

            // $ti
            $all_course = MasterStudent::rightjoin('class_courses','class_courses.class_id','=','master_students.class_id')
            ->where('master_students.user_id',$this_user->id)
            ->join('master_classes','master_classes.id','=','master_students.class_id')
            ->join('master_courses','master_courses.id','=','class_courses.course_id')
            ->join('master_trainers','master_trainers.id','=','master_courses.trainer_id')
            ->join('users','users.id','=','master_trainers.user_id')
            ->select(
                'class_courses.day as course_day',
                'master_courses.name as course_name',
                'master_classes.id as class_id',
                'master_trainers.id as trainer_id',
                'users.name as trainer_name',
                DB::raw('CONCAT(class_courses.start_time,"-",class_courses.end_time) as course_time'),
                'master_courses.photo as course_photo')
            ->get();


            // $myyh = ClassCourse::where('class_id',$user->class_id)->get();

            // $user = MasterStudent::
            //         join('class_courses','class_courses.class_id','=','master_students.class_id')
            //         ->join('master_classes','master_classes.id','=','master_students.class_id')
            //         ->join('master_courses','master_courses.id','=','class_courses.course_id')
            //         ->join('master_trainers','master_trainers.id','=','master_courses.trainer_id')
            //         ->join('users','users.id','=','master_trainers.user_id')
            //         ->where('master_students.user_id',$this_user->id)
            //         ->select('master_students.id as student_id','master_courses.name as course_name','master_classes.id as class_id','class_courses.day as course_day','master_trainers.id as trainer_id','users.name as trainer_name')
            //         ->first();

            // $user = MasterStudent::join('class_courses','class_courses.class_id','=','master_students.class_id')->where('master_students.user_id',$this_user->id)->first();

            $classmate = MasterStudent::where('class_id',$user->class_id)->with('master_class')->with(['user'=>function($query){
                $query->with('personal_detail')->get();
            }])->get();

            $routeName = \Route::currentRouteName();

            return view('user.student.my_class.index',compact('user','classmate','routeName','all_course'));

        }else if($this_user->role_id == 2){

            $user = MasterTrainer::where('user_id',$this_user->id)->with('user')->with(['master_course'=> function($query){
                $query->with('list_class')->get();
            }])->first();

            $my_class = MasterCourse::where('trainer_id',$user->id)->with('list_class')->first();

            $routeName = \Route::currentRouteName();

            return view('user.trainer.my_class.index',compact('user','my_class','routeName'));
        }
    }

    // public function enter_course(Request $request,$class_id,$course_id){
    //     $this_user = Auth()->user();
    //     if($this_user->role_id == 3){
    //         $user = MasterStudent::where('user_id',$this_user->id)->with(['user'=>function($query){
    //             $query->with('personal_detail')->first();
    //         }])->with(['master_class'=> function($query){
    //             $query->with(['course'=>function($query){
    //                 $query->with(['master_trainer'=> function($query){
    //                     $query->with('user')->get();
    //                 }])->get();
    //             }])->get();
    //         }])->first();
    //     }elseif($this_user->role_id == 2){
    //         $user = MasterTrainer::where('user_id',$this_user->id)
    //         ->with('user')->
    //         with(['master_course'=> function($query){
    //             $query->with('list_class')->get();
    //         }])
    //         ->first();
    //         $my_class = MasterCourse::where('trainer_id',$user->id)->with('list_class')->get();
    //         return view('user.trainer.enter_course.index',compact('user'));
    //     }
    //     return view('user.student.my_course.index',compact('user','my_class'));
    // }

    public function enter_course(Request $request,$trainer_id,$class_id){
        
        $auth_user = Auth()->user();
        
        if($auth_user->role_id == 3){

            $user = MasterStudent::where('user_id',$auth_user->id)->with('user','master_course')->first();

            $my_class = MasterClass::where('id',$class_id)->with('course')->first();

            $my_course = MasterCourse::where('id',$trainer_id)->first();

            $routeName = \Route::currentRouteName();

            return view('user.my_course.index',compact('user','my_class','my_course','routeName'));

        }elseif($auth_user->role_id == 2){

            $user = MasterTrainer::where('user_id',$auth_user->id)->with('user')->with('master_course')->first();

            $my_class = MasterClass::where('id',$class_id)->with('course')->first();

            $my_course = MasterCourse::where('id',$trainer_id)->first();

            $routeName = \Route::currentRouteName();

            // dd($my_class);
            
            // return view('user.trainer.enter_course.index',compact('user','my_class'));
            return view('user.my_course.index',compact('user','my_class','my_course','routeName'));
        }
    }

    public function my_detail(Request $request){
        $this_user = Auth()->user();
        switch($this_user->role_id){
            case "3":
                $user = User::
                with('personal_detail')
                ->join('personal_details','personal_details.user_id','=','users.id')
                ->join('roles','roles.id','=','users.role_id')
                ->join('master_students','master_students.user_id','=','users.id')
                ->where('users.id',$this_user->id)
                ->join('master_classes','master_classes.id','=','master_students.class_id')
                ->select('users.id as id','users.name','users.email','master_classes.name as class_name',DB::raw('CONCAT(personal_details.first_name," ",personal_details.last_name) as fullname'),'roles.name as role','roles.id as role_id')
                ->first();
                break;
            case "2":
                $user = User::
                with('personal_detail')
                ->join('personal_details','personal_details.user_id','=','users.id')
                ->join('roles','roles.id','=','users.role_id')
                ->join('master_trainers','master_trainers.user_id','=','users.id')
                ->join('master_courses','master_courses.trainer_id','=','master_trainers.id')
                ->where('users.id',$this_user->id)
                ->select('users.id as id','users.name','users.email',DB::raw('CONCAT(personal_details.first_name," ",personal_details.last_name) as fullname'),'roles.name as role','roles.id as role_id','master_courses.name as course_name')
                ->first();
                break;
            case "1":
                $user = User::
                with('personal_detail')
                ->join('personal_details','personal_details.user_id','=','users.id')
                ->join('roles','roles.id','=','users.role_id')
                ->where('users.id',$this_user->id)
                ->select('users.id as id','users.name','users.email',DB::raw('CONCAT(personal_details.first_name," ",personal_details.last_name) as fullname'),'roles.name as role','roles.id as role_id')
                ->first();
                break;
        }
        $notifications = $this_user->unreadNotifications;
        $routeName = \Route::currentRouteName();
        return view('dashboard.my_detail.index',compact('user','notifications','routeName'));
    }

    // public function fetch_course_by_class(){
    //     $this_user = Auth()->user();
    //     $trainer = MasterTrainer::where('user_id',$this_user->id)->with('user')->with(['master_course'=> function($query){
    //         $query->with(['list_class'=> function($query){
    //             $query->where('class_id',)
    //         }])->get();
    //     }])->first();
    //     return response()->json([
    //         'trainer' => $trainer
    //     ]);
    // }

    public function fetch_lecture(Request $request,$trainer_id,$class_id){
        $lecture = Lecture::where('trainer_id',$trainer_id)->where('class_id',$class_id)->get();
        return response()->json([
            'lecture' => $lecture
        ]);
    }

    public function fetch_task(Request $request,$trainer_id,$class_id){
        $task = MasterTask::where('trainer_id',$trainer_id)->where('class_id',$class_id)->with(['task'=>function($query){
            $query->with('task_detail')->get();
        }])->get();
        // $task_detail = TaskDetail::where('task_id',$task->id)->with('task')->first();
        return response()->json([
            'tasks' =>$task,
            // 'task_detail' => $task_detail,
        ]);
    }

    public function fetch_timetable($trainer_id){
        $trainer = MasterTrainer::join('class_courses','class_courses.course_id','=','master_trainers.id')
                                ->where('master_trainers.id',$trainer_id)
                                ->first();

        $startDate = Carbon::parse('01-05-2023');
        $endDate = Carbon::parse('30-06-2023');



        $days = $startDate->diffInDaysFiltered(function (Carbon $date){
            return $date->isWeekday();
        }, $endDate);

        $carbon = Carbon::parse($startDate)->diffInDays(Carbon::parse($endDate));

        return $days;
    }
}
