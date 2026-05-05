<?php

namespace Services;

class DescontoPix implements DescontoStrategy {
    public function calcular(float $valorTotal): float {
        // Aplica 10% de desconto para pagamentos via Pix
        return $valorTotal * 0.10; 
    }
}