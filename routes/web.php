<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CommentController;

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

Route::get('/', [HomeController::class, 'welcome'])->name('welcome');

Route::get('/kontakt', [HomeController::class, 'kontakt']);
;
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::get('/users', [UsersController::class, 'index'])->middleware('role:Admin')->name('users');
Route::get('/userdelete{user}', [UsersController::class, 'userdelete'])->middleware('role:Admin');

Route::get('/profile/delete/{id}',  [UsersController::class, 'deleteprofil'])->name('profile.delete');
Route::get('/users/delete/{id}', [UsersController::class, 'deleteuser'])->name('user.delete');

Route::post('/users/add', [UsersController::class, 'add'])->middleware('role:Admin')->name('users.add');

Route::get('/profile{user}', [UsersController::class, 'profile']);
Route::get('/editprofile{user}', [UsersController::class, 'edit']);
Route::put('/profile/update/{user}',  [UsersController::class, 'update']);

Route::get('/comments{user}', [CommentController::class, 'comments']);
Route::post('/comment/add/{user}', [CommentController::class, 'makecomment']);
Route::get('/deletecomment{comment}', [CommentController::class, 'delete']);
Route::get('/comment/delete/{comment}', [CommentController::class, 'commentdelete'])->name('comment.delete');

Route::get('/user{user}edit', [UsersController::class, 'editrole'])->name('user.editrole');
Route::put('/user/update/{user}', [UsersController::class, 'changerole']);

Route::get('/searchuser/', [UsersController::class, 'search'])->name('searchuser');
Route::get('/searchprofile/', [UsersController::class, 'searchprofile'])->name('searchprofile');
Route::get('/listofprofiles', [UsersController::class, 'svikorisnici'])->name('listofprofiles');

Route::get('/search/', [DeviceController::class, 'search'])->name('search');
Route::get('/searchprodani/', [DeviceController::class, 'searchProdani'])->name('searchprodani');
Route::get('/searchdostupni/', [DeviceController::class, 'searchDostupni'])->name('searchdostupni');
Route::get('/dostupni', [DeviceController::class, 'dostupni'])->middleware('auth')->name('dostupni');
Route::get('/prodani', [DeviceController::class, 'prodani'])->middleware('auth')->name('prodani');

Route::get('/oglasi',[DeviceController::class, 'index'])->middleware('auth')->name('devices.index');
Route::get('/mojioglasi',[DeviceController::class, 'mojioglasi'])->middleware('auth');
Route::post('/oglas', [DeviceController::class, 'store']);

Route::get('/oglasi{device}edit', [DeviceController::class, 'edit'])->name('device.edit');
Route::put('/oglasi/update/{device}', [DeviceController::class, 'update']);
Route::get('/devices/isSold/{id}', [DeviceController::class, 'changeIsSold'])->name('devices.isSold');

Route::get('/oglasi{device}', [DeviceController::class, 'show'])->middleware('auth');
Route::get('/devices/delete/{id}', [DeviceController::class, 'delete'])->name('devices.delete');
Route::get('/devices/delete2/{id}', [DeviceController::class, 'delete2'])->name('devices.delete2');




