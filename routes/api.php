<?php

use App\Http\Controllers\BejegyzesekController;
use Illuminate\Support\Facades\Route;

Route::get('/bejegyzesek', [BejegyzesekController::class, 'index']);
Route::get('/bejegyzesek/{osztaly_nev}', [BejegyzesekController::class, 'osztalySzerint']);
Route::post('/bejegyzes', [BejegyzesekController::class, 'ujBejegyzes']);