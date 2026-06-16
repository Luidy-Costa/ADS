<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Água - Nova Leitura</title>
</head>
<body style="font-family: sans-serif; padding: 20px;">
    <h1>📝 Registrar Nova Leitura</h1>

    @if($errors->any())
        <div style="background: #ffdddd; padding: 10px; color: red; margin-bottom: 15px;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('leituras.store') }}" method="POST">
        @csrf
        
        <p>
            <label>Consumidor: <br>
                <select name="consumidor_id" required style="padding: 5px;">
                    <option value="">Selecione um consumidor...</option>
                    @foreach($consumidores as $c)
                        <option value="{{ $c->id }}">{{ $c->nome }} (Medidor: {{ $c->numero_medidor }})</option>
                    @endforeach
                </select>
            </label>
        </p>
        
        <p><label>Mês de Referência (1-12): <br> <input type="number" min="1" max="12" name="mes_referencia" required></label></p>
        <p><label>Ano de Referência: <br> <input type="number" name="ano_referencia" value="{{ date('Y') }}" required></label></p>
        <p><label>Leitura Atual (m³): <br> <input type="number" step="0.01" name="leitura_atual" required></label></p>
        
        <button type="submit" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; cursor: pointer;">Registrar e Gerar Fatura</button>
        <a href="{{ route('consumidores.index') }}" style="margin-left: 10px;">Cancelar</a>
    </form>
</body>
</html>