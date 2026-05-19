<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginaController extends Controller
{
    // ==========================================
    // ATIVIDADE 7 - Retornando texto direto
    // ==========================================
    public function empresa() {
        return 'Página da Empresa';
    }

    // ==========================================
    // ATIVIDADE 8 - Retornando View
    // ==========================================
    public function servicos() {
        return view('servicos'); 
    }

    // ==========================================
    // ATIVIDADE 9 - Múltiplas rotas
    // ==========================================
    public function portfolio() {
        return view('portfolio'); 
    }

    public function blog() {
        return view('blog');
    }
}