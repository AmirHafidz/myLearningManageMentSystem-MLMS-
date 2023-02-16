<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Lecture;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    public function store(Request $request){

        // dd($request->file());

        $lecture = Lecture::first();

        // dd(Carbon::parse($lecture->date_created)->toDateString());

        $this->validate($request,[
            'trainer_id' => 'required',
            'class_id' => 'required',
            'lecture_title' => 'required',
        ]);

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
            $this_file->move(public_path('lecture_file'), $filename);
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

        $data_lecture = [
            'trainer_id' => $request->trainer_id,
            'class_id' => $request->class_id,
            'title' => $request->lecture_title,
            'description_one' => $request->lecture_description_one,
            'description_two' => $request->lecture_description_two,
            'file' => $file_json,
            'photo' => $image_json,
            'video' => $video_json,
            'other' => $other_json,
        ];

        Lecture::create($data_lecture);

        return response()->json([
            'message' => 'Lecture has been added !'
        ],200);

        // if($request->ajax()){

        // }
    }
}
