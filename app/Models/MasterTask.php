<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterTask extends Model
{
    use HasFactory;
    protected $table = 'master_tasks';
    protected $fillable = [
        'trainer_id',
        'class_id',
        'title',
        'date_start',
        'date_end',
        'time_start',
        'time_end',
    ];

    public function master_trainer(){
        return $this->belongsTo(MasterTrainer::class,'trainer_id');
    }


    public function task_student(){
        return $this->hasMany(TaskSubmit::class,'master_task_id');
    }

    public function task_detail(){
        return $this->hasOne(TaskDetail::class,'master_task_id');
    }
}
