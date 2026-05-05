<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Atividade 2 - Cadastro</title>
</head>
<body>
    <h2>Cadastro para Evento Acadêmico</h2>
    <form action="" method="POST">
        <p>Nome: <input type="text" name="nome"></p>
        <p>E-mail: <input type="email" name="email"></p>
        <p>Curso: <input type="text" name="curso"></p>
        <p>Turno:
            <select name="turno">
                <option value="">Selecione...</option>
                <option value="Manhã">Manhã</option>
                <option value="Tarde">Tarde</option>
                <option value="Noite">Noite</option>
            </select>
        </p>
        <button type="submit">Enviar Cadastro</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $curso = $_POST['curso'];
        $turno = $_POST['turno'];

        if (empty($nome) || empty($email) || empty($curso) || empty($turno)) {
            echo "<p style='color: red; font-weight: bold;'>Erro: Todos os campos devem ser preenchidos!</p>";
        } else {
            echo "<hr>";
            echo "<h3 style='color: green;'>Cadastro realizado com sucesso!</h3>";
            echo "<ul>";
            echo "<li><strong>Nome:</strong> $nome</li>";
            echo "<li><strong>E-mail:</strong> $email</li>";
            echo "<li><strong>Curso:</strong> $curso</li>";
            echo "<li><strong>Turno:</strong> $turno</li>";
            echo "</ul>";
        }
    }
    ?>
</body>
</html>