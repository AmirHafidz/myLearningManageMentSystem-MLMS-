<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MasterTrainer extends Model
{
    use HasFactory,Notifiable;
    protected $table = "master_trainers";
    protected $fillable = [
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function master_course(){
        return $this->hasOne(MasterCourse::class,'trainer_id');
    }

    public function class_course(){
        return $this->hasManyThrough(ClassCourse::class,MasterCourse::class,'id','course_id','id','trainer_id');
    }

    public function master_task(){
        return $this->hasMany(MasterTask::class,'trainer_id');
    }

    public function event_trainer(){
        return $this->hasMany(EventTrainer::class,'trainer_id');
    }
}
