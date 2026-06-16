<?php

namespace App\Http\Controllers;

use App\Models\Consumidor;
use Illuminate\Http\Request;

class ConsumidorController extends Controller
{
    // Lista todos os consumidores
    public function index()
    {
        $consumidores = Consumidor::all();
        return view('consumidores.index', compact('consumidores'));
    }

    // Mostra o formulário de criar novo
    public function create()
    {
        return view('consumidores.create');
    }

    // Salva o novo no banco
    public function store(Request $request)
    {
        // Validação básica
        $request->validate([
            'nome' => 'required',
            'endereco' => 'required',
            'telefone' => 'required',
            'numero_medidor' => 'required|unique:consumidores'
        ]);

        Consumidor::create($request->all());
        return redirect()->route('consumidores.index');
    }

    // Mostra o formulário de edição
    public function edit(Consumidor $consumidor)
    {
        return view('consumidores.edit', compact('consumidor'));
    }

    // Atualiza no banco
    public function update(Request $request, Consumidor $consumidor)
    {
        $consumidor->update($request->all());
        return redirect()->route('consumidores.index');
    }
}