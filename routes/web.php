<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResetController;
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

Route::get('/', function () {
    return redirect()->route('login.index'); // Redirect to login page
});

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.index');
Route::post('/register', [AuthController::class, 'process_register'])->name('process.register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.index');
Route::post('/login', [AuthController::class, 'process_login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Middleware to protect the routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::get('dashboard', [AuthController::class, 'index'])->name('dashboard');

    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
});

// Routes for password reset
Route::get('forgot-password', [ResetController::class, 'showResetForm'])->name('password.request');
Route::post('forgot-password', [ResetController::class, 'resetPassword'])->name('password.update');



