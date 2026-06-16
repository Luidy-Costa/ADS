<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Água - Consumidores</title>
</head>
<body style="font-family: sans-serif; padding: 20px;">
    <h1>👥 Lista de Consumidores</h1>
    
    <a href="{{ route('consumidores.create') }}">
        <button style="margin-bottom: 20px; padding: 10px;">+ Novo Consumidor</button>
    </a>
    
    <a href="{{ route('leituras.create') }}">
        <button style="margin-bottom: 20px; padding: 10px; margin-left: 10px; background-color: #4CAF50; color: white; border: none; cursor: pointer;">📝 Registrar Leitura</button>
    </a>

    <a href="{{ route('faturas.index') }}">
        <button style="margin-bottom: 20px; padding: 10px; margin-left: 10px; background-color: #008CBA; color: white; border: none; cursor: pointer;">🧾 Ver Faturas</button>
    </a>

    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <tr style="background-color: #f2f2f2;">
            <th>Nome</th>
            <th>Endereço</th>
            <th>Nº Medidor</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
        @foreach($consumidores as $c)
        <tr>
            <td>{{ $c->nome }}</td>
            <td>{{ $c->endereco }}</td>
            <td>{{ $c->numero_medidor }}</td>
            <td>{{ $c->telefone }}</td>
            <td>
                <a href="{{ route('consumidores.edit', $c->id) }}">Editar</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>