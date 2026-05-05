<?php
function imprimir ($variavel){
    var_dump($variavel);
    echo "<br>";
}

$valores =[5,10.50,"ola Mundo!",True,null];

foreach($valores as $i){
    imprimir($i);
}