<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //many to many
    public function items()
    {
        return $this->belongsToMany(Product::class, 'order_items','order_id','product_id')->withPivot('quantity','price');
    }
    //one to many
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
