<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/data-asset', function () {
    return view('data-asset');
})->name('data-asset');

Route::get('/', function () {
    return view('landing');
});

Route::get('/riwayat', function () {
    return view('riwayat');
})->name('riwayat');

Route::post('/login', [AuthController::class, 'login']);
