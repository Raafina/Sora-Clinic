<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pasien\JanjiPeriksaController;
use App\Http\Controllers\Pasien\RiwayatPeriksaController;

Route::middleware('auth')->prefix('pasien')->group(
    function () {
        Route::prefix('/daftar-poli')->group(function () {
            Route::get('/', [JanjiPeriksaController::class, 'index'])->name('pasien.daftar-poli.index');
            Route::post('/', [JanjiPeriksaController::class, 'store'])->name('pasien.daftar-poli.store');
        });
        Route::prefix('/riwayat-periksa')->group(function () {
            Route::get('/', [RiwayatPeriksaController::class, 'index'])->name('pasien.riwayat-periksa.index');
            Route::get('/{id}/riwayat', [RiwayatPeriksaController::class, 'riwayat'])->name('pasien.riwayat-periksa.riwayat');
            Route::get('/{id}/detail', [RiwayatPeriksaController::class, 'detail'])->name('pasien.riwayat-periksa.detail');
        });
    }
);
