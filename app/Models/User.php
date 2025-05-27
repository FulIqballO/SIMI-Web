<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

     public $timestamps = true;
     
     protected $fillable = [
        'username',
        'email',
        'password',
        'no_telp',
        'jk',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function personalData()
{
    return $this->hasOne(PersonalData::class);
}
public function userDetails()
{
    return $this->hasOne(UserDetail::class);
}
public function userDocuments()
{
    return $this->hasOne(UserDocument::class);
}

public function examScore()
{
    return $this->hasOne(ExamScore::class);
}

public function training_registration(){
    return $this->hasMany(TrainingRegistration::class);
}

}
