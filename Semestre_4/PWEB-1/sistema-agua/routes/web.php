<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsumidorController;
use App\Http\Controllers\LeituraController;
use App\Http\Controllers\FaturaController;

Route::get('/', function () {
    return redirect()->route('consumidores.index');
});

Route::resource('consumidores', ConsumidorController::class);

Route::resource('leituras', LeituraController::class);

Route::get('/faturas', [FaturaController::class, 'index'])->name('faturas.index');
Route::put('/faturas/{id}/pagar', [FaturaController::class, 'pagar'])->name('faturas.pagar');