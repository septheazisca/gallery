<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard\KategoriController;
use App\Http\Controllers\Dashboard\ProfilController;
use App\Http\Controllers\landing\kategoriController as LandingKategoriController;
use App\Http\Controllers\landing\LandingController;
use App\Http\Controllers\landing\ProfilController as LandingProfilController;
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
// Route::get('/dashboard-kategori', function () {
//     return view('dashboard.kategori');
// });
Route::get('/dashboard-postingan', function () {
    return view('dashboard.postingan');
});
Route::get('/dashboard-pengguna', function () {
    return view('dashboard.pengguna');
});
Route::get('/dashboard-profil', [ProfilController::class, 'profil'])->name('profil');
Route::post('/dashboard/profile/update', [ProfilController::class, 'update'])->name('update');
Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/dashboard-kategori', [KategoriController::class, 'index'])->name('index');
Route::post('/kategori/{id}/update', [KategoriController::class, 'update'])->name('kategori.update');
Route::GET('/kategori/delete/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

// LANDING ------------------------------------------------------------
Route::get('/gallery', [LandingController::class, 'index'])->name('index');
Route::get('/main', [LandingController::class, 'main'])->name('main');
Route::get('/kategori', [LandingKategoriController::class, 'kategori'])->name('kategori');
Route::post('/add-album', [LandingController::class, 'addAlbum'])->name('addAlbum');
Route::post('/add-foto', [LandingController::class, 'addFoto'])->name('addFoto');
Route::post('/simpan-komentar', [LandingController::class, 'simpanKomentar'])->name('simpanKomentar');
Route::get('/profil', [LandingProfilController::class, 'profil'])->name('profil');
// Route::get('/profil', function () {
//     return view('landing.profil');
// });
