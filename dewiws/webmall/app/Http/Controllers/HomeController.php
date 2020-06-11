<?php

namespace App\Http\Controllers;

use App\Product;

use Illuminate\Http\Request;

use App\Http\Resources\Product as ProductResource;
use App\Http\Resources\ProductCollection;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $products = Product::take(8)->get();

            return response(
                [
                    'data' => ProductResource::collection($products)
                ]
            );

    }

    // public function contact()
    // {
    //     return view('contact');
    // }
}
