<?php

namespace Models;

use DateTime;

class Pedido {
    private int $id;
    private DateTime $data;
    private string $status;
    private float $valorTotal = 0.0;
    private ?\Services\DescontoStrategy $estrategiaDesconto = null;
    
    /** @var ItemPedido[] */
    private array $itens = [];

    public function __construct(int $id) {
        $this->id = $id;
        $this->data = new DateTime();
        $this->status = "Aberto";
    }

    public function adicionarItem(ItemPedido $item): void {
        $this->itens[] = $item;
        $this->calcularTotal();
    }

    public function atualizarStatus(string $novoStatus): void {
        $this->status = $novoStatus;
    }

    public function setDescontoEstrategia(\Services\DescontoStrategy $estrategia): void {
        $this->estrategiaDesconto = $estrategia;
        $this->calcularTotal(); // Recalcula o total com o desconto
    }

    public function calcularTotal(): void {
        $this->valorTotal = 0.0;
        foreach ($this->itens as $item) {
            $this->valorTotal += $item->getSubtotal();
        }

        // Se houver uma estratégia de desconto aplicada, subtrai do total
        if ($this->estrategiaDesconto !== null) {
            $desconto = $this->estrategiaDesconto->calcular($this->valorTotal);
            $this->valorTotal -= $desconto;
        }
    }

    // Getters
    public function getValorTotal(): float { return $this->valorTotal; }
    public function getStatus(): string { return $this->status; }
    public function getItens(): array { return $this->itens; }
}