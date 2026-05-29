<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;

Route::get('/cursos', [CursoController::class, 'index'])->name('cursos');

Route::get('/cursos/novo', [CursoController::class, 'create'])->name('cursos.create');