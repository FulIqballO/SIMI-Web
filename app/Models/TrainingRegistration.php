<?php

namespace App\Models;

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
        return $this->hasMany(Payment::class);
    }

}
