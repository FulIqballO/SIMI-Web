<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserDetail extends Model
{
    use HasFactory;

    protected $table = 'user_details';

    protected $fillable = [
        'user_id',
        'agency_name',
        'position',
        'visa_teto',
        'sponsor',
        

    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
