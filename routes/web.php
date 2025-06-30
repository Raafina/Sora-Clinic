<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('landing/home', [
        'title' => 'Home'
    ]);
});

require __DIR__ . '/auth.php';
require __DIR__ . '/patient.php';
require __DIR__ . '/doctor.php';
require __DIR__ . '/admin.php';
