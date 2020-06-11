<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduk extends Model
{
    protected $table = 'order_items';

    protected $fillable = [
        'product_id', 'order_id', 'quantity', 'price'
    ];
}
