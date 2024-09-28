<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\UserDetailController;
use App\Http\Controllers\AuthController;

// Route untuk login dan logout
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route yang memerlukan autentikasi
Route::middleware('auth')->group(function () {
    // Route untuk dashboard
    Route::get('/dashboard', [MuridController::class, 'dashboard'])->name('dashboard');

    // Route untuk menampilkan semua murid (index) dan fungsi CRUD hanya untuk admin
    Route::middleware('admin')->group(function () {
        Route::get('/murid', [MuridController::class, 'index'])->name('murid.index');
        Route::get('/murid/create', [MuridController::class, 'create'])->name('murid.create');
        Route::post('/murid', [MuridController::class, 'store'])->name('murid.store');
        Route::resource('murid', MuridController::class);
    });

    // Route untuk detail murid
    Route::get('/murid/detail/{id}', [UserDetailController::class, 'show'])->name('murid.detailuser');
});

// Route untuk halaman utama
Route::get('/', function () {
    return view('welcome');
})->name('home');
