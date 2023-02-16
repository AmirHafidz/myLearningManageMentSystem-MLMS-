<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\AttributeGroup;

class TaskDetail extends Model
{
    use HasFactory;
    protected $table = 'task_details';
    protected $fillable = [
        'master_task_id',
        'description_one',
        'description_two',
        'file',
        'image',
        'video',
        'other',
    ];

    public function master_task(){
        return $this->belongsTo(MasterTask::class,'master_task_id');
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
