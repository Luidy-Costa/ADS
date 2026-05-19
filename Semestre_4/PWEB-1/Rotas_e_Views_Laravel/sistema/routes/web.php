<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaginaController;

Route::get('/', function () {
    return view('welcome');
});

// Atividades 1, 2 e 3
Route::get('/ola', function () { return 'Olá, Laravel!'; });
Route::get('/curso/ads', function () { return 'Curso de Análise e Desenvolvimento de Sistemas'; });
Route::get('/curso/web', function () { return 'Disciplina Programação Web I'; });

// Atividades 4, 5 e 6
Route::get('/sobre', function () { return view('sobre'); });
Route::get('/contato', function () { return view('contato'); });
Route::get('/institucional/missao', function () { return view('missao'); });

// Atividade 7
Route::get('/empresa', [PaginaController::class, 'empresa']); 

// Atividade 8
Route::get('/servicos', [PaginaController::class, 'servicos']); 

// Atividade 9
Route::get('/portfolio', [PaginaController::class, 'portfolio']);
Route::get('/blog', [PaginaController::class, 'blog']); 

// Atividade 10
Route::get('/equipe', [PaginaController::class, 'equipe']);

// Atividade 11
Route::get('/usuario/{nome}', function ($nome) { 
    return "Usuário: " . $nome; 
});

// Atividade 12
Route::get('/produto/{id}', [PaginaController::class, 'produto']);