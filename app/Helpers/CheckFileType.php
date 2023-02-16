<?php


function checkThisFile(array $thisfile){
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
    
    foreach($thisfile as $this_file){
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
    
}

?>