<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Tambahkan ->name('login') di sini
Route::get('/login', function () {
    return view('auth.login');
})->name('login'); 

// Proses login
Route::post('/login', [AuthController::class, 'login']);