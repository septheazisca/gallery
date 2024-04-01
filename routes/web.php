<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// AUTH ------------------------------------------------------------
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



// DASHBOARD ------------------------------------------------------------
Route::get('/dashboard-index', function () {
    return view('dashboard.index');
});
Route::get('/dashboard-kategori', function () {
    return view('dashboard.kategori');
});
Route::get('/dashboard-postingan', function () {
    return view('dashboard.postingan');
});
Route::get('/dashboard-pengguna', function () {
    return view('dashboard.pengguna');
});
Route::get('/dashboard-profil', function () {
    return view('dashboard.profil');
});



// LANDING ------------------------------------------------------------
Route::get('/gallery', function () {
    return view('landing.index');
});
Route::get('/kategori', function () {
    return view('landing.kategori');
});
Route::get('/profil', function () {
    return view('landing.profil');
});
