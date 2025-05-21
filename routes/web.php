<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DokterController as AdminDokterController;

Route::get('/', function () {
    return view('landing/home', [
        'title' => 'Home'
    ]);
});

Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'adminLoginView']);
    Route::get('/dokter', [AdminDokterController::class, 'index']);
    Route::delete('/dokter/{dokter}', [AdminDokterController::class, 'destroy']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('guest')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
