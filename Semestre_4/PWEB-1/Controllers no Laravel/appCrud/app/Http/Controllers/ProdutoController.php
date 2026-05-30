<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function create() // exibir formulário [cite: 338, 339]
    {
        return view('produtos.create');
    }

    public function store(Request $request) // receber dado simples [cite: 340, 341]
    {
        $nome = $request->input('nome');
        return "Produto: " . $nome;
    }
}