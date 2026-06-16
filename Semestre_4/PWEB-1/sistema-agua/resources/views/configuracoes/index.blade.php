<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Água - Configurações</title>
</head>
<body style="font-family: sans-serif; padding: 20px;">
    <h1>⚙️ Configuração de Taxas</h1>

    <a href="{{ route('consumidores.index') }}">
        <button style="margin-bottom: 20px; padding: 10px;">Voltar para Início</button>
    </a>

    @if(session('sucesso'))
        <div style="background: #ddffdd; padding: 10px; color: green; margin-bottom: 15px;">
            {{ session('sucesso') }}
        </div>
    @endif

    <form action="{{ route('configuracoes.update') }}" method="POST">
        @csrf
        @method('PUT')
        
        <p><label>Taxa Fixa (Até 10m³): R$ <br> 
            <input type="number" step="0.01" name="taxa_fixa" value="{{ $config->taxa_fixa }}" required>
        </label></p>
        
        <p><label>Valor Excedente (por cada 1m³ extra): R$ <br> 
            <input type="number" step="0.01" name="valor_excedente" value="{{ $config->valor_excedente }}" required>
        </label></p>
        
        <button type="submit" style="padding: 10px 20px; background-color: #f39c12; color: white; border: none; cursor: pointer;">Salvar Configurações</button>
    </form>
</body>
</html> 