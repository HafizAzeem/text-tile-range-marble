<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderRevision extends Model
{
    protected $table = 'order_revision';

    protected $fillable=[
      'order_id','created_by','action','data'
    ];
    protected $casts = [
        'data' => 'array'

    ];
}
