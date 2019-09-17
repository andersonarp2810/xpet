<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailVerification extends Model
{
    //

    protected $fillable = [
        'user_id', 'code', 'expire'
    ];

    public function User(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
