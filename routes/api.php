<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')->group(function(){
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::get('user', [AuthController::class, 'user']);
    Route::get('logout', [AuthController::class, 'logout']);
    Route::post('register', [AuthController::class, 'register']);
});

//REST API // CRUD
Route::get('/devices', [DeviceController::class, 'index']);
Route::get('/devices/{device}', [DeviceController::class, 'show']);
Route::post('/devices', [DeviceController::class, 'store']);
Route::put('/devices/{device}', [DeviceController::class, 'update']);
Route::delete('/devices/{device}', [DeviceController::class, 'destroy']);
