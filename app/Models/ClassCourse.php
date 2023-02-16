<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassCourse extends Model
{
    use HasFactory;
    protected $table = 'class_courses';
    protected $fillable = [
        'class_id',
        'course_id',
    ];

    public function master_class(){
        return $this->belongsTo(MasterClass::class,'class_id');
    }

    public function master_course(){
        return $this->belongsTo(MasterCourse::class,'course_id');
    }


}
