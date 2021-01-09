<?php

namespace App;
use m_shop\App;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    
    public function product()
    {
         return $this->hasMany('App\Product');
    }
}
