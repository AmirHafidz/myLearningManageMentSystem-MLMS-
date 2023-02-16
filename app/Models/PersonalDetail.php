<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalDetail extends Model
{
    use HasFactory;
    protected $table = "personal_details";
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'ic_number',
        'date_born',
        'full_address',
        'phone_no'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
