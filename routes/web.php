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

Auth::routes();

Route::get('/', 'DishController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/owner', 'HomeController@ownerIndex')->name('owner');
Route::resource('/menu', 'DishController');

Route::get('/order', 'CartController@index');
Route::post('/store', 'CartController@create');
Route::get('/cart', 'CartController@viewCart');



