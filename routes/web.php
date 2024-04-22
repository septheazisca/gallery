<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\FotoController as DashboardFotoController;
use App\Http\Controllers\Dashboard\JenisLaporanController;
use App\Http\Controllers\Dashboard\KategoriController;
use App\Http\Controllers\Dashboard\PelaporanController;
use App\Http\Controllers\Dashboard\ProfilController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\landing\AlbumController;
use App\Http\Controllers\landing\FotoController;
use App\Http\Controllers\landing\kategoriController as LandingKategoriController;
use App\Http\Controllers\landing\KomentarController;
use App\Http\Controllers\landing\LandingController;
use App\Http\Controllers\landing\LikeController;
use App\Http\Controllers\landing\ProfilController as LandingProfilController;
use Illuminate\Support\Facades\Route;

// AUTH ------------------------------------------------------------
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// DASHBOARD ------------------------------------------------------------
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/dashboard-profil', [ProfilController::class, 'profil'])->name('profil');
Route::post('/dashboard/profile/update', [ProfilController::class, 'update'])->name('update');
Route::get('/dashboard-kategori', [KategoriController::class, 'index'])->name('index');
Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
Route::post('/kategori/{id}/update', [KategoriController::class, 'update'])->name('kategori.update');
Route::GET('/kategori/delete/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
Route::get('/dashboard-foto', [DashboardFotoController::class, 'foto'])->name('foto');
Route::get('/dashboard-jenis-laporan', [JenisLaporanController::class, 'index'])->name('index');
Route::post('/jenis-laporan', [JenisLaporanController::class, 'store'])->name('jenis-laporan.store');
Route::post('/jenis-laporan/update/{id}', [JenisLaporanController::class, 'update'])->name('jenis-laporan.update');
Route::delete('/jenis-laporan/delete/{id}', [JenisLaporanController::class, 'destroy'])->name('jenis-laporan.destroy');
Route::get('/dashboard-pelaporan', [PelaporanController::class, 'index'])->name('index');
Route::get('/dashboard-user', [UserController::class, 'user'])->name('user');

// LANDING ------------------------------------------------------------
Route::get('/', [LandingController::class, 'index'])->name('index');
Route::get('/main', [LandingController::class, 'main'])->name('main');
Route::get('/kategori', [LandingKategoriController::class, 'kategori'])->name('kategori');
Route::get('/show-kategori/{kategori_id}', [LandingKategoriController::class, 'showKategori'])->name('showKategori');
Route::post('/add-album', [LandingController::class, 'addAlbum'])->name('addAlbum');
Route::post('/edit-album/{id}', [AlbumController::class, 'editAlbum'])->name('editAlbum');
Route::get('/delete-album/{id}', [AlbumController::class, 'deleteAlbum'])->name('deleteAlbum');
Route::post('/add-foto', [FotoController::class, 'addFoto'])->name('addFoto');
Route::post('/edit-foto/{id}', [FotoController::class, 'editFoto'])->name('editFoto');
Route::get('/hapus-foto/{id}', [FotoController::class, 'hapusFoto'])->name('hapusFoto');
Route::post('/store/comment', [KomentarController::class, 'store'])->name('comments.photo');
Route::get('/get/comment/{id}', [KomentarController::class, 'getComment'])->name('get.comments.photo');
Route::post('/toggle-like', [LikeController::class, 'toggleLike'])->name('toggle-like');
Route::get('/get-like-status', [LikeController::class, 'getLikeStatus'])->name('get-like-status');
Route::get('/show-album/{album_id}', [AlbumController::class, 'showAlbum'])->name('showAlbum');
Route::get('/search', [LandingController::class, 'search'])->name('search');
Route::get('/profil/{id}', [LandingProfilController::class, 'profil'])->name('profil');
Route::get('/profil/edit', [LandingController::class, 'masterUser'])->name('masterUser');
Route::post('/profil/update', [LandingProfilController::class, 'updateProfile'])->name('updateProfile');

// EXPORT PDF
Route::get('/export-pdf', [ExportController::class, 'exportPDF'])->name('exportPDF');


