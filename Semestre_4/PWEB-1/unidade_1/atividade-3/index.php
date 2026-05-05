<?php
session_start();

// Se já estiver logado, manda direto pro painel
if (isset($_SESSION['logado']) && $_SESSION['logado'] === true) {
    header("Location: painel.php");
    exit;
}

$erro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Verifica usuário e senha fixos
    if ($usuario === 'admin' && $senha === '1234') {
        $_SESSION['logado'] = true;
        header("Location: painel.php");
        exit;
    } else {
        $erro = "Usuário ou senha incorretos!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Acesso Restrito</h2>
    <?php if($erro) echo "<p style='color:red;'>$erro</p>"; ?>
    <form method="POST">
        <p>Usuário: <input type="text" name="usuario" required></p>
        <p>Senha: <input type="password" name="senha" required></p>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>