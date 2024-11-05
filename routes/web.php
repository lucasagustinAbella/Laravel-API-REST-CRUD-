<?php

use Illuminate\Support\Facades\Route;

// Ruta por defecto de Laravel

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/email/verify', function () {
//     return view('auth');
// })->middleware('auth')->name('verification.notice');