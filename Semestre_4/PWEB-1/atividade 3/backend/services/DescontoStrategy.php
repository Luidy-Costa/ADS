<?php

namespace Services;

interface DescontoStrategy {
    public function calcular(float $valorTotal): float;
}