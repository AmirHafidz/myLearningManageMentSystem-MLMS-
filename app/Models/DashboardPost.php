<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;

class DashboardPost extends Model
{
    use HasFactory;
    protected $table = 'dashboard_posts';
    protected $fillable = [
        'user_id',
        'title',
        'sub_title',
        'post',
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
