<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsumidorController;
use App\Http\Controllers\LeituraController;

Route::get('/', function () {
    return redirect()->route('consumidores.index');
});

Route::resource('consumidores', ConsumidorController::class);

Route::resource('leituras', LeituraController::class);