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

Route::get('/', 'App\Http\Controllers\HomeController@welcome')->name('welcome');


Route::get('/o-nama', function () {
    return view('o-nama');
});

Route::get('/kontakt', 'App\Http\Controllers\HomeController@kontakt')->middleware('auth');
;
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');

Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->middleware('role:Admin')->name('users');
Route::get('/users/deleteuser/{id}', 'App\Http\Controllers\UsersController@delete')->middleware('role:Admin')->name('users.delete');
Route::get('/users/delete/{id}', 'App\Http\Controllers\UsersController@deleteprofil')->name('profile.delete');
Route::post('/users/add', 'App\Http\Controllers\UsersController@add')->middleware('role:Admin')->name('users.add');
Route::get('/profile{user}', 'App\Http\Controllers\UsersController@profile');
Route::get('/profile{user}/edit', 'App\Http\Controllers\UsersController@edit')->name('user.edit');
Route::put('/profile/update/{user}', 'App\Http\Controllers\UsersController@update');
Route::get('/searchuser/', 'App\Http\Controllers\UsersController@search')->name('searchuser');
Route::get('/searchprofile/', 'App\Http\Controllers\UsersController@searchprofile')->name('searchprofile');
Route::get('/listofprofiles', 'App\Http\Controllers\UsersController@svikorisnici')->name('listofprofiles');

Route::get('/search/', 'App\Http\Controllers\DeviceController@search')->name('search');
Route::get('/dostupni', 'App\Http\Controllers\DeviceController@dostupni')->name('dostupni');
Route::get('/prodani', 'App\Http\Controllers\DeviceController@prodani')->name('prodani');

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




