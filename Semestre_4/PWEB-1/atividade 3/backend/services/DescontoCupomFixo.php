<?php

namespace Services;

class DescontoCupomFixo implements DescontoStrategy {
    private float $valorDesconto;

    public function __construct(float $valorDesconto) {
        $this->valorDesconto = $valorDesconto;
    }

    public function calcular(float $valorTotal): float {
        // Subtrai um valor fixo (ex: R$ 5.00), garantindo que não fique negativo
        return ($valorTotal >= $this->valorDesconto) ? $this->valorDesconto : $valorTotal;
    }
}