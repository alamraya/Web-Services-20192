<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderCart extends Model
{
    protected $table = "order_cart";
    protected $fillable = ["user_id","book_id","quantity"];

    public function book()
    {
        return $this->hasOne("App\Model\Book","id","book_id");
    }
}