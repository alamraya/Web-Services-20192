<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

///halaman home setelah login
Route::get('/home', 'HomeController@index')->name('home');

//proses add to cart
Route::get('/add-to-cart/{product}', 'CartController@add')->name('cart.add')->middleware('auth');
//halaman index cart
Route::get('/cart', 'CartController@index')->name('cart.index')->middleware('auth');
//proses delete data cart
Route::get('/cart/destroy/{itemId}', 'CartController@destroy')->name('cart.destroy')->middleware('auth');
//proses update data cart (quantity)
Route::get('/cart/update/{itemId}', 'CartController@update')->name('cart.update')->middleware('auth');
//proses checkout,akan diarahkan ke halaman order
Route::get('/cart/checkout', 'CartController@checkout')->name('cart.checkout')->middleware('auth');

//proses order
Route::resource('orders', 'OrderController')->middleware('auth');

//fitur shops untuk seller
Route::resource('shops','ShopController')->middleware('auth');

//produk
Route::resource('products', 'ProductController');

//search produk
Route::get('/products/search', 'ProductController@search')->name('products.search');

//apply coupon
Route::get('/cart/apply-coupon', 'CartController@applyCoupon')->name('cart.coupon')->middleware('auth');



//paypal
Route::get('paypal/checkout/{order}', 'PayPalController@getExpressCheckout')->name('paypal.checkout');
Route::get('paypal/checkout-success/{order}', 'PayPalController@getExpressCheckoutSuccess')->name('paypal.success');
Route::get('paypal/checkout-cancel', 'PayPalController@cancelPage')->name('paypal.cancel');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
