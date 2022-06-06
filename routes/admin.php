<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;

Route::get('login', [AuthController::class, 'index'])->name('admin.login');
Route::get('login_process', [AuthController::class, 'login'])->name('admin.login_process');

Route::middleware('auth:admin')->group(function () {
    Route::resource('posts', PostController::class);
});

