<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\ProdutoController;

Route::get('/cursos', [CursoController::class, 'index'])->name('cursos');

Route::get('/cursos/novo', [CursoController::class, 'create'])->name('cursos.create');

Route::get('/cursos/lista', [CursoController::class, 'listagem'])->name('cursos.listagem');

Route::get('/cursos/{id}', [CursoController::class, 'show'])->name('cursos.show');

Route::post('/cursos', [CursoController::class, 'store'])->name('cursos.store');

Route::resource('alunos', AlunoController::class);

Route::get('/disciplinas', [DisciplinaController::class, 'index'])->name('disciplinas.index');

Route::get('/disciplinas/cadastrar', [DisciplinaController::class, 'create'])->name('disciplinas.create');

Route::get('/disciplinas/{id}', [DisciplinaController::class, 'show'])->name('disciplinas.show');

Route::get('/produtos/create', [ProdutoController::class, 'create']);

Route::post('/produtos', [ProdutoController::class, 'store']);