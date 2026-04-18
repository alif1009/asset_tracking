<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Tambahkan ->name('login') di sini
Route::get('/', function () {
    return view('auth.login');
})->name('login'); 

Route::get('/dashboard', function () {
    return view('dashboard');
});

// Proses login
Route::post('/login', [AuthController::class, 'login']);