<?php

namespace App\Models;

use App\Models\TrainingRegistration;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $primaryKey = 'invoice_code';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'payments';


    protected $fillable = [
        'training_registration_id',
        'invoice_code',
        'transfer_date',
        'transfer_time',
        'proof_of_transfer',
        'payment_status',
    ];


    public function training_registration()
    {
        return $this->belongsTo(TrainingRegistration::class, 'training_registration_id');
    }

  
}
