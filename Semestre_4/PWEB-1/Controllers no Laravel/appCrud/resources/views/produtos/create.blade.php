<h1>Cadastro de Produto</h1>
<form action="/produtos" method="POST">
    @csrf
    <label>Nome do produto:</label>
    <input type="text" name="nome">
    <button type="submit">Cadastrar</button>
</form>