<?php
echo "<h3>Testando isset() e empty() no Inventário</h3>";

$pocao = "Poção de Vida Média"; // Uma string normal
$ouro = 0;                      // O personagem está quebrado
$capa = "";                     // O espaço da capa existe, mas não tem nada equipado
$pet = null;                    // Não tem nenhum pet definido

echo "<strong>Analisando a Poção ('Poção de Vida Média'):</strong><br>";
echo "Está definida (isset)? "; var_dump(isset($pocao)); echo "<br>";
echo "Está vazia (empty)? "; var_dump(empty($pocao)); echo "<br><hr>";

echo "<strong>Analisando o Ouro (0):</strong><br>";
echo "Está definido (isset)? "; var_dump(isset($ouro)); echo "<br>";
echo "Está vazio (empty)? "; var_dump(empty($ouro)); echo "<br><hr>";

echo "<strong>Analisando a Capa ('' - string vazia):</strong><br>";
echo "Está definida (isset)? "; var_dump(isset($capa)); echo "<br>";
echo "Está vazia (empty)? "; var_dump(empty($capa)); echo "<br><hr>";

echo "<strong>Analisando o Pet (null):</strong><br>";
echo "Está definido (isset)? "; var_dump(isset($pet)); echo "<br>";
echo "Está vazio (empty)? "; var_dump(empty($pet)); echo "<br>";