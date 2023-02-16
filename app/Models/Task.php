<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = 'tasks';
    protected $fillable = [
        'student_id',
        'master_task_id'
    ];

    public function task_detail(){
        return $this->hasOne(TaskDetail::class,'task_id');
    }

    public function master_task(){
        return $this->belongsTo(Task::class,'master_task_id');
    }
}
