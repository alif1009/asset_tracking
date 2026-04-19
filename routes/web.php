<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Tambahkan ->name('login') di sini
Route::get('/login', function () {
    return view('auth.login');
})->name('login'); 

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', function () {
    return view('landing');
});


Route::post('/login', [AuthController::class, 'login']);