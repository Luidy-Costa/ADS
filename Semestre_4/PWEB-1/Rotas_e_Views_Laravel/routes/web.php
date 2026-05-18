<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// ==========================================
// ATIVIDADE 1 - Rota simples
// ==========================================
Route::get('/ola', function () {
    return 'Olá, Laravel!';
});

// ==========================================
// ATIVIDADE 2 - Sub-rota simples
// ==========================================
Route::get('/curso/ads', function () {
    return 'Curso de Análise e Desenvolvimento de Sistemas';
});

// ==========================================
// ATIVIDADE 3 - Sub-rota adicional
// ==========================================
Route::get('/curso/web', function () {
    return 'Disciplina Programação Web I';
});