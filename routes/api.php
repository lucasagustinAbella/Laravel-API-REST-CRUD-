<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


//no uso resource porque esta integrada la autorizacion tmb 

Route::prefix('users')->group(function () {
    // Autenticación
    Route::get('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/', [UserController::class, 'getAll']);
    Route::get('/{id}', [UserController::class, 'getById']);
    Route::put('/{id}', [UserController::class, 'updateById']);
    Route::delete('/{id}', [UserController::class, 'destroy']); //delete
});


Route::prefix('posts')->group(function () {
    Route::get('/', [PostController::class, 'getAll']);
    Route::post('/create', [PostController::class, 'create']);
    Route::get('/{id}', [PostController::class, 'getById']);
    Route::put('/{id}', [PostController::class, 'updateById']);
    Route::delete('/{id}', [PostController::class, 'destroy']); //delete
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');