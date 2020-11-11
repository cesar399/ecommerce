<?php

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

Route::get('/', 'StoreController@index')->name('home');
Route::get('product/{id}', 'StoreController@show')->name('store.show');

Route::middleware(['auth'])->group(function() {
	Route::get('admin/', function(){
	return view('admin.home');
	});
	Route::resource('admin/products', 'Admin\ProductController');
	Route::get('order-detail', 'CartController@orderDetail')->name('order-detail');
});




Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');


Route::get('cart/show', 'CartController@show')->name('cart-show');
Route::get('cart/add/{product}', 'CartController@add')->name('cart-add');
Route::get('cart/delete/{product}', 'CartController@delete')->name('cart-delete');
Route::get('cart/trash', 'CartController@trash')->name('cart-trash');
Route::get('cart/update/{product}/{quantity?}', 'CartController@update')->name('cart-update');

