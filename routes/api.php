<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


//no uso resource porque esta integrada la autorizacion tmb 

Route::prefix('users')->group(function () {
    // Autenticación
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/', [UserController::class, 'getAll']);
    Route::get('/{id}', [UserController::class, 'getById']);
    Route::put('/{id}', [UserController::class, 'updateById']);
    Route::delete('/{id}', [UserController::class, 'softDelete']);
});
