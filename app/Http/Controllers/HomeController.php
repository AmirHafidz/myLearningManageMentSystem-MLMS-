<?php

namespace App\Http\Controllers;

use App\Models\MasterCourse;
use App\Models\MasterTrainer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home.index');
    }

    public function trainer_list(){
        $trainer = MasterTrainer::with('master_course')->with(['user'=>function($query){
            $query->with('personal_detail')->get();
        }])->get();
        return view('home.Trainer.index',compact('trainer'));
    }

    public function course_list(){
        $course = MasterCourse::with('master_trainer')->get();
        return view('home.Course.index',compact('course'));
    }

    public function fetch_trainer(){
        $trainer = MasterTrainer::with(['user'=>function($query){
            $query->with('personal_detail')->get();
        }])->get();
        return response()->json([
            'trainer' => $trainer,
        ]);
    }

    public function fetch_course(){
        $course = MasterCourse::get();
        return response()->json([
            'course' => $course,
        ]);
    }
}
