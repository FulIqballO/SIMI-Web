<?php

namespace App\Models;

use App\Models\User;

use App\Enums\RemarkStatus;
use Illuminate\Database\Eloquent\Model;

class ExamScore extends Model
{
    protected $guard = [];

    protected $table = 'exam_scores';

    protected $fillable = [
      'training_registration_id',
      'user_id',
      'score',
      'remarks',
      'riview_status',
      'input_date',
      'training_schedule_id',

    ];

      public function getRemarksAttribute($value)
    {
        return RemarkStatus::from($value); 
    }

     public function setRemarksAttribute($value)
    {
        $this->attributes['remarks'] = RemarkStatus::from($value)->value; 
    }
    

    public function user()
    { 
            return $this->belongsTo(User::class, 'user_id');
    
    }

    public function training_schedule(){
        return $this->belongsTo(TrainingSchedule::class, 'training_schedule_id');
    }

    public function training_registration(){
      return $this->belongsTo(TrainingRegistration::class, 'training_registration_id');
    }
}
