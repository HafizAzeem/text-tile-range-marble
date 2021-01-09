<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function sale()
    {
         return $this->hasMany('App\sale');
    }

    public function user()
    {
         return $this->belongsTo('App\User');
    }
}