<?php

namespace App\Http\Controllers;

// use App\Category;
use TCG\Voyager\Models\Category;

use Illuminate\Http\Request;

use App\Http\Resources\Category as CategoryResource;
use App\Http\Resources\CategoryCollection;

class CategoryController extends Controller
{
    public function index(Request $request){

         // jika response mau json
            return response(
                [
                    'AllCategory' => CategoryResource::collection(Category::all()),
                    'ParentCategory' => Category::whereNull('parent_id')->get(),
                    'ChildCategory' => Category::whereNotNull('parent_id')->get(),
                ]
            );


    }
}
