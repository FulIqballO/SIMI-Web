<?php

namespace App\Models;

use App\Enums\PaymentStatus;
use App\Models\TrainingRegistration;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $table = 'payments';

//     public function getRouteKeyName()
// {
//     return 'invoice_code';
// }


    protected $fillable = [
        'training_registration_id',
        'invoice_code',
        'transfer_date',
        'transfer_time',
        'proof_of_transfer',
        'payment_status',
    ];

    public function getRemarksAttribute($value)
    {
        return PaymentStatus::from($value); 
    }

     public function setRemarksAttribute($value)
    {
        $this->attributes['payment_status'] = PaymentStatus::from($value)->value; 
    }


    public function training_registration()
    {
        return $this->belongsTo(TrainingRegistration::class, 'training_registration_id');
    }

  
}
