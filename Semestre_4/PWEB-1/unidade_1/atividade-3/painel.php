<?php
session_start();

// Controle de acesso: se não tem sessão, expulsa pro login
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: index.php");
    exit;
}

// Implementando o logout
if (isset($_GET['sair'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel</title>
</head>
<body>
    <h2>Bem-vindo ao Painel de Controle!</h2>
    <p style='color: green;'>Você está logado na área restrita do sistema.</p>
    
    <a href="?sair=true"><button>Sair do Sistema</button></a>
</body>
</html>