<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

use App\Http\Resources\Product as ProductResource;
use App\Http\Resources\ProductCollection;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categoryId = request('category_id');
        $categoryName = null;

        if($categoryId) {
            $category = Category::find($categoryId);
            $categoryName = ucfirst($category->name);

            $products = $category->allProducts();
        }else{
            $products = Product::select('*')
            ->orderBy('id', 'DESC')->get();
        }

        // jika response mau json
            foreach($products as $product){
                $product->view_detail_product = [
                    'href' => 'api/v1/products/'.$product->id,
                    'method' => 'GET'
                ];
            }
            $response = [
                'msg' => 'List of all products',
                'data' => ProductResource::collection($products),
            ];
            return response()->json($response,200);



    }

    public function search(Request $request)
    {

        $query = $request->input('query');

        $products = Product::where('name','LIKE',"%$query%")->paginate(10);

        // jika response mau json belum jalan
            return response(
                [
                    'data' => ProductResource::collection($products)
                ]
            );


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Product $product)
    {

         // jika response mau json
            // $product = Product::findOrFail($product->id);
            $product = Product::with('category')->where('id',$product->id)->firstOrFail();
            $product->view_products = [
                'href' => 'api/v1/products',
                'method' => 'GET'
            ];
            //pesan dan data
            $response = [
                'msg' => 'Product information',
                'data' => new  ProductResource($product),
            ];
            return response()->json($response, 200);


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
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'category_id' => 'required',
            'cover_img' => 'required',
            // 'shop_id' => 'required'
        ]);

        //menyiapkan variabel
        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');
        $stock = $request->input('stock');
        $cover_img = $request->input('cover_img');
        $category_id = $request->input('category_id');
        // $shop_id = $request->input('shop_id');


        $product = new Product([
            'name' =>  $name,
            'description' =>  $description,
            'price' =>  $price,
            'stock' =>  $stock,
            'cover_img' =>  asset($cover_img),
            'category_id' =>  $category_id,
            // 'shop_id' =>  $shop_id,
        ]);

         // temuukan id category untuk menampilkan data categorynya
        $category = Category::findOrFail($category_id);

        if($product->save()){
            //menambahkan category_id ke tabel pivot product_categories
            //function category() berasal dari model Product
            $product->category()->attach($category_id);
            //menambahkan product_id ke tabel pivot product_categories
            $product->category()->attach($request->id);
            $product->view_product = [
                'href' => 'api/v1/products/'.$product->id,
                'method' => 'GET'
            ];
            $message = [
                'msg' => 'Product created',
                'product' => $product,
                'category' => $category,
            ];
            return response()->json($message,200);
        }
         //jika gagal tersimpan
        $response = [
            'msg' => 'Error during creating product'
        ];
        return response()->json($response,404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          //validasi
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'category_id' => 'required',
            'cover_img' => 'required',
        ]);

        //menyiapkan variabel
        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');
        $stock = $request->input('stock');
        $cover_img = $request->input('cover_img');
        $category_id = $request->input('category_id');


         //ambil id product beserta category yg terdaftarnya
        $product = Product::findOrFail($id);

        //proses update data
        $product->name = $name;
        $product->description = $description;
        $product->price = $price;
        $product->stock = $stock;
        $product->cover_img = asset($cover_img);
        $product->category()->category_id = $category_id;

        if($product->update()){
            //sinkronisasi (detach lalu attach) category_id ke tabel pivot categories_products
            $product->category()->sync($category_id);
            //pengambilan id category
            $category = $product->category()->findOrFail($category_id);

            $product->view_product = [
                'href' => 'api/v1/products/'.$product->id,
                'method' => 'GET'
            ];
            $message = [
                'msg' => 'Product updated',
                'product' => $product,
                'category' => $category,
            ];
            return response()->json($message,200);
        }
         //jika gagal tersimpan
        $response = [
            'msg' => 'Error during updating product'
        ];
        return response()->json($response,404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //temukan id
        $product = Product::findOrFail($id);
        $product->category()->detach();


        //jika gagal delete
        if(!$product->delete()){
            return response()->json(['msg' => 'Deletion failed'],404);
        }

          //berhasil delete
        $response = [
            'msg' => 'Product deleted',
            'create' => [
                'href' => 'api/v1/products',
                'method' => 'POST',
                'params' => 'name, description, price, cover_img, stock, category_id, shop_id'
            ]
        ];
        return response()->json($response,200);
    }




}
