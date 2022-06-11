<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\LemoController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProvidersController;
use App\Http\Controllers\SuperUserController;
use App\Models\Provier;
use GuzzleHttp\Middleware;
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

Route::post('/provider/add',[ProvidersController::class,'addProvider']);

Route::post('/customer',[SuperUserController::class,'adduser']);
Route::post('/provider/login',[ProvidersController::class,'login']);
Route::post('/user/login',[AuthController::class,'login']);
Route::post('/lemo/login',[LemoController::class,'login']);
Route::post('/user/add',[AuthController::class,'add']);
Route::post('/superuser/add',[SuperUserController::class,'add']);

Route::get('/car',[CarController::class,'index']);
Route::get('/cities',[CitiesController::class,'index']);
Route::get('/lemo',[LemoController::class,'index']);

Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::post('/orders/my_orders/{name}',[OrdersController::class, 'my_orders']);
    // Route::post('/orders/provider_run/{name}',[OrdersController::class, 'dohaverunning']);
    Route::post('/orders/getorders/{name}',[OrdersController::class, 'getorders']);
  
  
    Route::post('/provider/search/{name}',[ProvidersController::class, 'search']);
    Route::post('/orders/search/{name}',[OrdersController::class, 'search']);
    Route::post('/provider/account/{name}',[ProvidersController::class, 'account']);
    // // Route::resource('provcider',ProvidersController::class);
    Route::post('/lemo/add',[LemoController::class,'store']);
    Route::post('/car/add',[CarController::class,'store']);
    Route::post('/cities/add',[CitiesController::class,'store']);
    Route::get('/superuser/get',[SuperUserController::class,'index']);
    Route::post('/superuser/search/{name}',[SuperUserController::class, 'search']);
    Route::resource('orders',OrdersController::class);
    // Route::resource('car',CarController::class);
    // Route::resource('cities',CitiesController::class);
    Route::resource('provider',ProvidersController::class);
    Route::post('/user/logout',[AuthController::class,'logout']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
