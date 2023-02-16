<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterClass extends Model
{
    use HasFactory;

    public function master_student(){
        return $this->hasMany(MasterStudent::class,'class_id');
    }

    public function master_course(){
        return $this->belongsToMany(MasterCourse::class,'class_courses','class_id','course_id');
    }

    public function course(){
        return $this->belongsToMany(MasterCourse::class,'class_courses','class_id','course_id');
    }
}
