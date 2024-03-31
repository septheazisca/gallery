<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// AUTH ------------------------------------------------------------
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/signup', function () {
    return view('auth.signup');
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
