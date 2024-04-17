<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard\KategoriController;
use App\Http\Controllers\Dashboard\ProfilController;
use App\Http\Controllers\landing\AlbumController;
use App\Http\Controllers\landing\kategoriController as LandingKategoriController;
use App\Http\Controllers\landing\KomentarController;
use App\Http\Controllers\landing\LandingController;
use App\Http\Controllers\landing\ProfilController as LandingProfilController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [LandingController::class, 'index'])->name('index');
Route::get('/main', [LandingController::class, 'main'])->name('main');
Route::get('/kategori', [LandingKategoriController::class, 'kategori'])->name('kategori');
Route::get('/show-kategori/{kategori_id}', [LandingKategoriController::class, 'showKategori'])->name('showKategori');
Route::post('/add-album', [LandingController::class, 'addAlbum'])->name('addAlbum');
Route::post('/add-foto', [LandingController::class, 'addFoto'])->name('addFoto');
Route::post('/edit-foto/{id}', [LandingController::class, 'editFoto'])->name('editFoto');
Route::get('/hapus-foto/{id}', [LandingController::class, 'hapusFoto'])->name('hapusFoto');
// Route::post('/simpan-komentar', [LandingController::class, 'simpanKomentar'])->name('simpanKomentar');
Route::post('/store/comment', [KomentarController::class, 'store'])->name('comments.photo');
Route::get('/get/comment/{id}', [KomentarController::class, 'getComment'])->name('get.comments.photo');
Route::get('/search', [LandingController::class, 'search'])->name('search');


Route::get('/profil', [LandingProfilController::class, 'profil'])->name('profil');
Route::get('/show-album/{album_id}', [AlbumController::class, 'showAlbum'])->name('showAlbum');


