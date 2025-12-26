<?php

use Illuminate\Support\Facades\Route; // Tambahkan ini agar tidak 'Undefined'
use App\Http\Controllers\LogHarianController;

// Dashboard mengarah ke fungsi dashboard di controller
Route::get('/', [LogHarianController::class, 'dashboard'])->name('dashboard');

// CRUD standar untuk log harian
Route::resource('log', LogHarianController::class);

// Route khusus verifikasi untuk atasan
Route::post('log/{id}/verifikasi', [LogHarianController::class, 'verifikasi'])->name('log.verifikasi');
