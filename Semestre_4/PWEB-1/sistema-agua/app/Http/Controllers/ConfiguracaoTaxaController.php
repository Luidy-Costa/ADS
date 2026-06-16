<?php

namespace App\Http\Controllers;

use App\Models\ConfiguracaoTaxa;
use Illuminate\Http\Request;

class ConfiguracaoTaxaController extends Controller
{
    // Mostra a tela de configuração
    public function index()
    {
        // Pega a primeira configuração ou cria o padrão de R$ 25 e R$ 2
        $config = ConfiguracaoTaxa::firstOrCreate(
            ['id' => 1],
            ['taxa_fixa' => 25.00, 'valor_excedente' => 2.00]
        );
        
        return view('configuracoes.index', compact('config'));
    }

    // Salva as alterações
    public function update(Request $request)
    {
        $request->validate([
            'taxa_fixa' => 'required|numeric',
            'valor_excedente' => 'required|numeric',
        ]);

        $config = ConfiguracaoTaxa::first();
        $config->update($request->all());

        return redirect()->back()->with('sucesso', 'Taxas atualizadas com sucesso!');
    }
}