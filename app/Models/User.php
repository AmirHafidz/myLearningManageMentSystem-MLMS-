<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = "users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'date_join',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->hasOne(Role::class,'role_id');
    }

    public function master_student(){
        return $this->hasOne(MasterStudent::class,'user_id');
    }

    public function master_trainer(){
        return $this->hasOne(MasterTrainer::class,'user_id');
    }

    public function master_class(){
        return $this->hasOneThrough(MasterClass::class,MasterStudent::class,'class_id','id','class_id','class_id');
    }

    public function personal_detail(){
        return $this->hasOne(PersonalDetail::class,'user_id');
    }

    public function leave_application(){
        return $this->hasMany(LeaveApplication::class,'user_id');
    }
}
