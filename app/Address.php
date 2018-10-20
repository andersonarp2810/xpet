<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $fillable = [
        'user_id',
        'country',
        'state',
        'city',
        'district', //bairro
        'street',
        'number',
        'complement',
        'coordinateX', // string de número grande
        'coordinateY', // string de número grande
    ];

    public function user(){
        return $this->belongsTo('App/User');
    }

}
