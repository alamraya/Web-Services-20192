<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable=['name','description'];
    //one to one
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    //one to many
    public function products()
    {
        return $this->hasMany(Product::class, 'shop_id');
    }
}
