<?php

use App\Http\Controllers\LemoController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProvidersController;
use App\Http\Controllers\SuperUserController;
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
Route::resource('provider',ProvidersController::class);
Route::resource('lemo',LemoController::class);
Route::resource('superuser',SuperUserController::class);
Route::resource('orders',OrdersController::class);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
