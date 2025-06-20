<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pasien\ProfileController;
use App\Http\Controllers\Dokter\JadwalPeriksaController;
use App\Http\Controllers\Dokter\MemeriksaController;
use App\Http\Controllers\Dokter\ObatController;
use App\Http\Controllers\Dokter\RestoreObatController;
use App\Http\Controllers\Dokter\KonsultasiController;

Route::middleware(['role:dokter'])->prefix('dokter')->group(function () {
    Route::prefix('/profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    Route::prefix('/jadwal-periksa')->group(function () {
        Route::get('/', [JadwalPeriksaController::class, 'index'])->name('dokter.jadwal-periksa.index');
        Route::get('/tambah', [JadwalPeriksaController::class, 'create'])->name('dokter.jadwal-periksa.create');
        Route::post('/', [JadwalPeriksaController::class, 'store'])->name('dokter.jadwal-periksa.store');
        Route::put('/{id}', [JadwalPeriksaController::class, 'update'])->name('dokter.jadwal-periksa.update');
    });
    Route::prefix('/memeriksa')->group(function () {
        Route::get('/', [MemeriksaController::class, 'index'])->name('dokter.memeriksa.index');
        Route::get('/{id}', [MemeriksaController::class, 'periksa'])->name('dokter.memeriksa.periksa');
        Route::post('/{id}', [MemeriksaController::class, 'store'])->name('dokter.memeriksa.store');
        Route::get('/{id}/edit', [MemeriksaController::class, 'edit'])->name('dokter.memeriksa.edit');
        Route::put('/{id}', [MemeriksaController::class, 'update'])->name('dokter.memeriksa.update');
    });
    Route::prefix('/obat')->group(function () {
        Route::get('/', [ObatController::class, 'index'])->name('dokter.obat.index');
        Route::get('/tambah', [ObatController::class, 'create'])->name('dokter.obat.create');
        Route::post('/', [ObatController::class, 'store'])->name('dokter.obat.store');
        Route::get('/{id}/edit', [ObatController::class, 'edit'])->name('dokter.obat.edit');
        Route::put('/{id}', [ObatController::class, 'update'])->name('dokter.obat.update');
        Route::delete('/{id}', [ObatController::class, 'destroy'])->name('dokter.obat.destroy');
    });
    Route::prefix('/restore-obat')->group(function () {
        Route::get('/', [RestoreObatController::class, 'index'])->name('dokter.restore-obat.index');
        Route::patch('/{id}/restore', [RestoreObatController::class, 'restore'])->name('dokter.restore-obat.restore');
    });
    Route::prefix('/konsultasi')->group(function () {
        Route::get('/', [KonsultasiController::class, 'index'])->name('dokter.konsultasi.index');
        Route::get('/tambah', [KonsultasiController::class, 'create'])->name('dokter.konsultasi.create');
        Route::post('/', [KonsultasiController::class, 'store'])->name('dokter.konsultasi.store');
        Route::get('/{id}/edit', [KonsultasiController::class, 'edit'])->name('dokter.konsultasi.edit');
        Route::put('/{id}', [KonsultasiController::class, 'update'])->name('dokter.konsultasi.update');
        Route::delete('/{id}', [KonsultasiController::class, 'destroy'])->name('dokter.konsultasi.destroy');
    });
});
