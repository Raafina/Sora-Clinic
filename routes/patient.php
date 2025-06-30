<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Patient\CheckupAppointmentController;
use App\Http\Controllers\Patient\CheckupHistoryController;
use App\Http\Controllers\Patient\ConsultationController;

Route::middleware('auth')->prefix('pasien')->group(
    function () {
        Route::prefix('/daftar-poli')->group(function () {
            Route::get('/', [CheckupAppointmentController::class, 'index'])->name('patient.register_checkup.index');
            Route::post('/', [CheckupAppointmentController::class, 'store'])->name('patient.register_checkup.store');
        });
        Route::prefix('/riwayat-periksa')->group(function () {
            Route::get('/', [CheckupHistoryController::class, 'index'])->name('pasien.riwayat-periksa.index');
            Route::get('/{id}/riwayat', [CheckupHistoryController::class, 'riwayat'])->name('pasien.riwayat-periksa.riwayat');
            Route::get('/{id}/detail', [CheckupHistoryController::class, 'detail'])->name('pasien.riwayat-periksa.detail');
        });
        Route::prefix('/konsultasi')->group(function () {
            Route::get('/', [ConsultationController::class, 'index'])->name('pasien.konsultasi.index');
            Route::get('/tambah', [ConsultationController::class, 'create'])->name('pasien.konsultasi.create');
            Route::post('/', [ConsultationController::class, 'store'])->name('pasien.konsultasi.store');
            Route::get('/{id}/edit', [ConsultationController::class, 'edit'])->name('pasien.konsultasi.edit');
            Route::put('/{id}', [ConsultationController::class, 'update'])->name('pasien.konsultasi.update');
            Route::delete('/{id}', [ConsultationController::class, 'destroy'])->name('pasien.konsultasi.destroy');
        });
    }
);
