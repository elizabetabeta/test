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

Route::get('/kontakt', function () {
    return view('kontakt');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('users');
Route::get('/users/delete/{id}', 'App\Http\Controllers\UsersController@delete')->name('users.delete');
Route::post('/users/add', 'App\Http\Controllers\UsersController@add')->name('users.add');

Route::get('/search/', 'App\Http\Controllers\DeviceController@search')->name('search');
Route::get('/oglasi/dostupni', 'App\Http\Controllers\DeviceController@dostupni')->name('dostupni');
Route::get('/oglasi/prodani', 'App\Http\Controllers\DeviceController@prodani')->name('prodani');

Route::get('/oglasi','App\Http\Controllers\DeviceController@index')->middleware('auth')->name('devices.index');
Route::get('/mojioglasi','App\Http\Controllers\DeviceController@mojioglasi')->middleware('auth');;
Route::post('/oglas', 'App\Http\Controllers\DeviceController@store');
//Route::post('/oglasEdit', 'App\Http\Controllers\DeviceController@update');

Route::get('/oglasi/edit/{device}', 'App\Http\Controllers\DeviceController@edit')->name('device.edit');
Route::put('/oglasi/update/{device}', 'App\Http\Controllers\DeviceController@update');
Route::get('/devices/isSold/{id}', 'App\Http\Controllers\DeviceController@changeIsSold')->name('devices.isSold');

Route::get('/oglasi/{device}', 'App\Http\Controllers\DeviceController@show');
Route::get('/devices/delete/{id}', 'App\Http\Controllers\DeviceController@delete')->name('devices.delete');
Route::get('/devices/delete2/{id}', 'App\Http\Controllers\DeviceController@delete2')->name('devices.delete2');
Route::get('devices/edit/{id}', 'App\Http\Controllers\DeviceController@edit')->name('devices.edit');




