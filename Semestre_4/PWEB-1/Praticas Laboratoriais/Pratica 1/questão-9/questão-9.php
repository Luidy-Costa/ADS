<?php
function imprimir($deus_devoto,$deus_favorito){
    echo("Eu sou devoto de $deus_devoto <br> Mas meu deus favorito sempre será $deus_favorito <br>");
}

$deuses = ["Aharadak", "Allihanna", "Arsenal", "Azgher", "Hyninn", 
    "Kallyadranoch", "Khalmyr", "Lena", "Lin-Wu", "Marah", 
    "Megalokk", "Nimb", "Oceano", "Sszzaas", "Tanna-Toh", 
    "Tenebra", "Thwor", "Thyatis", "Valkaria", "Wynna"];

for($i = 0; $i <count($deuses);$i++){
    if($i +1 >= count($deuses))
        imprimir($deuses[$i],$deuses[0]);
    else{
        imprimir($deuses[$i],$deuses[$i+1]);

    }
}
