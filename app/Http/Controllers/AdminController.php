<?php

namespace App\Http\Controllers;

use App\Models\LeaveApplication;
use App\Models\MasterStudent;
use App\Models\PersonalDetail;
use App\Models\User;
use App\Notifications\ResponseLeave;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Yajra\DataTables\DataTables as DataTablesDataTables;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    public function list_user_index(){
        $user = Auth()->user();
        $notifications = $user->unreadNotifications;
        $routeName = \Route::currentRouteName();
        return view('user.admin.list_user.index',compact('user','notifications','routeName'));
    }

    public function list_user_fetch(){
        // $user_list = User::join('personal_details','personal_details.id','=','users.id')
        //             ->join('roles','roles.id','=','users.role_id')
        //             ->select('users.id',DB::raw("CONCAT(personal_details.first_name,' ',personal_details.last_name) as fullname"),'users.email','roles.name')
        //             ->get();
        $user_list = User::
        join('roles','roles.id','=','users.role_id')
        ->select('users.id as id','users.name AS name','users.email AS email','roles.name as role')
        ->get();

        return DataTables::of($user_list)->addIndexColumn()->addColumn('actions',function($row){
            $btn = '<button class="btn btn-success btn-sm">View</button>
            <button class="btn btn-warning btn-sm">Notify</button>
            <button class="btn btn-danger btn-sm">Delete</button>';
            return $btn;
        })->rawColumns(['actions'])->make(true);
    }

    public function list_leave_index(){
        $user = Auth()->user();
        $notifications = $user->unreadNotifications;
        $routeName = \Route::currentRouteName();
        return view('user.admin.list_leave.index',compact('user','notifications','routeName'));
    }

    public function list_leave_fetch(){
        $list_leave = LeaveApplication::
        with(['user'=>function($query){
            $query->with('personal_details')->get();
        }])
        ->join('personal_details','personal_details.user_id','=','leave_applications.user_id')
        ->select(
            DB::raw('leave_applications.user_id as userid'),
            'leave_applications.id AS id',
            DB::raw('CONCAT(personal_details.first_name," ",personal_details.last_name) AS fullname'),
            'leave_applications.title as title',
            DB::raw('CONCAT(leave_applications.start_date," - ",leave_applications.end_date) AS date'),
            'leave_applications.support_file AS file',
            )
        ->get();
        return DataTables::of($list_leave)->addIndexColumn()
        ->addColumn('detail',function($row){
            $btn = '<button class="btn btn-success btn-sm btnViewLeaveDetail" value="'.$row->userid.'" leave_id="'.$row->id.'" data-bs-toggle="modal" data-bs-target="#view_leave_file_Modal">View</button>';
            return $btn;
        })
        ->rawColumns(['detail'])->make(true);
    }

    public function view_leave_detail($leave_id){
        $leave_detail = LeaveApplication::where('id',$leave_id)->with('user')->first();
        return $leave_detail;
    }

    public function response_leave(Request $request){
        // dd($request);
        $leave_application = LeaveApplication::with('leave_status')
        ->where('id',$request->leave_id)->first();
        $user = User::where('id',$leave_application->user_id)->first();

        $leave_application->status_id = $request->response_leave;
        $leave_application->save();

        Notification::send($user,new ResponseLeave('Your leave application start at ',$leave_application->start_date,' have been '.$leave_application->leave_status->name));

        return response()->json([
            'status' => 200,
            'message' => 'Your response have been successfully sent !',
        ],200);

    }

    public function list_student_index(){
        $user = Auth()->user();
        $notifications = $user->unreadNotifications;
        $routeName = \Route::currentRouteName();
        return view('user.admin.list_student.index',compact('user','notifications','routeName'));
    }

    public function list_student_fetch(){
        $students = MasterStudent::join('users','users.id','=','master_students.user_id')
                                    ->join('master_classes','master_classes.id','=','master_students.class_id')
                                    ->select('master_students.id as id','users.name as username','users.email as email','master_classes.name as class')
                                    ->get();
        return DataTables::of($students)->addIndexColumn()
                            ->addColumn('actions',function($row){
                                $btn = '<button class="btn btn-success btn-sm">View</button>
                                        <button class="btn btn-warning btn-sm">Notify</button>
                                        <button class="btn btn-danger btn-sm">Remove</button>';
                                        return $btn;
                            })
                            ->rawColumns(['actions'])->make(true);
    }

    public function store_student(Request $request){
        // ADD JOIN DATE LATER

        $curr_date = Carbon::today()->toDateString();

        $new_user_data = [
            'name' => $request->new_student_name,
            'email' => $request->new_student_name.'@mirha.com',
            'password' => Hash::make($request->new_student_password),
            'role_id' => 3,
            'date_join' => $curr_date,
        ];

        $new_user = User::create($new_user_data);

        $new_student_data = [
            'user_id' => $new_user->id,
            'class_id' => $request->new_student_class,
        ];

        MasterStudent::create($new_student_data);

        $file = $request->file('new_student_photo');
        $filename = $file->getClientOriginalName().'-'.$curr_date.'.'.$file->getClientOriginalExtension();
        $file->move(public_path('images/user_photo/'),$filename);


        $personal_detail_data = [
            'user_id' => $new_user->id,
            'first_name' => $request->new_student_first_name,
            'last_name' => $request->new_student_last_name,
            'phone_no' => $request->new_student_phone_no,
            'ic_number' => $request->new_student_ic_number,
            'date_born' => $request->new_student_date_born,
            'full_address' => $request->new_student_full_address,
            'photo' => $filename,
        ];

        PersonalDetail::create($personal_detail_data);

        return response()->json([
            'status' => 200,
            'message' => 'New Student have been registered !',
        ],200);
    }

    public function view_certificate(){
        $user = Auth()->user();
        $notifications = $user->unreadNotifications;
        return view('user.admin.generate_certificate.index',compact('user','notifications'));
    }

    public function generate_certificate(){
        $pdf = \PDF::loadView('template.student_certificate');
        $pdf->setOption('enable-javascript', true);
        $pdf->setOption('javascript-delay', 5000);
        $pdf->setOption('enable-smart-shrinking', true);
        $pdf->setOption('no-stop-slow-scripts', true);
        return $pdf->download('student_certificate.pdf');
    }
}
