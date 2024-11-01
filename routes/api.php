<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


//no uso resource porque esta integrada la autorizacion tmb 

Route::prefix('users')->group(function () {
    // Autenticación
    Route::post('/login', [AuthController::class, 'login'])->name('login'); 
    Route::post('/register', [AuthController::class, 'register']);

    Route::middleware('auth')->group(function () {
        Route::get('/', [UserController::class, 'getAll']);
        Route::get('/{id}', [UserController::class, 'getById']);
        Route::put('/{id}', [UserController::class, 'update']);
        Route::delete('/{id}', [UserController::class, 'destroy']);
    });
});

Route::prefix('posts')->group(function () {
    Route::get('/', [PostController::class, 'index']);
    Route::put('/{id}', [PostController::class, 'update']);
    Route::post('/create', [PostController::class, 'store']);
    Route::get('/{id}', [PostController::class, 'show']);
    Route::delete('/{id}', [PostController::class, 'destroy']); //delete
});

// Route::resource('posts', PostController::class);
