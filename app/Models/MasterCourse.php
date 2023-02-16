<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterCourse extends Model
{
    use HasFactory;
    protected $table = "master_courses";

    public function master_class(){
        return $this->belongsToMany(MasterClass::class,'class_id');
    }

    public function master_trainer(){
        return $this->belongsTo(MasterTrainer::class,'trainer_id');
    }

    public function list_class(){
        return $this->belongsToMany(MasterClass::class,'class_courses','course_id','class_id');
    }

}
