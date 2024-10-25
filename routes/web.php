<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;


 // EJEMPLO GROUP

// Route::controller(OrderController::class)->group(function () {
//     Route::get('/orders/{id}', 'show');
//     Route::post('/orders', 'store');
// });

Route::get('/users/login', [AuthController::class, 'login']); 
Route::post('/register', [AuthController::class, 'register']); 

Route::get('/users', [UserController::class, 'getAll']); //index recomendado
Route::get('/users/{id}', [UserController::class, 'getById']); 
Route::post('/users/{id}', [UserController::class, 'softDelete']);  //borrado logico
Route::put('/users/{id}', [UserController::class, 'updateById']); 








//default laravel
Route::get('/', function () {
    return view('welcome');
});
