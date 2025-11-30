<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PesananController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/**
 * 🚀 Dashboard
 */
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/**
 * 👤 Profile + Export Layanan (Admin & User boleh)
 */
Route::middleware('auth')->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Export layanan
    Route::get('/layanan-export', [LayananController::class, 'exportExcel'])
        ->name('layanan.export');
});

/**
 * 👑 Admin Routes
 */
Route::middleware(['auth', 'role:admin'])->group(function () {

    // CRUD Karyawan & Layanan
    Route::resource('karyawan', KaryawanController::class);
    Route::resource('layanan', LayananController::class);

    // Export karyawan (HANYA admin)
    Route::get('/karyawan-export', [KaryawanController::class, 'exportExcel'])
        ->name('karyawan.export');
});

/**
 * 👷 User + Admin — Pesanan
 */
Route::middleware('auth')->group(function () {
    Route::resource('pesanan', PesananController::class);
});

/**
 * Auth (Breeze)
 */
require __DIR__.'/auth.php';
