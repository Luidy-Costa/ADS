<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index() 
    {
        return "Lista de cursos";
    }

    public function create()
    {
        return view('cursos.create');
    }

    public function listagem()
    {
        $cursos = ['Análise e Desenvolvimento de Sistemas', 'Redes de Computadores', 'Engenharia de Software'];
        
        return view('cursos.listagem', compact('cursos'));
    }

    public function show($id)
    {
        return "Curso selecionado: ID " . $id;
    }
}