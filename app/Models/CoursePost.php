<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;

class CoursePost extends Model
{
    use HasFactory;
    protected $table = 'course_posts';
    protected $fillable = [
        'user_id',
        'class_id',
        'course_id',
        'title',
        'content',
        'date_post',
        'time_post',
        'file',
        'image',
        'video',
        'other',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function master_course(){
        return $this->belongsTo('course_id');
    }

    public function master_class(){
        return $this->belongsTo('class_id');
    }

    protected function file(): CastsAttribute
    {
        return CastsAttribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    } 
    protected function image(): CastsAttribute
    {
        return CastsAttribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    } 
    protected function video(): CastsAttribute
    {
        return CastsAttribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    } 
    protected function other(): CastsAttribute
    {
        return CastsAttribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    } 
}
