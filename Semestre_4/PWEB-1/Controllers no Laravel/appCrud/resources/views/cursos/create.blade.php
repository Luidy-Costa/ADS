<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Curso</title>
</head>
<body>
    <h1>Cadastro de Curso</h1>
    
    <form action="/cursos" method="POST">
        @csrf
        <label>Nome do curso:</label><br>
        <input type="text" name="nome"><br><br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>