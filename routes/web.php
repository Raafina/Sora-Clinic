<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing/home', [
        'title' => 'Home'
    ]);
});


Route::prefix('pasien')->group(function () {
    Route::get('/login', function () {
        return view('pasien/auth/login', ['title' => 'Masuk Pasien']);
    });
    Route::get('/register', function () {
        return view('pasien/auth/register', ['title' => 'Daftar Pasien']);
    });
});

Route::prefix('admin')->group(function () {
    Route::get('/dokter', function () {
        return view('/admin/dokter/index', ['title' => 'Dashboard']);
    });
});
