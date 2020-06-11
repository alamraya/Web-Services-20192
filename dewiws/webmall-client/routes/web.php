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

//auth
Auth::routes();
Route::get('register','AuthController@formRegister')->name('register');
Route::post('/register/store','AuthController@storeRegister');
Route::get('login','AuthController@formLogin')->name('login');
Route::post('/login/store','AuthController@storeLogin');
// ->middleware('auth.basic.once');



//FRONT END
//home front end
Route::get('/', 'HomeController@index')->name('home');
//tampil produk
Route::resource('products','ProductController');
Route::get('products','ProductController@index')->name('shop');
Route::get('products/{product}','ProductController@show');


//DASHBOARD SELLER
Route::resource('/dashboard','DashboardController');
//CRUD produk bagi seller
//menampilkan data produk
Route::get('products_dashboard','ProductController@dashboard');
//detail produk seller
Route::get('products_dashboard/{product}/detail','ProductController@detail_product_dashboard');
//form tambah data
Route::get('/products_dashboard/create','ProductController@ShowFormCreate');
//proses tambah data
Route::post('/products_dashboard/creating','ProductController@store')->name('post_dataproduk');
//form update produk
Route::get('/products_dashboard/{product}/update','ProductController@ShowFormUpdate');
//proses update produk
Route::post('/products_dashboard/{product}/updating','ProductController@updating');
//proses delete produk
Route::get('/products_dashboard/{product}/deleting','ProductController@destroy');

//form buat shop
Route::get('/shop','ShopController@form')->name('form_register_shop');
Route::post('/shop','ShopController@store')->name('register_shop');



//category
// Route::resource('category','CategoryController');



//cart
Route::get('/cart','CartController@index')->name('cart.index');



