<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    protected $table = "book_category";
    protected $fillable = [
        "category_id",
        "book_id"
    ];
}