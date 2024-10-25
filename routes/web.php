<?php

use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

Route::get('/users', [UserController::class, 'getAll']); //index recomendado





//default
Route::get('/', function () {
    return view('welcome');
});
