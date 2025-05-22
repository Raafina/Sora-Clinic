<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pasien\DaftarPoliController;

Route::middleware('auth')->group(
    function () {
        Route::prefix('pasien')->group(function () {
            Route::get('/daftar-poli', [DaftarPoliController::class, 'index']);
        });
    }
);
