<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(App\Http\Controllers\AuthController::class)
    ->group(function () {
        Route::post('/authenticate', 'authenticate');
        Route::post('/logout', 'logout');
    });

//Route::group(['middleware' => 'guest'], function () {
    Route::apiResources([
        '/products' => App\Http\Controllers\ProductController::class,
    ]);
//});
    
//Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResources([
        '/users' => App\Http\Controllers\UserController::class,
    ]);
//});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index']);
});