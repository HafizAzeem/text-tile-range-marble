<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'vendor_id', 'product_id', 'invoice_date', 'due_date', 'subtotal', 'nettotal','shipping', 'tax', 
        'description', 'discount'
            ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function vendor()
    {
        return $this->belongsTo('App\Vendor');
    }
    
    public function purchaseItem()
    {
         return $this->hasMany('App\PurchaseItem');
    } 
}
