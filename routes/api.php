<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/signup', [AuthController::class, 'signUp'])->name('signup');
Route::post('/signin', [AuthController::class, 'login'])->name('signin');
Route::middleware('auth:sanctum')->group(function(){
    Route::resource("products", ProductController::class);
});
Route::get('/signin', [AuthController::class, 'signin'])->name('signin');