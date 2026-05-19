<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginaController extends Controller
{
    // Atividade 7
    public function empresa() { 
        return 'Página da Empresa'; 
    }

    // Atividade 8
    public function servicos() { 
        return view('servicos'); 
    }

    // Atividade 9
    public function portfolio() { 
        return view('portfolio'); 
    }

    public function blog() { 
        return view('blog'); 
    }

    // Atividade 10
    public function equipe() { 
        return view('equipe'); 
    }

    // Atividade 12
    public function produto($id) {
        return "Produto ID: " . $id; 
    }
}