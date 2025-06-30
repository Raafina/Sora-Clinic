<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\PolyclinicController;

Route::middleware('auth')->prefix('admin')->group(
    function () {
        Route::prefix('/doctors')->group(function () {
            Route::get('/', [DoctorController::class, 'index'])->name('admin.doctor.index');
            Route::get('/create', [DoctorController::class, 'create'])->name('admin.doctor.create');
            Route::post('/', [DoctorController::class, 'store'])->name('admin.doctor.store');
            Route::get('/{id}/edit', [DoctorController::class, 'edit'])->name('admin.doctor.edit');
            Route::put('/{id}', [DoctorController::class, 'update'])->name('admin.doctor.update');
            Route::delete('/{id}', [DoctorController::class, 'destroy'])->name('admin.doctor.destroy');
        });
        Route::prefix('/polyclinics')->group(function () {
            Route::get('/', [PolyclinicController::class, 'index'])->name('admin.polyclinic.index');
            Route::get('/create', [PolyclinicController::class, 'create'])->name('admin.polyclinic.create');
            Route::post('/', [PolyclinicController::class, 'store'])->name('admin.polyclinic.store');
            Route::get('/{id}/edit', [PolyclinicController::class, 'edit'])->name('admin.polyclinic.edit');
            Route::put('/{id}', [PolyclinicController::class, 'update'])->name('admin.polyclinic.update');
            Route::delete('/{id}', [PolyclinicController::class, 'destroy'])->name('admin.polyclinic.destroy');
        });
    }
);
