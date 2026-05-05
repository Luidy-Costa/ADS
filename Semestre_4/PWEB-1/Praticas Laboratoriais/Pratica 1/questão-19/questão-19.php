<?php
$ataque_jogador = 15;
$defesa_monstro = 15;
$nivel_jogador = 4;

echo "<h3>Testando Comparações Numéricas</h3>";

echo "Ataque MAIOR que a defesa? (>): ";
var_dump($ataque_jogador > $defesa_monstro);
echo "<br>";

echo "Ataque MENOR que a defesa? (<): ";
var_dump($ataque_jogador < $defesa_monstro);
echo "<br>";

echo "Ataque MAIOR OU IGUAL à defesa? (>=): ";
var_dump($ataque_jogador >= $defesa_monstro);
echo "<br>";

echo "Nível do jogador é MENOR OU IGUAL a 5? (<=): ";
var_dump($nivel_jogador <= 5);
echo "<br>";

echo "O nível do jogador é par? (Usando o módulo %): ";
var_dump(($nivel_jogador % 2) == 0);
echo "<br>";