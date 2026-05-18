<?php

use Illuminate\Support\Facades\Route;

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