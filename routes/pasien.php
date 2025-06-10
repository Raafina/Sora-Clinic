<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pasien\JanjiPeriksaController;

Route::middleware('auth')->group(
    function () {
        Route::prefix('pasien')->group(function () {
            Route::get('/daftar-poli', [JanjiPeriksaController::class, 'index'])->name('pasien.daftar-poli.index');
        });
    }
);
