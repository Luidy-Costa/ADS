<?php
function imprimir($variavel){
    var_dump($variavel);
    echo "<br>";
}

echo "<h3>Questão 6: Comparações entre valores</h3>";
$numero = 10;
$texto = "10";

echo "10 == '10' (Mesmo valor?): ";
imprimir($numero == $texto); 

echo "10 === '10' (Mesmo valor E mesmo tipo?): ";
imprimir($numero === $texto); 

echo "10 != '10' (Valores diferentes?): ";
imprimir($numero != $texto); 

echo "10 !== '10' (Valores OU tipos diferentes?): ";
imprimir($numero !== $texto); 

echo "<hr>"; // Cria uma linha divisória na tela