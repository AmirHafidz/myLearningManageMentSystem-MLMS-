<?php

namespace App\Http\Controllers;

use App\Models\CoursePost;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CoursePostController extends Controller
{
    public function index(Request $request,$course_id,$class_id){
        $all_course_post = CoursePost::where('course_id',$course_id)->where('class_id',$class_id)->get();
        return response()->json([
            'all_course_post' => $all_course_post,
        ]);
    }

    public function store(Request $request){
        
        $current_date = Carbon::today()->toDateString();
        $current_time = Carbon::now()->toTimeString();

        $file_json = [];
        $image_json = [];
        $video_json = [];
        $other_json = [];

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
        
        foreach($request->file() as $this_file){
            $filename = $this_file->getClientOriginalname();
            $this_file->move(public_path('course_post_file'), $filename);
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

        $course_post_data = [
            'user_id' => $request->user_id,
            'class_id' => $request->class_id,
            'course_id' =>$request->trainer_id,
            'title' => $request->forum_title,
            'content' => $request->forum_content,
            'date_post' => $current_date,
            'time_post' => $current_time,
            'file' =>$file_json,
            'image' =>$image_json,
            'video' =>$video_json,
            'other' =>$other_json,
        ];

        // dd($course_post_data);

        CoursePost::create($course_post_data);

        return response()->json([
            'message' => 'Your post have been added !',
            'status' => 200
        ],200);
    }
}
