<!DOCTYPE html>
<html lang="pt-BR">
<body>
    <div style="font-family: sans-serif; padding: 20px;">
        <h1>Novo Consumidor</h1>
        
        <form action="{{ route('consumidores.store') }}" method="POST">
            @csrf
            
            <p><label>Nome: <br> <input type="text" name="nome" required></label></p>
            <p><label>Endereço: <br> <input type="text" name="endereco" required></label></p>
            <p><label>Telefone: <br> <input type="text" name="telefone" required></label></p>
            <p><label>Nº do Medidor (Único): <br> <input type="text" name="numero_medidor" required></label></p>
            
            <button type="submit" style="padding: 10px 20px;">Salvar Consumidor</button>
            <a href="{{ route('consumidores.index') }}">Cancelar</a>
        </form>
    </div>
</body>
</html>