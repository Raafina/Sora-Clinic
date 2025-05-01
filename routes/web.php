<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing/home', [
        'title' => 'Home'
    ]);
});

Route::get('/pasien/login', function () {
    return view('pasien/auth/login', ['title' => 'Masuk Pasien']);
});

Route::get('/pasien/register', function () {
    return view('pasien/auth/register', ['title' => 'Daftar Pasien']);
});
