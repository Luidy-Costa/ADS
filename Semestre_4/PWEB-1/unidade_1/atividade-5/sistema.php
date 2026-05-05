<?php
session_start();

// Proteção da página
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: index.php");
    exit;
}

// Fazendo o logout
if (isset($_GET['sair'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}

// Função exigida para validação de dados
function validarDados($nome, $email, $curso) {
    if (empty(trim($nome)) || empty(trim($email)) || empty(trim($curso))) {
        return "Todos os campos são obrigatórios.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "O formato do e-mail é inválido.";
    }
    return "ok";
}

$mensagem = "";

// Processando o formulário de cadastro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $curso = $_POST['curso'];

    // Usando a função para validar
    $validacao = validarDados($nome, $email, $curso);

    if ($validacao === "ok") {
        // Armazenamento temporário em array
        $novoRegistro = [
            'nome' => $nome,
            'email' => $email,
            'curso' => $curso
        ];
        
        // Adiciona o novo registro ao array da sessão
        $_SESSION['registros'][] = $novoRegistro;
        
        $mensagem = "<p style='color:green;'>Aluno cadastrado com sucesso!</p>";
    } else {
        $mensagem = "<p style='color:red;'>Erro: $validacao</p>";
    }
}

// Limpar os registros (opcional, para facilitar seus testes)
if (isset($_GET['limpar_dados'])) {
    $_SESSION['registros'] = [];
    header("Location: sistema.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Sistema - Desafio Integrador</title>
</head>
<body>
    <div style="float: right;">
        <a href="?sair=true"><button>Sair (Logout)</button></a>
    </div>

    <h2>Cadastro de Alunos</h2>
    <?php echo $mensagem; ?>

    <form method="POST">
        <p>Nome: <input type="text" name="nome"></p>
        <p>E-mail: <input type="text" name="email"></p>
        <p>Curso: <input type="text" name="curso"></p>
        <button type="submit" name="cadastrar">Salvar Registro</button>
    </form>

    <hr>

    <h2>Alunos Cadastrados</h2>
    
    <?php
    // Verifica se existem registros no array e exibe
    if (!empty($_SESSION['registros'])) {
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>Nome</th><th>E-mail</th><th>Curso</th></tr>";
        
        foreach ($_SESSION['registros'] as $aluno) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($aluno['nome']) . "</td>";
            echo "<td>" . htmlspecialchars($aluno['email']) . "</td>";
            echo "<td>" . htmlspecialchars($aluno['curso']) . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
        echo "<br><a href='?limpar_dados=true'>Limpar todos os registros</a>";
    } else {
        echo "<p>Nenhum aluno cadastrado ainda.</p>";
    }
    ?>
</body>
</html>