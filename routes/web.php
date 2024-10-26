<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Ruta por defecto de Laravel
Route::get('/', function () {
    return view('welcome');
});
