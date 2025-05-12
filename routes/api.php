<?php

use App\Http\Controllers\BejegyzesekController;
use App\Http\Controllers\TevekenysegController;
use Illuminate\Support\Facades\Route;

Route::get('/tevekenysegek', [TevekenysegController::class, 'index']);
Route::get('/bejegyzesek', [BejegyzesekController::class, 'index']);
Route::get('/bejegyzesek/{osztaly_nev}', [BejegyzesekController::class, 'osztalySzerint']);
Route::post('/bejegyzes', [BejegyzesekController::class, 'ujBejegyzes']);