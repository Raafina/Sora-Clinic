<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DokterController as DokterDokterController;

Route::middleware('auth')->group(
    function () {}
);

Route::prefix('dokter')->group(function () {
    Route::get('/dokter', [DokterDokterController::class, 'index']);
    Route::delete('/dokter/{dokter}', [DokterDokterController::class, 'destroy']);
});
