<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index()
    {
        return "Listando todos os alunos (index)";
    }

    public function create()
    {
        return "Exibindo formulário de cadastro de aluno (create)";
    }

    public function store(Request $request)
    {
        return "Salvando um novo aluno no banco de dados (store simulado)";
    }

    public function show(string $id)
    {
        return "Exibindo os detalhes do aluno ID: " . $id;
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}