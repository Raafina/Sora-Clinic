<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pasien\ProfileController;
use App\Http\Controllers\Dokter\DokterController as DokterDokterController;
use App\Http\Controllers\Dokter\JadwalPeriksaController;

Route::middleware('auth')->group(
    function () {}
);

Route::prefix('dokter')->group(function () {
    Route::get('/dokter', [DokterDokterController::class, 'index']);
    Route::delete('/dokter/{dokter}', [DokterDokterController::class, 'destroy']);
    Route::get('/jadwal-periksa', [JadwalPeriksaController::class, 'index']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
