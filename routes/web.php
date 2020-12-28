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

Route::get('/', function () {
    return view('users.register');
});

Route::post('/store', 'CustomerController@store');

Route::get('/table', 'CustomerController@view');

Route::get('/admin', 'CustomerController@index');

Route::get('/table/{id}', 'CustomerController@show');

Route::get('/edit/{id}', 'CustomerController@edit');

Route::get('/delete/{id}', 'CustomerController@destroy');

Route::get('/page', function () {
    return view('users.page');
});


