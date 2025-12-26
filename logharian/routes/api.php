<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogHarianController;

// URL: http://127.0.0.1:8000/api/log
Route::get('/log', [LogHarianController::class, 'index']);
Route::post('/log', [LogHarianController::class, 'store']);
Route::post('/log/{id}/verifikasi', [LogHarianController::class, 'verifikasi']);
