<?php

namespace App\Http\Controllers;

use App\Models\DashboardPost;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardPostController extends Controller
{
    public function store(Request $request){

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

        $current_date = Carbon::today()->toDateString();
        $current_time = Carbon::now()->toTimeString();

        $data_dashboard_post = [
            'user_id' => $request->admin_id,
            'title' => $request->dashboard_post_title,
            'sub_title' => $request->dashboard_post_sub_title,
            'post' => $request->dashboard_post_content,
            'date_post' => $current_date,
            'time_post' => $current_time,
            'file' =>  $file_json,
            'image' =>  $image_json,
            'video' =>  $video_json,
            'other' =>  $other_json,
        ];

        DashboardPost::create($data_dashboard_post);

        return response()->json([
            'message' => 'New Post have been added...',
            'status' => 200
        ],200);
    }

    public function fetch(){
        $dashboard_post = DashboardPost::all();
        return response()->json([
            'dashboard_post' => $dashboard_post,
        ]);
    }
}
