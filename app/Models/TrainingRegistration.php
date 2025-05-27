<?php

namespace App\Models;

use App\Models\User;
use App\Models\Training;
use App\Models\ExamScore;
use App\Enums\StatusRegistration;
use Illuminate\Database\Eloquent\Model;

class TrainingRegistration extends Model
{

    protected $guarded = [];
    protected $table = 'training_registrations';

    protected $fillable = [
        'user_id',
        'training_id',
        'status',
        'registration_date',

    ];


    public function getStatusAttribute($value)
    {
        return StatusRegistration::from($value);
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = StatusRegistration::from($value)->value;
    }

 public function user()
{ 
        return $this->belongsTo(User::class, 'user_id');

}

public function training(){
    return $this->belongsTo(Training::class, 'training_id');
}

 public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function examScore(){
        return $this->hasOne(ExamScore::class, 'training_registration_id');
    }

    public function training_schedule()
{
    return $this->belongsTo(TrainingSchedule::class);
}

    


}
