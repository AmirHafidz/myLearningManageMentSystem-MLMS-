<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveStatus extends Model
{
    use HasFactory;
    protected $table = 'leave_statuses';

    public function leave_application(){
        return $this->hasMany(LeaveApplication::class,'status_id');
    }
}
