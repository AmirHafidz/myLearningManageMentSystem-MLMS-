<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;

class LeaveApplication extends Model
{
    use HasFactory;
    protected $table = 'leave_applications';
    protected $fillable = [
        'user_id',
        'title',
        'description_one',
        'description_two',
        'start_date',
        'end_date',
        'support_file',
        'status_id',
    ];

    protected function supportFile(): CastsAttribute
    {
        return CastsAttribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function leave_status(){
        return $this->belongsTo(LeaveStatus::class,'status_id');
    }
}
