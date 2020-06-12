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
    return "API WORK";
});

Route::group(['prefix' => 'v1', 'as' => 'api.'], function (){
    Route::post('register', 'API\RegisterController@register');
    Route::post('login', 'API\RegisterController@login');
    
    // End Point Book
    Route::group(['prefix' => 'book', 'as' => 'book.'], function () {
        Route::get("/","API\BookController@getBook")->name("getBook");
        Route::get("/{slug}","API\BookController@singleBook")->name("getBookSingle");
        Route::get("/category/{slug}","API\BookController@getBook")->name("getBook");
        
        Route::middleware(['auth:api','role'])->group( function () {
            Route::post("/add","API\BookController@create")->name("createBook");
            Route::post("/{bookId}/edit","API\BookController@update")->name("updateBook");
            Route::delete("/{bookId}/delete","API\BookController@delete")->name("deleteBook");
            Route::post('/{bookId}/change-category', 'API\BookController@changeCategory')->name("changeCategory");
        });
    });

    // End Point Profile
    Route::group(['prefix' => 'profile', 'as' => 'profile.', "middleware"=> "auth:api"], function () {
        Route::get("/", "API\ProfileController@info")->name("info");
        Route::post("/update", "API\ProfileController@update")->name("update");
    });
    

    // End Point Oder
    Route::group(['prefix' => 'order', 'as' => 'order.', "middleware"=> "auth:api"], function () {
        Route::post("/place_order", "API\OrderController@order")->name("info");
        Route::get("/{orderId}/detail", "API\OrderController@detail")->name("info");
        Route::get("/{orderId}/track_order", "API\OrderController@trackOrder")->name("trackOrder");
        Route::get("/list_order", "API\OrderController@getListOrder")->name("listOrder");
        Route::post("/{orderId}/cancel", "API\OrderController@cancelOrder")->name("cancelOrder");
        
        Route::middleware("role")->group(function ()
        {
            Route::post("/{orderId}/update_resi", "API\OrderController@updateResi")->name("updateResi");
            Route::post("/update_status/{orderId}/{status}", "API\OrderController@updateStatus")->name("updateStatus");
            Route::delete("/{orderId}/delete", "API\OrderController@deleteOrder")->name("deleteOrder");
        });
    });

    // End Point Category
    Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
        Route::get("/","API\CategoryController@getCategory")->name("getCategory");
        
        Route::middleware(['auth:api','role'])->group( function () {
            Route::post("/add","API\CategoryController@create")->name("createCategory");
            Route::post("/{categoryId}/edit","API\CategoryController@update")->name("updateCategory");
            Route::delete("/{categoryId}/delete","API\CategoryController@delete")->name("deleteCategory");
        });
    });

    // End Point Cart
    Route::group(['prefix' => 'cart', 'as' => 'cart.', "middleware"=> "auth:api"], function () {
        Route::get("/", "API\CartController@getCart")->name("getCart");
        Route::post("/add", "API\CartController@addToCart")->name("addToCart");
        Route::delete("/{cartId}/delete", "API\CartController@removeCart")->name("removeCart");
        Route::delete("/delete-all", "API\CartController@removeCartAll")->name("removeCart");
    });

    // End Point Region
    Route::group(['prefix' => 'region', 'as' => 'region.'], function () {
        Route::get('/province', 'API\RegionController@province')->name("province");
        Route::get('/city/{provinceId}', 'API\RegionController@city')->name("city");
        Route::get('/district/{cityId}', 'API\RegionController@district')->name("district");
    });

    Route::group(['prefix' => 'courier', 'as' => 'courier.'], function () {
        Route::get('/list', 'API\CourierController@list')->name("list");
        Route::post('/check-ongkir', 'API\CourierController@ongkir')->name("ongkir");
    });

    Route::group(['prefix' => 'address', 'as' => 'address.',  "middleware"=> "auth:api"], function () {
        Route::get("/", "API\ShippingAddressController@getAddress")->name("index");
        Route::post("/add", "API\ShippingAddressController@insert")->name("add");
        Route::post("/{addressId}/update", "API\ShippingAddressController@update")->name("update");
        Route::post("/{addressId}/set_primary", "API\ShippingAddressController@setPrimary")->name("setPrimary");
        Route::delete("/{addressId}/delete", "API\ShippingAddressController@delete")->name("delete");
    });
});