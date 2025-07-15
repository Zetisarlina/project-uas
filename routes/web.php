<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;

// Redirect root ke login
Route::get('/', fn() => redirect('/login'));

// Route Login & Logout
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Semua fitur hanya bisa diakses setelah login
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Surat Masuk (CRUD + Cetak PDF)
    Route::resource('/surat-masuk', SuratMasukController::class);
    Route::get('/surat-masuk/{id}/cetak', [SuratMasukController::class, 'cetak'])->name('surat-masuk.cetak');

    // Surat Keluar (CRUD + Cetak PDF)
    Route::resource('/surat-keluar', SuratKeluarController::class);
    Route::get('/surat-keluar/{id}/cetak', [SuratKeluarController::class, 'cetak'])->name('surat-keluar.cetak');

});