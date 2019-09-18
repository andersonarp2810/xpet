<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    //

    protected $fillable = [
        'token', 'user_id', 'expire'
    ];


    public function User(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
