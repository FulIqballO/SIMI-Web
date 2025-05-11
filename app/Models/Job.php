<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{

    protected $guarded = [];

    protected $table = 'job_positions';

    protected $fillable = [
        'trainings_id',
        'job_title',
        'country',
        'job_description',
        'salary',
    ];

    public function training()  
    {
        return $this->belongsTo(Training::class, 'trainings_id'); 
    }
}
