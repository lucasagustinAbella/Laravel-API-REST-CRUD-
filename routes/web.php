<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

Route::get('/users', [UserController::class, 'getAll']); //index recomendado
Route::get('/users/{id}', [UserController::class, 'getById']); 
Route::post('/users/{id}', [UserController::class, 'softDelete']);  //borrado logico
Route::put('/users/{id}', [UserController::class, 'updateById']); 

Route::get('/login', [AuthController::class, 'login']); 
Route::post('/register', [AuthController::class, 'register']); 







//default
Route::get('/', function () {
    return view('welcome');
});
