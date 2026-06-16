<?php

namespace App\Http\Controllers;

use App\Models\Leitura;
use App\Models\Consumidor;
use App\Models\Fatura;
use App\Models\ConfiguracaoTaxa;
use Illuminate\Http\Request;

class LeituraController extends Controller
{
    public function create() {
        $consumidores = Consumidor::all();
        return view('leituras.create', compact('consumidores'));
    }

    public function store(Request $request) {
        // Validações básicas
        $request->validate([
            'consumidor_id' => 'required',
            'mes_referencia' => 'required|integer|min:1|max:12',
            'ano_referencia' => 'required|integer',
            'leitura_atual' => 'required|numeric',
        ]);

        // Busca a leitura do mês passado automaticamente (se existir)
        $ultima = Leitura::where('consumidor_id', $request->consumidor_id)->orderBy('id', 'desc')->first();
        $leituraAnterior = $ultima ? $ultima->leitura_atual : 0;

        // Validação 1: Leitura atual não pode ser menor que a anterior
        if ($request->leitura_atual < $leituraAnterior) {
            return back()->withErrors(['erro' => 'A leitura atual não pode ser menor que a anterior (' . $leituraAnterior . ' m³).']);
        }

        // Validação 2: Impede duas leituras no mesmo mês para a mesma pessoa
        $existe = Leitura::where('consumidor_id', $request->consumidor_id)
                         ->where('mes_referencia', $request->mes_referencia)
                         ->where('ano_referencia', $request->ano_referencia)
                         ->first();
        if ($existe) {
            return back()->withErrors(['erro' => 'Já existe uma leitura registrada neste mês/ano para este consumidor.']);
        }

        // Calcula o consumo (m³)
        $consumo = $request->leitura_atual - $leituraAnterior;

        // 1. Salva a Leitura
        $leitura = Leitura::create([
            'consumidor_id' => $request->consumidor_id,
            'mes_referencia' => $request->mes_referencia,
            'ano_referencia' => $request->ano_referencia,
            'leitura_anterior' => $leituraAnterior,
            'leitura_atual' => $request->leitura_atual,
            'consumo_m3' => $consumo
        ]);

        // 2. Calcula a Fatura
        $config = ConfiguracaoTaxa::first();
        $taxaFixa = $config ? $config->taxa_fixa : 25.00; // Puxa do banco ou usa o padrão
        $valorExcedente = $config ? $config->valor_excedente : 2.00;

        $valorFatura = $taxaFixa;
        if ($consumo > 10) { // Regra: Acima de 10m³ cobra excedente
            $valorFatura += ($consumo - 10) * $valorExcedente;
        }

        // 3. Salva a Fatura
        Fatura::create([
            'leitura_id' => $leitura->id,
            'consumidor_id' => $request->consumidor_id,
            'valor_total' => $valorFatura,
            'status' => 'pendente'
        ]);

        return redirect()->route('consumidores.index');
    }
}