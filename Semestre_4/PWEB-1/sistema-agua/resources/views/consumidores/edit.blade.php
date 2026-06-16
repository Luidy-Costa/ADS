<!DOCTYPE html>
<html lang="pt-BR">
<body>
    <div style="font-family: sans-serif; padding: 20px;">
        <h1>Editar Consumidor</h1>
        
        <form action="{{ route('consumidores.update', $consumidor->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <p><label>Nome: <br> <input type="text" name="nome" value="{{ $consumidor->nome }}" required></label></p>
            <p><label>Endereço: <br> <input type="text" name="endereco" value="{{ $consumidor->endereco }}" required></label></p>
            <p><label>Telefone: <br> <input type="text" name="telefone" value="{{ $consumidor->telefone }}" required></label></p>
            <p><label>Nº do Medidor: <br> <input type="text" name="numero_medidor" value="{{ $consumidor->numero_medidor }}" required></label></p>
            
            <button type="submit" style="padding: 10px 20px;">Atualizar Dados</button>
            <a href="{{ route('consumidores.index') }}">Cancelar</a>
        </form>
    </div>
</body>
</html>