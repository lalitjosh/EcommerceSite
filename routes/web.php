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

Route::get('/','App\Http\Controllers\ECommerceController@index')->name('welcome');

Route::get('/stockPhoto',function(){
    return view('stockPhotos');

});

Route::get('/sculpture',function(){
    return view('sculpture');

});

Route::get('/shop/{id}','App\Http\Controllers\ECommerceController@add')->name('add');

Route::post('/cart/{id}','App\Http\Controllers\ECommerceController@addcart')->name('cart')->middleware(['auth']);

Route::get('/cartbox','App\Http\Controllers\ECommerceController@showAddCart')->name('cartbox')->middleware(['auth']);

Route::get('/delete/{id}','App\Http\Controllers\ECommerceController@deleteCart')->name('delete');

Route::get('/shipping','App\Http\Controllers\ECommerceController@ship')->name('shipping')->middleware(['auth']);

Route::get('/paymentCashier','App\Http\Controllers\ECommerceController@payment')->name('paymentCashier');

Route::get('/search','App\Http\Controllers\ECommerceController@searchData')->name('search');

//Route::get('/lord-ganesha-7514796/{id}','App\Http\Controllers\ECommerceController@show')->name('shop');

Route::get('/sucess','App\Http\Controllers\ECommerceController@sucess')->name('esewa.sucess');

Route::get('/failure','App\Http\Controllers\ECommerceController@failure')->name('esewa.failure');

Route::post('/verify-trans','App\Http\Controllers\ECommerceController@verify')->name('khalti.verify-trans');
Route::post('/store_payment','App\Http\Controllers\ECommerceController@verify')->name('khalti.store_payment');

Route::get('/register','App\Http\Controllers\RegisterController@index')->name('register');

Route::post('/register/save','App\Http\Controllers\RegisterController@store')->name('register.save');

Route::get('/login','App\Http\Controllers\LoginController@index')->name('login');

Route::post('/login/save','App\Http\Controllers\LoginController@store')->name('login.save');

Route::get('/welcome','App\Http\Controllers\LogoutController@store')->name('logout');