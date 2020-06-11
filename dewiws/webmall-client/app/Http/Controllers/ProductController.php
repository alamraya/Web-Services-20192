<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ProductController extends Controller
{
    private $client;

    public function __construct()
    {
        // $this->client = new GuzzleHttp\Client();
        // $this->client = new Client(['base_uri' => 'http://olshop-server.test:8080/api/v1/products/']);
        $this->client = 'http://webmall.test:8080/api/v1/products';

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => '',
        ])->get($this->client);

        $products = json_decode($res->getBody());
        return view('product.index')->with('products',$products);

    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $res = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => '',
        ])->get($this->client);

        $products = json_decode($res->getBody());
        return view('dashboard.product.index',compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ShowFormCreate()
    {
        $res = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => '',
        ])->get('http://webmall.test:8080/api/v1/category/');

        $categories = json_decode($res->getBody());
        // dd($categories);

        // return view()->share('categories', $categories);
        return view('dashboard.product.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'category_id' => 'required',
            'cover_img' => 'required'
        ]);

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => '',
        ])->post($this->client, [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'cover_img' => $request->cover_img
        ]);


        return redirect('/products_dashboard')->with('Success','Data berhasil disimpan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $res = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => '',
        ])->get($this->client.'/'.$id);
        $product = json_decode($res->getBody());
        return view('product.single')->with('product',$product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail_product_dashboard($id)
    {
        $res = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => '',
        ])->get($this->client.'/'.$id);
        $product = json_decode($res->getBody());
        return view('dashboard.product.detail')->with('product',$product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ShowFormUpdate($id)
    {
        $res = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => '',
        ])->get('http://webmall.test:8080/api/v1/category/');

        $categories = json_decode($res->getBody());

        $res = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => '',
        ])->get($this->client.'/'.$id);
        $product = json_decode($res->getBody());

        return view('dashboard.product.update',compact('categories','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updating(Request $request, $id)
    {
        //validasi
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'category_id' => 'required',
            'cover_img' => 'required'
        ]);

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => '',
        ])->put($this->client.'/'.$id, [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'cover_img' => $request->cover_img
        ]);

        return redirect('/products_dashboard')->with('Success','Data berhasil diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => '',
        ])->delete($this->client.'/'.$id);

        return redirect('/products_dashboard')->with('Success','Data berhasil dihapus');
    }
}
