<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('login_process', [AuthController::class, 'login'])->name('login_process');

Route::middleware('auth:admin')->group(function () {
    Route::resource('posts', PostController::class);
});

