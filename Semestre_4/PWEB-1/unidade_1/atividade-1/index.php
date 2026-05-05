<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Atividade 1 - Classificação Acadêmica</title>
</head>
<body>
    <h2>Sistema de Notas</h2>
    <form action="" method="post">
        <label for="nota">Digite a nota do aluno:</label>
        <input type="number" step="0.1" name="nota" required>
        <button type="submit">Calcular</button>
    </form>

    <?php
    function verificarSituacao($nota) {
        if ($nota >= 7) {
            return "Aprovado";
        } elseif ($nota >= 5 && $nota < 7) {
            return "Recuperação";
        } else {
            return "Reprovado";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nota = floatval($_POST["nota"]);
        $situacao = verificarSituacao($nota);

        echo "<hr>";
        echo "<h3>Resultado:</h3>";
        echo "<p>Nota informada: <strong>$nota</strong></p>";
        echo "<p>Situação final: <strong>$situacao</strong></p>";

        echo "<h4>Histórico de Notas:</h4>";
        echo "<ul>";
        
        for ($i = 0; $i <= floor($nota); $i++) {
            echo "<li>Nota: $i</li>";
        }
        echo "</ul>";
    }
    ?>
</body>
</html>