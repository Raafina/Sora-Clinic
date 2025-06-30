<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Doctor\ProfileController;
use App\Http\Controllers\Doctor\CheckupScheduleController;
use App\Http\Controllers\Doctor\CheckingupController;
use App\Http\Controllers\Doctor\ConsultationController;
use App\Http\Controllers\Doctor\MedicineController;
use App\Http\Controllers\Doctor\RestoreMedicineController;

Route::middleware(['role:dokter'])->prefix('dokter')->group(function () {
    Route::prefix('/profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    Route::prefix('/jadwal-periksa')->group(function () {
        Route::get('/', [CheckupScheduleController::class, 'index'])->name('dokter.jadwal-periksa.index');
        Route::get('/tambah', [CheckupScheduleController::class, 'create'])->name('dokter.jadwal-periksa.create');
        Route::post('/', [CheckupScheduleController::class, 'store'])->name('dokter.jadwal-periksa.store');
        Route::put('/{id}', [CheckupScheduleController::class, 'update'])->name('dokter.jadwal-periksa.update');
    });
    Route::prefix('/memeriksa')->group(function () {
        Route::get('/', [CheckingupController::class, 'index'])->name('dokter.memeriksa.index');
        Route::get('/{id}', [CheckingupController::class, 'periksa'])->name('dokter.memeriksa.periksa');
        Route::post('/{id}', [CheckingupController::class, 'store'])->name('dokter.memeriksa.store');
        Route::get('/{id}/edit', [CheckingupController::class, 'edit'])->name('dokter.memeriksa.edit');
        Route::put('/{id}', [CheckingupController::class, 'update'])->name('dokter.memeriksa.update');
    });
    Route::prefix('/konsultasi')->group(function () {
        Route::get('/', [ConsultationController::class, 'index'])->name('dokter.konsultasi.index');
        Route::get('/tambah', [ConsultationController::class, 'create'])->name('dokter.konsultasi.create');
        Route::post('/', [ConsultationController::class, 'store'])->name('dokter.konsultasi.store');
        Route::get('/{id}/edit', [ConsultationController::class, 'edit'])->name('dokter.konsultasi.edit');
        Route::put('/{id}', [ConsultationController::class, 'update'])->name('dokter.konsultasi.update');
        Route::delete('/{id}', [ConsultationController::class, 'destroy'])->name('dokter.konsultasi.destroy');
    });
    Route::prefix('/obat')->group(function () {
        Route::get('/', [MedicineController::class, 'index'])->name('dokter.obat.index');
        Route::get('/tambah', [MedicineController::class, 'create'])->name('dokter.obat.create');
        Route::post('/', [MedicineController::class, 'store'])->name('dokter.obat.store');
        Route::get('/{id}/edit', [MedicineController::class, 'edit'])->name('dokter.obat.edit');
        Route::put('/{id}', [MedicineController::class, 'update'])->name('dokter.obat.update');
        Route::delete('/{id}', [MedicineController::class, 'destroy'])->name('dokter.obat.destroy');
    });
    Route::prefix('/restore-obat')->group(function () {
        Route::get('/', [RestoreMedicineController::class, 'index'])->name('dokter.restore-obat.index');
        Route::patch('/{id}/restore', [RestoreMedicineController::class, 'restore'])->name('dokter.restore-obat.restore');
    });
});
