<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserDocument extends Model
{
    use HasFactory;

    protected $table = 'user_documents';

    protected $fillable = [
        'user_id',
        'vaccine_certificate',
        'permit_letter',
        'police_clearance',
        'marriage_certificate',
        'passport',
        'identity_card',
        'diploma',
        'family_register'
       
        
    ];

      public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

}
