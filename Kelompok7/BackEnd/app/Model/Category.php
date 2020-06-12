<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $fillable = [
        "name", 
        "slug", 
        "image"
    ];

    public function books()
    {
        return $this->morphedByMany('App\Model\Book', 'Category', "book_category", "category_id", "book_id");
    }
}