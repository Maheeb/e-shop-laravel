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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/','MainController@index')->name('main.index');

//Route::get('products','ProductController@index')->name('products.index');
//Route::get('products/new','ProductController@create')->name('products.create');
//Route::get('products/{product}','ProductController@show')->name('products.show');
//Route::delete('products/{product}','ProductController@destroy')->name('products.destroy');
//Route::get('products/{product}/edit','ProductController@edit')->name('products.edit');
//Route::match(['put','patch'],'products/{product}','ProductController@update')->name('products.update');
//Route::post('products','ProductController@store')->name('products.store');

Route::resource('products.carts','ProductCartController')->only(['store','destroy']);
Route::resource('orders','OrderController')->only(['create','store'])->middleware(['verified']);
Route::resource('orders.payments','OrdePaymentController')->only(['create','store'])->middleware(['verified']);
Route::resource('carts','CartController')->only(['index']);
Auth::routes([
    'verify' => true,
    // 'reset' => false
]);

// Route::get('/home', 'HomeController@index')->name('home');
