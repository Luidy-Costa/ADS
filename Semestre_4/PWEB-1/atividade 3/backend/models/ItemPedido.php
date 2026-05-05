<?php

namespace Models;

class ItemPedido {
    private int $id;
    private int $pedido_id;
    private int $produto_id;
    private int $quantidade;
    private float $precoUnitario;

    public function __construct(int $id, int $pedido_id, int $produto_id, int $quantidade, float $precoUnitario) {
        $this->id = $id;
        $this->pedido_id = $pedido_id;
        $this->produto_id = $produto_id;
        $this->quantidade = $quantidade;
        $this->precoUnitario = $precoUnitario;
    }

    public function getSubtotal(): float {
        return $this->quantidade * $this->precoUnitario;
    }

    // Getters
    public function getProdutoId(): int { return $this->produto_id; }
    public function getQuantidade(): int { return $this->quantidade; }
    public function getPrecoUnitario(): float { return $this->precoUnitario; }
}