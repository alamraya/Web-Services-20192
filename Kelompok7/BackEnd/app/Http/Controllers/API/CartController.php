<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Model\OrderCart;

class CartController extends BaseController
{
    public function getCart()
    {
        $user_id = auth()->user()->id;
        $cart = OrderCart::with(["book"=>function ($query)
        {
            return $query->select("id","title","slug","price","stock","cover","author");
        }])
        ->where("user_id",$user_id)->orderBy("created_at","desc")->get();
        return $this->sendResponse($cart,"Berhasil mengambil data keranjang");
    }

    public function addToCart(Request $request)
    {
        $user_id = auth()->user()->id;
        $input = $request->all();

        $validator = Validator::make($input, [
            "book_id" => "required",
            "quantity" => "required",
        ]);
        
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $cart = OrderCart::where("user_id",$user_id)
                ->where("book_id",$input['book_id'])->first();
        if($cart){
            $cart->quantity += $input['quantity'];
            if($cart->quantity <= 0){
                $cart->delete();
                return $this->sendResponse([],"Buku telah dihapus dari keranjang");
            }else{
                $cart->save();
            }
        }else{

            if($input['quantity'] <= 0){
                return $this->sendError("Kuantitas harus lebih dari sama dengan satu (1)");
            }

            $input['user_id'] = $user_id;
            $cart = OrderCart::create($input);
        }

        return $this->sendResponse($cart,"success");
    }

    public function removeCart($cartId)
    {
        $cart = OrderCart::find($cartId);
        
        if(!$cart){
            return $this->sendError("Data keranjang tidak ditemukan");
        }

        $cart->delete();
        return $this->sendResponse([],"success");
    }
    
    public function removeCartAll()
    {
        $user_id = auth()->user()->id;
        $cart = OrderCart::where("user_id",$user_id)->delete();
        return $this->sendResponse([],"success");
    }
}