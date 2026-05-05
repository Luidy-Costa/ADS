<?php
$nome_taverna = "O Pônei Saltitante";

function visitarTaverna() {
    // Esta variável só existe dentro desta função.
    $bebida = "Cerveja Anã"; 
    echo "O herói está bebendo uma $bebida.<br>";

    global $nome_taverna;
    echo "Ele está na taverna $nome_taverna.<br>";
}

visitarTaverna();

echo "<hr>";

echo "Tentando roubar a bebida de fora da função: " . $bebida;