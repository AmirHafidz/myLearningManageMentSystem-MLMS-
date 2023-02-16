<?php

namespace App\Http\Controllers;

use App\Models\ClassCourse;
use App\Models\MasterStudent;
use App\Models\MasterTrainer;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{

    public function index(){

        $auth_user = Auth()->user();
        if($auth_user){
            if($auth_user->role_id == 3){
                // $try = MasterClass::where('id',1)->with('master_course')->get();
                $user = MasterStudent::where('user_id',$auth_user->id)->with('user','master_class')->first();
                $notifications = $auth_user->unreadNotifications;
                $routeName = \Route::currentRouteName();
                return view('user.my_calendar.index',compact('user','notifications','routeName'));
            }elseif($auth_user->role_id == 2){
                $user = MasterTrainer::where('user_id',$auth_user->id)->with('user')->with(['master_course'=>function($query){
                    $query->with('list_class')->get();}])->first();
                $notifications = $auth_user->unreadNotifications;
                $routeName = \Route::currentRouteName();

                $class_course = ClassCourse::with('master_class','master_course')->where('course_id',$user->id)->get();
                // dd($class_course);
                $event = [];
                foreach ($class_course as $class_course) {
                    $date_range = CarbonPeriod::create($class_course->start_date,$class_course->end_date);
                    foreach ($date_range as $date) {
                        if($date->format('l') == $class_course->day){
                                $event[] = [
                                    'start' => $date->toDateString(),
                                    'end' => $date->toDateString(),
                                    'title' => 'Class '.$class_course->master_class->name,
                                ];
                        }
                    }
                }

                // $startDate = Carbon::createFromFormat('Y-m-d', '2020-11-01');
                // $endDate = Carbon::createFromFormat('Y-m-d', '2020-11-05');
                
                // $zizi = [];

                // $dateRange = CarbonPeriod::create($startDate,$endDate);

                // foreach ($dateRange as $key) {
                //     dd($key->format('l'));
                // }


                // foreach($my_time as $mytime){
                //     $startDate = Carbon::parse($mytime->start_date)->subDays(1)->next(Carbon::MONDAY); // Get the first friday.
                //     $endDate = Carbon::parse($mytime->end_date)->addDays(1);

                //     $rabu = new Carbon('next '.$mytime->day);
                //     // $rabu->parse($mytime->start_date)->next(MONDAY);
                //     dd($rabu[0]);

                //     $iteration = 1;
                //     for ($date = $startDate; $date->lte($endDate); $date->addWeek()) {
                //         // $fridays[] = $date->format('Y-m-d');
                //         $fridays[] =[
                //             'id' => $iteration,
                //             'title' =>$rabu,
                //             'start' => $date->format('Y-m-d'),
                //             'end' => $date->format('Y-m-d'),
                //         ];
                //         $iteration++;
                //     };
                // };



                
                return view('user.my_calendar.index',compact(['user','notifications','routeName','event']));

            }else{
                $user = User::where('id',$auth_user->id)->first();
                $notifications = $auth_user->unreadNotifications;
                $routeName = \Route::currentRouteName();
                return view('user.my_calendar.index',compact('user','notifications','routeName'));
            }
        }else{
            return redirect()->route('user.my_calendar.index');
        }
    }

    // public function index(){
    //     $myevents = [];
    //     $events = ClassCourse::where('course_id',10)->get();
        
    //     foreach ($events as $event) {
    //         $myevents[]=[
    //             'title' =>$event->day,
    //             'start' =>$event->start_date,
    //             'end' =>$event->start_date,
    //         ];
    //     }

    //     return view('calendar',['myevents' => $myevents]);
    // }
}
