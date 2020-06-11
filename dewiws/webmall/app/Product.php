<?php

namespace App;

use App\Shop;
use App\Order;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name','description','price','stock','cover_img'];
    
    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id');
    }

     //relasi product dg category - many to many
     public function category()
     {
         return $this->belongsToMany(Category::class,'product_categories','product_id','category_id')->withTimestamps();

     }

     //relasi product dg order - many to many
     public function order(){
         return $this->belongsToMany(Order::class,'order_items')->withTimestamps();
     }


}
