<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class CategoryController extends Controller
{

    private $client;

    public function __construct(){
        $this->client = 'http://webmall.test:8080/api/v1/category/';
    }

    public function index()
    {
        $res = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => '',
        ])->get($this->client);

        $categories = json_decode($res->getBody());
        dd($categories);

        // return view()->share('categories', $categories);
        return view('dashboard.product.create')->with('categories', $categories);


        // ->view()->share('categories', $categories);

    }



}
