<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsumidorController;
use App\Http\Controllers\LeituraController;
use App\Http\Controllers\FaturaController;
use App\Http\Controllers\ConfiguracaoTaxaController;

Route::get('/', function () {
    return redirect()->route('consumidores.index');
});

Route::resource('consumidores', ConsumidorController::class);

Route::resource('leituras', LeituraController::class);

Route::get('/faturas', [FaturaController::class, 'index'])->name('faturas.index');
Route::put('/faturas/{id}/pagar', [FaturaController::class, 'pagar'])->name('faturas.pagar');

Route::get('/configuracao', [ConfiguracaoTaxaController::class, 'index'])->name('configuracoes.index');
Route::put('/configuracao', [ConfiguracaoTaxaController::class, 'update'])->name('configuracoes.update');