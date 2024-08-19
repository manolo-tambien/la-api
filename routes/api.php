<?php

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
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

Route::group(['middleware' => 'jwt.auth', 'namespace' => 'App\Http\Controllers'], function () {
    //Route::apiResource('products', ProductController::class);
    Route::get('productos', [ProductController::class, 'index']);
    Route::get('user-profile', [AuthController::class, 'userProfile']);
});

Route::post('login', 'App\Http\Controllers\AuthController@login');
Route::post('health', 'App\Http\Controllers\AuthController@health');
Route::post('register', 'App\Http\Controllers\AuthController@register');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

