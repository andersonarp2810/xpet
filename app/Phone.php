<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    //
    protected $fillable = [
        'user_id',
        'number', // string
        'whatsapp_available', // se o número é também whatsapp
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
