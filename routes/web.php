<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'home'])->name('home');

Route::prefix('posts')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::get('/{id}', [PostController::class, 'show'])->name('posts.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('/posts/comment/{id}', [CommentController::class, 'comment'])->name('comment');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login_process', [LoginController::class, 'login'])->name('login_process');

    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/register_process', [RegisterController::class, 'register'])->name('register_process');
});

Route::get('/contacts', [ContactController::class, 'showContactForm'])->name('contacts');
Route::post('/contact_form_process', [ContactController::class, 'ContactForm'])->name('contact_form_process');
