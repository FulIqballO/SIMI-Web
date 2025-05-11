<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalData extends Model
{
    use HasFactory;

    protected $table = 'personal_data';
    
    protected $fillable = [
        'user_id',
        'id_card_number',
        'citizen_id',
        'passport_number',
        'family_card_number',
        'birth_place',
        'birth_date',
        'diploma_number',
        'pre_medical_checkup',
        'full_medical_checkup',
        'registration_id',
        

    ];
}
