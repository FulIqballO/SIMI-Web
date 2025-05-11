<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrainingSchedule extends Model
{

    use HasFactory;
    protected $guarded  = [];

    protected $table = 'training_schedules';


    protected $fillable = [
        'training_id',
        'training_material',
        'location',
        'day',
        'time',
        'duration',
        'start_date',
        'end_date',
    ];

    public function training(){
        return $this->belongsTo(Training::class, 'training_id');
    }
}
