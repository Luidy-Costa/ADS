<?php
class Carro {
    public $marca;
    public $modelo;
    public $ano;
}

$meu_carro = new Carro();

$meu_carro->marca = "Volkswagen";
$meu_carro->modelo = "Fusca";
$meu_carro->ano = 1970;

echo "Eu tenho um " . $meu_carro->marca . " " . $meu_carro->modelo . " do ano " . $meu_carro->ano . ".<br>";