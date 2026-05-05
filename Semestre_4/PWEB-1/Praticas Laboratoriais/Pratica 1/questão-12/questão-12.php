<?php
$frase = "O Bárbaro usou Fúria contra o Dragão!";

echo "Original: " . $frase . "<br><br>";

echo "Maiúsculas: " . strtoupper($frase) . "<br>";

echo "Minúsculas: " . strtolower($frase) . "<br>";

echo "Tamanho (caracteres): " . strlen($frase) . "<br>";

echo "Substituído: " . str_replace("Dragão", "Goblin", $frase) . "<br>";