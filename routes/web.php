<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pasien\ProfileController;


Route::get('/', function () {
    return view('landing/home', [
        'title' => 'Home'
    ]);
});

require __DIR__ . '/auth.php';
require __DIR__ . '/pasien.php';
require __DIR__ . '/dokter.php';
