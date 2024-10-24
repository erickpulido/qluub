<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin-login', function () {
    return view('auth/admin-login', ['title' => "Admin login"]);
});

Route::get('/admin-register', function () {
    return view('auth/admin-register', ['title' => "Admin register"]);
});

Route::get('/client-login', function () {
    return view('auth/admin-login', ['title' => "Client login"]);
});

Route::get('/client-register', function () {
    return view('auth/admin-register', ['title' => "Client register"]);
});

Route::group(['middleware' => ['role:Admin']], function () {
    Route::get('/', function () {
        return view('products/view-products', ['title' => "Productos"]);
    });
});
