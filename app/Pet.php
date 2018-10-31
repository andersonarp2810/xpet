<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    //
    protected $fillable = [
        'user_id', 'name',
        'type', // default Cachorro
        'race',
        'size', // string
        'color',
        'gender',
        'pedigree',
        'description'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
