<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $guarded = [];

    protected $table = 'trainings';
    
    protected $fillable = [
        'training_name',
        'description',
        'price'
    ];

}
