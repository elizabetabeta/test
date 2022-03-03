<?php

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

//REST API // CRUD
Route::get('/devices', [DeviceController::class, 'index']);
Route::get('/devices/{device}', [DeviceController::class, 'show']);
Route::post('/devices', [DeviceController::class, 'store']);
Route::put('/devices/{device}', [DeviceController::class, 'update']);
Route::delete('/devices/{device}', [DeviceController::class, 'destroy']);
