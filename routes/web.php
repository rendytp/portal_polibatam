<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Middleware;

// Halaman Publik
Route::get('/', [HomeController::class, 'index'])->name('landing');

// Autentikasi
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute untuk User Login
Route::middleware('auth')->group(function () {
    
    // Fitur User
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/search', [UserController::class, 'search'])->name('search');
    
    Route::get('/bookmarks', [UserController::class, 'bookmarks'])->name('bookmarks');
    Route::post('/bookmarks/toggle/{id}', [UserController::class, 'toggleBookmark'])->name('bookmarks.toggle');
    
    Route::get('/custom-links', [UserController::class, 'customLinks'])->name('custom.links');
    Route::post('/custom-links', [UserController::class, 'storeCustomLink'])->name('custom.links.store');
    Route::put('/custom-links/{id}', [UserController::class, 'updateCustomLink'])->name('custom.links.update');
    Route::delete('/custom-links/{id}', [UserController::class, 'deleteCustomLink'])->name('custom.links.delete');
    
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::put('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::put('/profile/password', [UserController::class, 'updatePassword'])->name('profile.password');

    // Rute Khusus Admin
        Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
        
        Route::get('/services', [AdminController::class, 'manageServices'])->name('services');
        Route::post('/services', [AdminController::class, 'storeService'])->name('services.store');
        Route::put('/services/{id}', [AdminController::class, 'updateService'])->name('services.update');
        Route::delete('/services/{id}', [AdminController::class, 'deleteService'])->name('services.delete');
        
        Route::get('/users', [AdminController::class, 'manageUsers'])->name('users');
        Route::delete('/users/{id}', [AdminController::class, 'deleteUser'])->name('users.delete');
    });
});