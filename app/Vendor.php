<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    public function purchase()
    {
         return $this->hasMany('App\Purchase');
    }

    public function user()
    {
         return $this->belongsTo('App\User');
    }
}
