<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;

class Lecture extends Model
{
    use HasFactory;
    protected $table = "lectures";
    protected $fillable = [
        'trainer_id',
        'class_id',
        'title',
        'description_one',
        'description_two',
        'file',
        'photo',
        'video',
    ];

    public function master_trainer(){
        return $this->belongsTo(MasterTrainer::class,'trainer_id');
    }

    public function class_id(){
        return $this->belongsTo(MasterClass::class,'class_id');
    }

    protected function file(): CastsAttribute
    {
        return CastsAttribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    } 
    protected function photo(): CastsAttribute
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
}
