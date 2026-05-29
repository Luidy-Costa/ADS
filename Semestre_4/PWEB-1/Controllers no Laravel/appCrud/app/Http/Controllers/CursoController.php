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
}