<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\LeaveApplication;
use App\Models\MasterStudent;
use App\Models\MasterTrainer;
use App\Models\User;
use App\Notifications\ApplyLeave;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class LeaveController extends Controller
{
    public function index(){
        
        $auth_user = Auth()->user();
        
        if($auth_user){
            if($auth_user->role_id == 3){
                // $try = MasterClass::where('id',1)->with('master_course')->get();
                $user = MasterStudent::where('user_id',$auth_user->id)->with('user','master_class')->first();
                $notifications = $auth_user->unreadNotifications;
                return view('user.my_leave.index',compact('user','notifications'));
            }elseif($auth_user->role_id == 2){
                $user = MasterTrainer::where('user_id',$auth_user->id)->with('user')->with(['master_course'=>function($query){
                    $query->with('list_class')->get();}])->first();
                $notifications = $auth_user->unreadNotifications;
                return view('user.my_leave.index',compact('user','notifications'));
            }
        }else{
            return redirect()->route('home.index');
        }


    }

    public function store(Request $request){
        
        dd($request->file());
        
        $user_apply = User::where('id',$request->leave_user_id)->first();

        $curr_date = Carbon::today()->format('d-m-Y');

        $admins = User::where('isAdmin',true)->get();

        $support_file = [];
        if($request->file()){
            $iterator = 1;
            foreach($request->file() as $file){
                $filename = $user_apply->name.'-apply-leave.'.$curr_date.'.'.$file->getClientOriginalExtension();
                $file->move(public_path('leave_appliation_file'),$filename);
                $support_file[$iterator] = $filename;
                $iterator++;
            }
        }

        $leave_data = [
            'user_id' => $user_apply->id,
            'title' => $request->leave_title,
            'description_one' => $request->leave_description_one,
            'description_two' => $request->leave_description_two,
            'start_date' => $request->leave_start_date,
            'end_date' => $request->leave_end_date,
            'support_file' => $support_file,
        ];

        LeaveApplication::create($leave_data);

        $currentDateTime = Carbon::now();

        Notification::send($admins,new ApplyLeave($user_apply->name,' have apply leave.', 'at '.$currentDateTime));

        return response()->json([
            'message' => 'Your application have been sent!',
        ],200);
    }
}
