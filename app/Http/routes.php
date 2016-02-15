<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/atk', 'AtkController@index');

Route::get('/atk/add', 'AtkController@add');

Route::post('/atk/add', 'AtkController@postAdd');

Route::get('/pengadaan', 'PengadaanController@index');

Route::get('/pengadaan/add', 'PengadaanController@add');

Route::post('/pengadaan/add', 'PengadaanController@postAdd');

Route::get('/pemakaian', 'PemakaianController@index');

Route::get('/pemakaian/add', 'PemakaianController@add');

Route::post('/pemakaian/add', 'PemakaianController@postAdd');

Route::get('/booking', 'BookingController@index');

Route::get('/booking/add', 'BookingController@add');

Route::post('/booking/add', 'BookingController@postAdd');

Route::get('/user', 'UserController@index');

Route::get('/user/add', 'UserController@add');

Route::post('/user/add', 'UserController@postAdd');

Route::get('/supplier', 'SupplierController@index');

Route::get('/supplier/add', 'SupplierController@add');

Route::post('/supplier/add', 'SupplierController@postAdd');

Route::get('/statistik', 'StatistikController@index');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
