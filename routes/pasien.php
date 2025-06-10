<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pasien\JanjiPeriksaController;

Route::middleware('auth')->prefix('pasien')->group(
    function () {
        Route::prefix('/daftar-poli')->group(function () {
            Route::get('/', [JanjiPeriksaController::class, 'index'])->name('pasien.daftar-poli.index');
            Route::post('/', [JanjiPeriksaController::class, 'store'])->name('pasien.daftar-poli.store');
        });
    }
);
