<?php
function imprimir($variavel){
    var_dump($variavel);
    echo "<br>";
}

$vida_monstro = 50;
$dano_ataque = 12;

$soma = $vida_monstro + $dano_ataque;
$subtracao = $vida_monstro - $dano_ataque;
$multiplicacao = $vida_monstro * $dano_ataque;
$divisao = $vida_monstro / $dano_ataque;
$modulo = $vida_monstro % $dano_ataque; 

imprimir("Soma: " . $soma);
imprimir("Subtração: " . $subtracao);
imprimir("Multiplicação: " . $multiplicacao);
imprimir("Divisão: " . $divisao);
imprimir("Módulo (Resto): " . $modulo);