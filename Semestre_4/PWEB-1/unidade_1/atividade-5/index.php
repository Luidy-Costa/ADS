<?php
session_start();

// Se já estiver logado, vai direto pro sistema
if (isset($_SESSION['logado']) && $_SESSION['logado'] === true) {
    header("Location: sistema.php");
    exit;
}

$erro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Validando o login
    if ($usuario === 'admin' && $senha === '1234') {
        $_SESSION['logado'] = true;
        
        // Cria o array na sessão para armazenar os cadastros temporariamente
        if (!isset($_SESSION['registros'])) {
            $_SESSION['registros'] = [];
        }
        
        header("Location: sistema.php");
        exit;
    } else {
        $erro = "Usuário ou senha inválidos!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login - Desafio Integrador</title>
</head>
<body>
    <h2>Acesso ao Sistema Integrador</h2>
    <?php if($erro) echo "<p style='color:red;'>$erro</p>"; ?>
    
    <form method="POST">
        <p>Usuário: <input type="text" name="usuario" required></p>
        <p>Senha: <input type="password" name="senha" required></p>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>