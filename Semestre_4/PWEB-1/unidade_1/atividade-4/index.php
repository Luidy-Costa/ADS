<?php
// Verifica se o formulário foi enviado para criar o cookie
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['nome'])) {
    $nome = $_POST['nome'];
    
    // Cria o cookie válido por 7 dias (7 dias * 24 horas * 60 min * 60 seg)
    setcookie("nome_visitante", $nome, time() + (7 * 24 * 3600));
    
    // Recarrega a página para o cookie ter efeito imediato
    header("Location: index.php");
    exit;
}

// Lógica extra de brinde: apagar o cookie para você conseguir testar várias vezes
if (isset($_GET['limpar'])) {
    setcookie("nome_visitante", "", time() - 3600);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Atividade 4 - Cookies</title>
</head>
<body>
    <h2>Controle de Acesso</h2>

    <?php
    // Verifica se o cookie já existe na máquina do usuário
    if (isset($_COOKIE['nome_visitante'])) {
        $nomeSalvo = $_COOKIE['nome_visitante'];
        echo "<h3 style='color: blue;'>Olá novamente, $nomeSalvo! Bem-vindo de volta.</h3>";
        echo "<p><a href='?limpar=true'>Esquecer meu nome (Limpar Cookie pra testar de novo)</a></p>";
    } else {
        // Caso o cookie não exista, mostra o formulário
    ?>
        <p>Parece que é seu primeiro acesso. Qual o seu nome?</p>
        <form method="POST">
            <input type="text" name="nome" placeholder="Digite seu nome" required>
            <button type="submit">Salvar Nome</button>
        </form>
    <?php
    }
    ?>
</body>
</html>