<h1>Cadastrar Nova Disciplina</h1>
<form action="/disciplinas" method="POST">
    @csrf
    <label>Nome:</label>
    <input type="text" name="nome">
    <button type="submit">Salvar</button>
</form>