<?php

namespace App\Http\Controllers;

use App\Models\Fatura;
use Illuminate\Http\Request;

class FaturaController extends Controller
{
    // Lista todas as faturas
    public function index() {
        $faturas = Fatura::with(['consumidor', 'leitura'])->get();
        return view('faturas.index', compact('faturas'));
    }

    // Marca a fatura como paga
    public function pagar($id) {
        $fatura = Fatura::findOrFail($id);
        $fatura->update(['status' => 'pago']);
        return redirect()->back();
    }
}