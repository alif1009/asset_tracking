<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

// ==========================================
// RUTE PUBLIK (Bisa Diakses Tanpa Login)
// ==========================================
Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);


// ==========================================
// RUTE PROTECTED (Wajib Login / Hak Akses Admin)
// ==========================================
Route::middleware('auth')->group(function () {
    
    // Dashboard Utama
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Data Asset
    Route::get('/data-asset', function () {
        return view('data-asset');
    })->name('data-asset');

    // Riwayat Lokasi
    Route::get('/riwayat', function () {
        return view('riwayat');
    })->name('riwayat');

    // Manajemen Profil
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Proses Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});