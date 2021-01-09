<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function vendor()
    {
        return $this->belongsTo('App\Vendor');
    }
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
    
    public function orderItem()
    {
         return $this->hasMany('App\OrderItem');
    } 
}
