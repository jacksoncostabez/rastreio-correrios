<?php

use App\Http\Controllers\RastreioCorreiosController;
use Illuminate\Support\Facades\Route;

// Route::get('/', 'App\Http\Controllers\RastreioCorreiosController@index');

Route::controller(RastreioCorreiosController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/rastreio', 'consultaRastreio')->name('rastreio.consultaRastreio');
});
