<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    protected $fillable = [
'purchase_id', 'product_id', 'quantity', 'net_price', 'total','length','width','height'
    ];
    public function purchase()
    {
        return $this->belongsTo('App\Purchase');
    }
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
