<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->prefix('auth')->group(
    function ($router) {

        Route::post('login', ['App\Http\Controllers\AuthController', 'login']);
        Route::post('logout', ['App\Http\Controllers\AuthController', 'logout']);
        Route::post('refresh', ['App\Http\Controllers\AuthController', 'refresh']);
        Route::post('me', ['App\Http\Controllers\AuthController', 'me']);


         Route::middleware('jwt.auth')->prefix('fruits')->group(function () {
            Route::get('/', \App\Http\Controllers\Fruits\IndexController::class);

    });
});




Route::prefix('users')->group(function () {
    Route::post('/', \App\Http\Controllers\Users\StoreController::class);

});

