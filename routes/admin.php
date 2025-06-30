<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DoctorController;

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
    }
);
