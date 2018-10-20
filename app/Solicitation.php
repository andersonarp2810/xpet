<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitation extends Model
{
    //
    protected $fillable = [
        'requester_user_id', 'requested_user_id', 'requesters_pet_id', 'requesteds_pet_id',
        'status', // aceito, pendente ou não
    ];

    public function requester(){
        return $this->belongsTo('App\User', 'requester_user_id'); // se não pegar então return $this->belongsTo('App\User', 'requester_user_id', 'id');
    }

    public function requested(){
        return $this->belongsTo('App\User', 'requested_user_id');
    }
    
    public function requesters_pet(){
        return $this->belongsTo('App\Pet', 'requesters_pet_id');
    }

    public function requested_pet(){
        return $this->belongsTo('App\Pet', 'requesteds_pet_id');
    }
}
