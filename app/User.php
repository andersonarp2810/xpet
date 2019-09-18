<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'public_contact_info',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function pet(){
        return $this->hasMany('App\Pet');
    }

    public function phones(){
        return $this->hasMany('App\Phone');
    }

    public function address(){
        return $this->hasOne('App\Address');
    }

    public function passwordReset(){
        return $this->hasOne(PasswordReset::class, 'user_id', 'id');
    }

    public function emailVerification(){
        return $this->hasOne(EmailVerification::class, 'user_id', 'id');
    }
}
