<?php

use App\Http\Controllers\Admin\PostController;
use App\Models\AdminUser;
use Illuminate\Support\Facades\Route;

Route::get('login', [AdminUser::class, 'index'])->name('admin.login');
Route::get('login_process', [AdminUser::class, 'login'])->name('admin.login_process');

Route::middleware('auth:admin')->group(function () {
    Route::resource('posts', PostController::class);
});

