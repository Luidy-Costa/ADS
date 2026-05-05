<?php
function imprimir($variavel){
    var_dump($variavel);
    echo"<br>";
}
$dano = "7.50";

$dano_int = (int) $dano;
$dano_float = (float) $dano;
$dano_bool = (bool) $dano;

$array = [$dano,$dano_int,$dano_float,$dano_bool];

foreach ($array as $i){
    imprimir($i);
}