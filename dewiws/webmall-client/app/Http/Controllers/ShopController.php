<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ShopController extends Controller
{
    private $client;

    public function __construct()
    {
        // $this->client = new GuzzleHttp\Client();
        // $this->client = new Client(['base_uri' => 'http://olshop-server.test:8080/api/v1/products/']);
        $this->client = 'http://webmall.test:8080/api/v1/shops';

    }
    public function form(){
        return view('shop.index');
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //validasi
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
        ]);

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => '',
        ])->post($this->client, [
            'name' => $request->name,
            'description' => $request->description,
        ]);

        dd($response);

        return redirect('/');

    }

}
