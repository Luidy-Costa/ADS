<?php
echo "<h3>Testando com TRUE</h3>";
$vivo = true;

$vivo_int = (int) $vivo;
$vivo_string = (string) $vivo;
$vivo_float = (float) $vivo;

var_dump($vivo_int); echo "<br>";
var_dump($vivo_string); echo "<br>";
var_dump($vivo_float); echo "<br>";

echo "<h3>Testando com FALSE</h3>";
$envenenado = false;

$envenenado_int = (int) $envenenado;
$envenenado_string = (string) $envenenado;
$envenenado_float = (float) $envenenado;

var_dump($envenenado_int); echo "<br>";
var_dump($envenenado_string); echo "<br>";
var_dump($envenenado_float); echo "<br>";