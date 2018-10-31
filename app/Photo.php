<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $fillable = ['pet_id', 'path'];

    public function pet(){
        return $this->belongsTo('App\Pet');
    }
}
