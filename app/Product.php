<?php

namespace App;
use m_shop\App;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_category_id', 'price', 'length', 'width', 'description', 'name'
            ];
    public function productCategory()
    {
        return $this->belongsTo('App\ProductCategory','category_id');
    }
    public function purchaseItem()
    {
         return $this->hasMany('App\PurchaseItem');
    }
    public function stock()
    {
        return $this->hasMany('App\Stock');
    }
    public function productionRawItem()
    {
        return $this->hasMany('App\ProductionRawItem');
    }
}
