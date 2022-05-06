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

Route::get('/o-nama', function () {
    return view('o-nama');
});

Route::get('/oglasi', function () {
    return view('oglasi');
});

Route::get('/uroglasa', function () {
    return view('oglasi');
});

Route::get('/create', function () {
    return view('create');
});

Route::get('/mojioglasi', function () {
    return view('mojioglasi');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('users');
Route::get('/users/delete/{id}', 'App\Http\Controllers\UsersController@delete')->name('users.delete');
Route::post('/users/add', 'App\Http\Controllers\UsersController@add')->name('users.add');

Route::get('/oglasi','App\Http\Controllers\DeviceController@index');
Route::get('/mojioglasi','App\Http\Controllers\DeviceController@index2');
Route::post('/oglas', 'App\Http\Controllers\DeviceController@store');
Route::get('/oglas/{device}', 'App\Http\Controllers\DevicesController@show');
Route::get('/devices/delete/{id}', 'App\Http\Controllers\DeviceController@delete')->name('devices.delete');
Route::get('/devices/delete2/{id}', 'App\Http\Controllers\DeviceController@delete2')->name('devices.delete2');


Route::resource('products', 'App\Http\Controllers\ProductController');



