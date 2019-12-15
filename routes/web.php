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

// Route::get('/', function () {
//     return view('welcome');
// });

use Carbon\Carbon;

Auth::routes();

Route::get('/', function(){
    return view('mainmenu');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/owner', 'HomeController@ownerIndex')->name('owner');
Route::resource('/menu', 'DishController');
Route::resource('/cart', 'CartController');
Route::get('/order', 'CartController@order')->name('order');
Route::get('/orderlist', 'CartController@orderlist')->name('orderlist');
Route::put('/checkout/{id}','CartController@checkout')->name('checkout');
Route::get('/receipt/{id}','CartController@receipt')->name('receipt');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


// Route::get('/order', 'CartController@index');
// Route::post('/order', 'CartController@create');
// Route::get('/cart', 'CartController@viewCart');
// Route::post('/cart', 'CartController@update');




