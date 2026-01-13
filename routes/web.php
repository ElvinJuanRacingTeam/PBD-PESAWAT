<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenumpangController;
use App\Http\Controllers\PenerbanganController;
use App\Http\Controllers\PemesananController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('penumpang', PenumpangController::class);
Route::resource('penerbangan', PenerbanganController::class);
Route::resource('pemesanan', PemesananController::class);
