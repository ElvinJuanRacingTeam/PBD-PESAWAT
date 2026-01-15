<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenumpangController;
use App\Http\Controllers\PenerbanganController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\QueryController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('penumpang', PenumpangController::class);
Route::resource('penerbangan', PenerbanganController::class);
Route::resource('pemesanan', PemesananController::class);

/* ROUTE QUERY TUGAS */
Route::get('/soal1', [QueryController::class, 'soal1']);
Route::get('/soal2', [QueryController::class, 'soal2']);
Route::get('/soal3', [QueryController::class, 'soal3']);
Route::get('/soal4', [QueryController::class, 'soal4']);
Route::get('/soal5', [QueryController::class, 'soal5']);

