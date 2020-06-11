<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1/auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');

    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('details', 'AuthController@details');
        Route::post('logout', 'AuthController@logout');
    });

});

Route::group(['prefix' => 'v1'], function () {
    //home
    Route::get('/home', 'HomeController@index');
    //get product
    Route::get('/products', 'ProductController@index');
    Route::get('/products/{product}', 'ProductController@show');
    //get category
    Route::get('/category', 'CategoryController@index');
    //get provinces
    Route::get('provinces', 'OrdersController@provinces');
    //get cities
    Route::get('cities', 'OrdersController@cities');
    //get couriers
    Route::get('couriers', 'OrdersController@couriers');
    //cart
    Route::post('products/cart', 'CartController@cart');

});

Route::group(['prefix' => 'v1','middleware' => 'auth:api'], function () {
// Route::group(['prefix' => 'v1'], function () {
    //create product
    Route::post('/products', 'ProductController@store');
    Route::put('/products/{product}', 'ProductController@update');
    Route::delete('/products/{product}', 'ProductController@destroy');

    //fitur request shops untuk seller
    Route::resource('shops','ShopController');
    //add to cart
    Route::post('/add-to-cart/{product}', 'CartController@add');
    //shipping
    Route::post('shipping', 'OrdersController@shipping');
    //cek ongkir service pengiriman
    Route::post('services', 'OrdersController@services');
    //payment
    Route::post('payment', 'OrdersController@payment');
    //get my-order
    Route::get('my-order', 'OrdersController@myOrder');



});





