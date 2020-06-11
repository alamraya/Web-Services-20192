<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Product $product){

        // add the product to cart
        $cart = \Cart::session(auth()->id())->add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));

        //pesan dan data
        $response = [
            'msg' => 'Cart added',
            'data' => $cart,
        ];

        return response()->json($response, 200);


    }

    public function cart(Request $request){
        $carts = json_decode($request->carts, true);
        $product_carts = [];
        foreach($carts as $cart){
            $id = (int)$cart['id'];
            $quantity = (int)$cart['quantity'];
            $product = Product::find($id);
            if($product){
                $note = 'unsafe';
                if($product->stock >= $quantity){
                    $note = 'safe';
                }
                else {
                    $quantity = (int) $product->stock;
                    $note = 'out of stock';
                }
                $product_carts[] = [
                    'id' => $id,
                    'name' => $product->name,
                    'cover_img' => $product->cover_img,
                    'price' => $product->price,
                    'quantity' => $quantity,
                    'note' => $note
                ];
            }
        }
        return response()->json([
            'status' => 'success',
            'message' => 'carts',
            'data' => $product_carts,
        ], 200);
    }

    public function index(){

        $cartItems = \Cart::session(auth()->id())->getContent();
        return response()->json([
            'status' => 'success',
            'message' => 'data carts',
            'data' => $cartItems,
        ], 200);
    }

    public function destroy($itemId){

        $cartItems = \Cart::session(auth()->id())->remove($itemId);
        return response()->json([
            'status' => 'success',
            'message' => 'carts removed',
            'data' => $cartItems,
        ], 200);
    }

    public function update($rowId){

        \Cart::session(auth()->id())->update($rowId, array(
            'quantity' => [
                'relative' => false,
                'value' => request('quantity')]
        ));

        return back();
    }

    public function checkout(){
        // return view('cart.checkout');
    }

    public function applyCoupon()
    {
        $couponCode = request('coupon_code');

        $couponData = Coupon::where('code', $couponCode)->first();

        if(!$couponData) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Sorry! Coupon does not exist',
            ], 200);
        }


        //coupon logic
        $condition = new \Darryldecode\Cart\CartCondition(array(
            'name' => $couponData->name,
            'type' => $couponData->type,
            'target' => 'total',
            'value' => $couponData->value,
        ));

        \Cart::session(auth()->id())->condition($condition); // for a speicifc user's cart


        return response()->json([
            'status' => 'success',
            'message' => 'coupon applied',
        ], 200);
    }
}
