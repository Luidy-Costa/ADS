<?php

namespace Repositories;

use Models\Pedido;

class PedidoRepository {
    private JsonDatabase $db;

    public function __construct() {
        $this->db = JsonDatabase::getInstancia();
    }

    public function salvar(Pedido $pedido): void {
        $pedidos = $this->db->lerDados();
        
        $pedidoArray = [
            'status' => $pedido->getStatus(),
            'valorTotal' => $pedido->getValorTotal(),
            'itens' => array_map(function($item) {
                return [
                    'produto_id' => $item->getProdutoId(),
                    'quantidade' => $item->getQuantidade(),
                    'precoUnitario' => $item->getPrecoUnitario(),
                    'subtotal' => $item->getSubtotal()
                ];
            }, $pedido->getItens())
        ];

        $pedidos[] = $pedidoArray;
        
        $this->db->salvarDados($pedidos);
    }

    public function listarTodos(): array {
        return $this->db->lerDados();
    }
}