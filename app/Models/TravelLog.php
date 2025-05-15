<?php

namespace App\Models;

use App\Enums\TravelStatus;
use Illuminate\Database\Eloquent\Model;

class TravelLog extends Model
{
    protected $table = 'travel_logs';

    protected $fillable = [
        'exam_score_id',
        'user_id',
        'travel_type',
        'date',

    ];

     public function getRemarksAttribute($value)
    {
        return TravelStatus::from($value); 
    }

     public function setRemarksAttribute($value)
    {
        $this->attributes['travel_type'] = TravelStatus::from($value)->value; 
    }

    public function exam_score(){
       return $this->belongsTo(ExamScore::class, 'exam_score_id');
    }

    public function user(){
       return $this->belongsTo(User::class, 'user_id');
    }
}
