<?php
function imprimir($variavel){    
    echo("A area do circulo é:$variavel<br>");
}
const PI = 3.14;

$raio = 24;
$area = PI * $raio**2;
imprimir($area);