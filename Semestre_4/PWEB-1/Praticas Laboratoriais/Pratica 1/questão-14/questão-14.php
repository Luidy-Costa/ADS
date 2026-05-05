<?php
function contarChamadas() {
    static $contador = 0; 
    
    $contador++; 
    
    echo "Esta função já foi executada $contador vez(es).<br>";
}

contarChamadas();
contarChamadas();
contarChamadas();