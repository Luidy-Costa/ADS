<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Agenda Estudantil</title>
</head>
<body>
    <h2>📅 Nova Tarefa na Agenda</h2>
    
    <form method="POST" action="">
        <label>Nome do Estudante:</label><br>
        <input type="text" name="nome_aluno" required><br><br>

        <label>Data do Compromisso:</label><br>
        <input type="date" name="data_tarefa" required><br><br>

        <label>O que você precisa fazer hoje?</label><br>
        <textarea name="descricao_tarefa" rows="4" cols="30" required></textarea><br><br>

        <button type="submit">Salvar na Agenda</button>
    </form>

    <hr>

    <?php
    // O PHP verifica se o formulário foi enviado (se o método da requisição é POST)
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Coletando os dados dos inputs usando o atributo 'name' do HTML
        $nome = $_POST["nome_aluno"];
        $data = $_POST["data_tarefa"];
        $tarefa = $_POST["descricao_tarefa"];

        // Imprimindo o resultado na tela
        echo "<h3>✅ Compromisso Registrado com Sucesso!</h3>";
        echo "<strong>Estudante:</strong> $nome <br>";
        
        // Extra: Mudando o formato da data do padrão americano (AAAA-MM-DD) para o brasileiro (DD/MM/AAAA)
        $data_formatada = date("d/m/Y", strtotime($data));
        echo "<strong>Data:</strong> $data_formatada <br>";
        
        echo "<strong>Tarefa:</strong> $tarefa <br>";
    }
    ?>
</body>
</html>