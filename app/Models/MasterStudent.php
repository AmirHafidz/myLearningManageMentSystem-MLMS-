<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterStudent extends Model
{
    use HasFactory;
    protected $table = 'master_students';
    protected $fillable = [
        'user_id',
        'class_id',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function master_class(){
        return $this->belongsTo(MasterClass::class,'class_id');
    }

    public function master_course(){
        return $this->hasManyThrough(MasterClass::class,ClassCourse::class,'course_id','id','id','course_id');
    }

    public function myFunction()
{
    return $this->hasOnethrough(ModelC::class, ModelB::class,
        'a_id', 'id', 'id', 'c_id');
}
}
