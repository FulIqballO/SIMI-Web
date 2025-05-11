<?php

namespace App\Models;

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

    public function user()
{ 
        return $this->belongsTo(User::class, 'user_id');

}

public function training(){
    return $this->belongsTo(Training::class, 'training_id');
}

}
