<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventTrainer extends Model
{
    use HasFactory;
    protected $table = 'event_trainers';
    protected $fillable = [
        'trainer_id',
        'title',
        'description',
        'date_start',
        'date_end',
        'time_start',
        'time_end',
    ];

    public function master_trainer(){
        return $this->belongsTo(MasterTrainer::class,'trainer_id');
    }
}
