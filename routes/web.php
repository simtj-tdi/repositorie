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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/test', 'CustomerController@test');
Route::get('/', 'CustomerController@index');
Route::get('/customer/{customerId}', 'CustomerController@show');
Route::get('/customer/{customerId}/update', 'CustomerController@update');
Route::get('/customer/{customerId}/delete', 'CustomerController@destory');
