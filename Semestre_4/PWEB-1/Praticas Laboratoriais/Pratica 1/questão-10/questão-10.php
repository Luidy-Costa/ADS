<?php
$panteao = [
    "Aharadak" => "Deus da Tormenta",
    "Allihanna" => "Deusa da Natureza",
    "Arsenal" => "Deus da Guerra",
    "Azgher" => "Deus do Sol",
    "Hyninn" => "Deus da Trapaça",
    "Kallyadranoch" => "Deus dos Dragões",
    "Khalmyr" => "Deus da Justiça",
    "Lena" => "Deusa da Vida",
    "Lin-Wu" => "Deus da Honra",
    "Marah" => "Deusa da Paz",
    "Megalokk" => "Deus dos Monstros",
    "Nimb" => "Deus do Caos",
    "Oceano" => "Deus dos Mares",
    "Sszzaas" => "Deus da Traição",
    "Tanna-Toh" => "Deusa do Conhecimento",
    "Tenebra" => "Deusa da Noite",
    "Thwor" => "Deus dos Goblinoides",
    "Thyatis" => "Deus das Segundas Chances",
    "Valkaria" => "Deusa da Ambição",
    "Wynna" => "Deusa da Magia"
];

$pessoa = [
    "nome" => "Luidy",
    "classe" => "Bárbaro",
    "nivel" => 5,
    "deus_devoto" => "Arsenal"
];

echo "<strong>Ficha do Personagem</strong><br>";
echo "Nome: " . $pessoa["nome"] . "<br>";
echo "Classe: " . $pessoa["classe"] . "<br>";
echo "Nível: " . $pessoa["nivel"] . "<br>";

$deus_escolhido = $pessoa["deus_devoto"];
echo "Devoto de: " . $deus_escolhido . " (" . $panteao[$deus_escolhido] . ")<br>";
?>