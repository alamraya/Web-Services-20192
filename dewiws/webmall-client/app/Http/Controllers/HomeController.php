<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class HomeController extends Controller
{
    private $client;

    public function __construct()
    {

        $this->client = 'http://webmall.test:8080/api/v1/home';

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $res = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => '',
        ])->get($this->client);
        $products = json_decode($res->getBody());
        return view('home')->with('products',$products);

    }
}
