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
        Route::get('/', [CheckupScheduleController::class, 'index'])->name('doctor.checkup_schedule.index');
        Route::get('/tambah', [CheckupScheduleController::class, 'create'])->name('doctor.checkup_schedule.create');
        Route::post('/', [CheckupScheduleController::class, 'store'])->name('doctor.checkup_schedule.store');
        Route::put('/{id}', [CheckupScheduleController::class, 'update'])->name('doctor.checkup_schedule.update');
    });
    Route::prefix('/memeriksa')->group(function () {
        Route::get('/', [CheckingupController::class, 'index'])->name('doctor.chekingup.index');
        Route::get('/{id}', [CheckingupController::class, 'periksa'])->name('doctor.chekingup.periksa');
        Route::post('/{id}', [CheckingupController::class, 'store'])->name('doctor.chekingup.store');
        Route::get('/{id}/edit', [CheckingupController::class, 'edit'])->name('doctor.chekingup.edit');
        Route::put('/{id}', [CheckingupController::class, 'update'])->name('doctor.chekingup.update');
    });
    Route::prefix('/konsultasi')->group(function () {
        Route::get('/', [ConsultationController::class, 'index'])->name('doctor.consultation.index');
        Route::get('/tambah', [ConsultationController::class, 'create'])->name('doctor.consultation.create');
        Route::post('/', [ConsultationController::class, 'store'])->name('doctor.consultation.store');
        Route::get('/{id}/edit', [ConsultationController::class, 'edit'])->name('doctor.consultation.edit');
        Route::put('/{id}', [ConsultationController::class, 'update'])->name('doctor.consultation.update');
        Route::delete('/{id}', [ConsultationController::class, 'destroy'])->name('doctor.consultation.destroy');
    });
    Route::prefix('/obat')->group(function () {
        Route::get('/', [MedicineController::class, 'index'])->name('doctor.medicine.index');
        Route::get('/tambah', [MedicineController::class, 'create'])->name('doctor.medicine.create');
        Route::post('/', [MedicineController::class, 'store'])->name('doctor.medicine.store');
        Route::get('/{id}/edit', [MedicineController::class, 'edit'])->name('doctor.medicine.edit');
        Route::put('/{id}', [MedicineController::class, 'update'])->name('doctor.medicine.update');
        Route::delete('/{id}', [MedicineController::class, 'destroy'])->name('doctor.medicine.destroy');
    });
    Route::prefix('/restore-obat')->group(function () {
        Route::get('/', [RestoreMedicineController::class, 'index'])->name('doctor.restore_medicine.index');
        Route::patch('/{id}/restore', [RestoreMedicineController::class, 'restore'])->name('doctor.restore_medicine.restore');
    });
});
