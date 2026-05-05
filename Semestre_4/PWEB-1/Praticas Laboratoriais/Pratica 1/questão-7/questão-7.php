<?php
function imprimir($variavel){
    var_dump($variavel);
    echo "<br>";
}

echo "<h3>Questão 7: Operadores lógicos</h3>";
$tem_chave = true;
$porta_destrancada = false;

echo "Tem chave E (&&) a porta está destrancada? ";
imprimir($tem_chave && $porta_destrancada); 

echo "Tem chave OU (||) a porta está destrancada? ";
imprimir($tem_chave || $porta_destrancada); 

echo "Negação (!): Invertendo o valor de tem_chave: ";
imprimir(!$tem_chave);