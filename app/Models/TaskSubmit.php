<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskSubmit extends Model
{
    use HasFactory;
    protected $table = 'task_students';
    protected $fillable = [
        'master_task_id',
        'student_id',
        'is_finish',
        'date_submit',
        'file_submitted',
        'text_attempt',
    ];

    public function master_task(){
        return $this->belongsTo(MasterTask::class,'master_task_id');
    }

    public function master_student(){
        return $this->belongsTo(MasterStudent::class,'student_id','id');
    }

    protected function textAttempt(): CastsAttribute
    {
        return CastsAttribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    } 
}
