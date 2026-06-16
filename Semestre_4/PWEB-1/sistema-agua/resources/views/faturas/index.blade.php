<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Água - Faturas</title>
</head>
<body style="font-family: sans-serif; padding: 20px;">
    <h1>🧾 Faturas Geradas</h1>

    <a href="{{ route('consumidores.index') }}">
        <button style="margin-bottom: 20px; padding: 10px;">Voltar para Consumidores</button>
    </a>

    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <tr style="background-color: #f2f2f2;">
            <th>Consumidor</th>
            <th>Mês/Ano</th>
            <th>Consumo (m³)</th>
            <th>Valor (R$)</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
        @foreach($faturas as $f)
        <tr>
            <td>{{ $f->consumidor->nome }}</td>
            <td>{{ $f->leitura->mes_referencia }}/{{ $f->leitura->ano_referencia }}</td>
            <td>{{ $f->leitura->consumo_m3 }}</td>
            <td>R$ {{ number_format($f->valor_total, 2, ',', '.') }}</td>
            <td style="color: {{ $f->status == 'pago' ? 'green' : 'red' }}; font-weight: bold;">
                {{ strtoupper($f->status) }}
            </td>
            <td>
                @if($f->status == 'pendente')
                    <form action="{{ route('faturas.pagar', $f->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PUT')
                        <button type="submit" style="background-color: #4CAF50; color: white; border: none; padding: 5px 10px; cursor: pointer;">Pagar</button>
                    </form>
                @endif

                @php
                    $msg = "Olá, {$f->consumidor->nome}! Segue o consumo de {$f->leitura->mes_referencia}/{$f->leitura->ano_referencia}:\n";
                    $msg .= "Leitura atual: {$f->leitura->leitura_atual} m³\n";
                    $msg .= "Medidor: {$f->consumidor->numero_medidor}\n";
                    $msg .= "Leitura anterior: {$f->leitura->leitura_anterior} m³\n";
                    $msg .= "Consumo: {$f->leitura->consumo_m3} m³ (" . ($f->leitura->consumo_m3 * 1000) . " litros)\n";
                    $msg .= "Valor da fatura: R$ " . number_format($f->valor_total, 2, ',', '.') . "\n\n";
                    $msg .= "Att, Associação Comunitária";
                    $linkZap = "https://wa.me/55" . preg_replace('/[^0-9]/', '', $f->consumidor->telefone) . "?text=" . urlencode($msg);
                @endphp
                <a href="{{ $linkZap }}" target="_blank">
                    <button style="background-color: #25D366; color: white; border: none; padding: 5px 10px; cursor: pointer;">📱 WhatsApp</button>
                </a>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>