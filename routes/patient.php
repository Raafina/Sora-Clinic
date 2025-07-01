<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Patient\CheckupAppointmentController;
use App\Http\Controllers\Patient\CheckupHistoryController;
use App\Http\Controllers\Patient\ConsultationController;

Route::middleware('auth')->prefix('pasien')->group(
    function () {
        Route::prefix('/daftar-poli')->group(function () {
            Route::get('/', [CheckupAppointmentController::class, 'index'])->name('patient.checkup_register.index');
            Route::post('/', [CheckupAppointmentController::class, 'store'])->name('patient.checkup_register.store');
        });
        Route::prefix('/riwayat-periksa')->group(function () {
            Route::get('/', [CheckupHistoryController::class, 'index'])->name('patient.checkup_history.index');
            Route::get('/{id}/riwayat', [CheckupHistoryController::class, 'riwayat'])->name('patient.checkup_history.riwayat');
            Route::get('/{id}/detail', [CheckupHistoryController::class, 'detail'])->name('patient.checkup_history.detail');
        });
        Route::prefix('/konsultasi')->group(function () {
            Route::get('/', [ConsultationController::class, 'index'])->name('patient.consultation.index');
            Route::get('/tambah', [ConsultationController::class, 'create'])->name('patient.consultation.create');
            Route::post('/', [ConsultationController::class, 'store'])->name('patient.consultation.store');
            Route::get('/{id}/edit', [ConsultationController::class, 'edit'])->name('patient.consultation.edit');
            Route::put('/{id}', [ConsultationController::class, 'update'])->name('patient.consultation.update');
            Route::delete('/{id}', [ConsultationController::class, 'destroy'])->name('patient.consultation.destroy');
        });
    }
);
