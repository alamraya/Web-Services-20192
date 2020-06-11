<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;



class AuthController extends Controller
{
    private $client;

    public function __construct()
    {
        $this->client = 'http://webmall.test:8080/api/v1/auth/';

    }

    public function formRegister(){
        return view('user.register');
    }

    public function storeRegister(Request $request){
         //validasi
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|max:50',
            'password' => 'required|min:8',
            'c_password' => 'required|same:password|min:8',
        ]);

    // {{dd($request);}} data $request ada
    // $response =  Http::post($this->client.'register',
    //             [ 'headers' => [
    //                 'Accept' => 'application/json',
    //                 'Content-Type' => 'application/json',
    //                 // 'Authorization' => ''
    //             ]],
    //             [
    //                 'form_params' => [
    //                     'name' => $request->name,
    //                     'email' => $request->email,
    //                     'password' => $request->password,
    //                 ]
    //             ]
    //         );
    // data $response nya null

    $response = Http::withHeaders([
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ])->post($this->client.'register', [
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
        'c_password' => $request->c_password,

    ]);

    dd($response->json());


    //dapetin access_tokennya
    // $token = $response['access_token'];

    return redirect('/');

    }

    public function formLogin(){
        return view('user.login');
    }

    public function storeLogin(Request $request){
        //validasi
        $this->validate($request,[
            'email'=>'required|email|max:50',
            'password'=>'required|min:8',
        ]);

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ])->post($this->client.'login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        dd($response->json());

        return redirect('/',compact($response->access_token));

   }
}
