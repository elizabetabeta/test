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

Route::get('/kontakt', 'App\Http\Controllers\HomeController@kontakt');
;
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');

Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->middleware('role:Admin')->name('users');
Route::get('/userdelete{user}', 'App\Http\Controllers\UsersController@userdelete')->middleware('role:Admin');

Route::get('/profile/delete/{id}', 'App\Http\Controllers\UsersController@deleteprofil')->name('profile.delete');
Route::get('/users/delete/{id}', 'App\Http\Controllers\UsersController@deleteuser')->name('user.delete');

Route::post('/users/add', 'App\Http\Controllers\UsersController@add')->middleware('role:Admin')->name('users.add');

Route::get('/profile{user}', 'App\Http\Controllers\UsersController@profile');
Route::get('/editprofile{user}', 'App\Http\Controllers\UsersController@edit');
Route::put('/profile/update/{user}', 'App\Http\Controllers\UsersController@update');

Route::get('/comments{user}', 'App\Http\Controllers\CommentController@comments');
Route::post('/comment/add/{user}', 'App\Http\Controllers\CommentController@makecomment');
Route::get('/deletecomment{comment}', 'App\Http\Controllers\CommentController@delete');
Route::get('/comment/delete/{comment}', 'App\Http\Controllers\CommentController@commentdelete')->name('comment.delete');

Route::get('/user{user}edit', 'App\Http\Controllers\UsersController@editrole')->name('user.editrole');
Route::put('/user/update/{user}', 'App\Http\Controllers\UsersController@changerole');

Route::get('/searchuser/', 'App\Http\Controllers\UsersController@search')->name('searchuser');
Route::get('/searchprofile/', 'App\Http\Controllers\UsersController@searchprofile')->name('searchprofile');
Route::get('/listofprofiles', 'App\Http\Controllers\UsersController@svikorisnici')->name('listofprofiles');

Route::get('/search/', 'App\Http\Controllers\DeviceController@search')->name('search');
Route::get('/searchprodani/', 'App\Http\Controllers\DeviceController@searchProdani')->name('searchprodani');
Route::get('/searchdostupni/', 'App\Http\Controllers\DeviceController@searchDostupni')->name('searchdostupni');
Route::get('/dostupni', 'App\Http\Controllers\DeviceController@dostupni')->middleware('auth')->name('dostupni');
Route::get('/prodani', 'App\Http\Controllers\DeviceController@prodani')->middleware('auth')->name('prodani');

Route::get('/oglasi','App\Http\Controllers\DeviceController@index')->middleware('auth')->name('devices.index');
Route::get('/mojioglasi','App\Http\Controllers\DeviceController@mojioglasi')->middleware('auth');
Route::post('/oglas', 'App\Http\Controllers\DeviceController@store');
//Route::post('/oglasEdit', 'App\Http\Controllers\DeviceController@update');

Route::get('/oglasi{device}edit', 'App\Http\Controllers\DeviceController@edit')->name('device.edit');
Route::put('/oglasi/update/{device}', 'App\Http\Controllers\DeviceController@update');
Route::get('/devices/isSold/{id}', 'App\Http\Controllers\DeviceController@changeIsSold')->name('devices.isSold');

Route::get('/oglasi{device}', 'App\Http\Controllers\DeviceController@show')->middleware('auth');
Route::get('/devices/delete/{id}', 'App\Http\Controllers\DeviceController@delete')->name('devices.delete');
Route::get('/devices/delete2/{id}', 'App\Http\Controllers\DeviceController@delete2')->name('devices.delete2');




