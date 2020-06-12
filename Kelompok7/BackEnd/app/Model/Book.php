<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = 
    ["title","slug",
    "description","author",
	"publisher","cover",
	"price","views","stock",
	"status",	"create_by",
	"deleted_by","updated_by",
	"deleted_at"];
	
	public function categories()
    {
        return $this->morphToMany('App\Model\Category', 'Category', 'book_category', "book_id", "category_id");
    }
}