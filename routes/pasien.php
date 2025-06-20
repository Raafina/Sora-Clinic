<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pasien\JanjiPeriksaController;
use App\Http\Controllers\Pasien\RiwayatPeriksaController;
use App\Http\Controllers\Pasien\KonsultasiController;

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
        Route::prefix('/konsultasi')->group(function () {
            Route::get('/', [KonsultasiController::class, 'index'])->name('pasien.konsultasi.index');
            Route::get('/tambah', [KonsultasiController::class, 'create'])->name('pasien.konsultasi.create');
            Route::post('/', [KonsultasiController::class, 'store'])->name('pasien.konsultasi.store');
            Route::get('/{id}/edit', [KonsultasiController::class, 'edit'])->name('pasien.konsultasi.edit');
            Route::put('/{id}', [KonsultasiController::class, 'update'])->name('pasien.konsultasi.update');
            Route::delete('/{id}', [KonsultasiController::class, 'destroy'])->name('pasien.konsultasi.destroy');
        });
    }
);
