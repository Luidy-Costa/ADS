<?php

namespace Controllers;

use Repositories\PedidoRepository;
use Models\Pedido;
use Models\ItemPedido;
use Services\ProdutoFactory;
use Services\DescontoPix;

class PedidoController {
    private PedidoRepository $repository;

    public function __construct() {
        $this->repository = new PedidoRepository();
    }

    // Endpoint: GET /pedidos
    public function listar(): void {
        header('Content-Type: application/json');
        $pedidos = $this->repository->listarTodos();
        echo json_encode($pedidos);
    }

    // Endpoint: POST /pedidos
    public function criar(array $dadosRequisicao): void {
        header('Content-Type: application/json');

        try {
            // Cria um novo pedido (usando um ID simulado baseado no timestamp)
            $novoPedidoId = time();
            $pedido = new Pedido($novoPedidoId);

            // Verifica se vieram itens na requisição
            if (!isset($dadosRequisicao['itens']) || !is_array($dadosRequisicao['itens'])) {
                http_response_code(400); // Bad Request
                echo json_encode(["erro" => "Formato de itens inválido."]);
                return;
            }

            // Processa cada item do carrinho usando a Factory
            foreach ($dadosRequisicao['itens'] as $itemData) {
                // A Factory cria o Produto
                $produto = ProdutoFactory::criar($itemData['tipo'], [
                    'id' => $itemData['produto_id'],
                    'nome' => $itemData['nome'],
                    'preco' => $itemData['preco']
                ]);

                // Instancia o ItemPedido e adiciona ao Pedido
                $itemPedido = new ItemPedido(
                    rand(1, 1000), // ID simulado do item
                    $novoPedidoId,
                    $produto->getId(),
                    $itemData['quantidade'],
                    $produto->getPreco()
                );
                
                $pedido->adicionarItem($itemPedido);
            }

            // Exemplo de uso da Strategy: se a forma de pagamento for Pix, aplica desconto
            if (isset($dadosRequisicao['pagamento']) && $dadosRequisicao['pagamento'] === 'pix') {
                $pedido->setDescontoEstrategia(new DescontoPix());
            }

            // Salva usando o Repository
            $this->repository->salvar($pedido);

            http_response_code(201); // Created
            echo json_encode([
                "mensagem" => "Pedido criado com sucesso!",
                "pedido_id" => $novoPedidoId,
                "total_com_desconto" => $pedido->getValorTotal()
            ]);

        } catch (\Exception $e) {
            http_response_code(500); // Internal Server Error
            echo json_encode(["erro" => $e->getMessage()]);
        }
    }
}