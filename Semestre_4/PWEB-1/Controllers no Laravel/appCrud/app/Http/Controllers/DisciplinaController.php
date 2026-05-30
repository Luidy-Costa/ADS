<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    public function index()
    {
        $disciplinas = ['Programação Web 1', 'Banco de Dados', 'Engenharia de Software'];
        return view('disciplinas.index', compact('disciplinas'));
    }

    public function create()
    {
        return view('disciplinas.create');
    }

    public function show($id)
    {
        return view('disciplinas.show', compact('id'));
    }
}