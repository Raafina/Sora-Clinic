<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DokterController as AdminDokterController;

Route::get('/', function () {
    return view('landing/home', [
        'title' => 'Home'
    ]);
});


Route::prefix('pasien')->group(function () {
    Route::get('/login', [AuthController::class, 'pasienLoginView']);
    Route::get('/register', [AuthController::class, 'pasienRegisterView']);
    Route::post('/register', [AuthController::class, 'pasienRegisterStore']);
});

Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'adminLoginView']);
    Route::get('/dokter', [AdminDokterController::class, 'index']);
    Route::delete('/dokter/{dokter}', [AdminDokterController::class, 'destroy']);
});
