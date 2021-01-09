<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id', 'product_id','foreigner_id', 'qty', 'rate', 'commission','foreigner_commission','packing','lc_days',
        'piece_length', 'status','net_total','currency','exchange_rate','description'
    ];

    public function order()
    {
        return $this->belongsTo('App\Order');
    }
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
