<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Helper\StatusOrder;

class Order extends Model
{
    protected $fillable = [
        "user_id", 
        "total_price", 
        "invoice_number", 
        "status",
        "awb",
        "courier",
        "postal_fee",
        "shipping_address_id"
    ];

    protected $appends = ['status_order'];


    public function books()
    {
        return $this->morphToMany('App\Model\Book', 'Book', 'book_order', "order_id", "book_id");
    }

    public function getStatusOrderAttribute()
    {
        return StatusOrder::check($this->status);
    }

    public function shipping_address()
    {
        return $this->hasOne('App\Model\ShippingAddress', 'id', 'shipping_address_id');
    }
}