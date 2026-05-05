<?php
echo "<h3>Testando Incremento (Ganho de Nível)</h3>";
$nivel = 5;

echo "Pós-incremento: O nível era " . $nivel++ . "<br>"; 
echo "Mas agora o nível é: " . $nivel . "<br><br>";

echo "Pré-incremento: O nível subiu direto para " . ++$nivel . "<br>";


echo "<h3>Testando Decremento (Tomando Dano)</h3>";
$hp = 20;

echo "Pós-decremento: O HP era " . $hp-- . " antes do sangramento.<br>";
echo "Mas agora o HP é: " . $hp . "<br><br>";

echo "Pré-decremento: Tomou um acerto crítico e o HP caiu direto para " . --$hp . "<br>";