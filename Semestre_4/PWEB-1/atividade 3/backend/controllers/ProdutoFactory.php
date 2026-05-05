<?php

namespace Services;

use Models\Produto;
use InvalidArgumentException;

class ProdutoFactory {
    
    /**
     * Cria um novo Produto com base no tipo informado.
     * * @param string $tipo (ex: 'pizza', 'bebida', 'lanche')
     * @param array $dados (array contendo id, nome, preco)
     * @return Produto
     */
    public static function criar(string $tipo, array $dados): Produto {
        
        // Validação básica para garantir que os dados necessários existem
        if (!isset($dados['id']) || !isset($dados['nome']) || !isset($dados['preco'])) {
            throw new InvalidArgumentException("Dados incompletos para criar o produto.");
        }

        $tipo = strtolower($tipo);

        // A Factory decide qual ID de categoria associar e pode aplicar 
        // regras de negócio específicas para cada tipo de produto no futuro.
        switch ($tipo) {
            case 'pizza':
                $categoria_id = 1; // Supondo que 1 seja a categoria de Pizzas
                return new Produto($dados['id'], "Pizza: " . $dados['nome'], $dados['preco'], $categoria_id);
                
            case 'lanche':
                $categoria_id = 2; // Supondo que 2 seja Lanches
                return new Produto($dados['id'], "Lanche: " . $dados['nome'], $dados['preco'], $categoria_id);
                
            case 'bebida':
                $categoria_id = 3; // Supondo que 3 seja Bebidas
                return new Produto($dados['id'], "Bebida: " . $dados['nome'], $dados['preco'], $categoria_id);
                
            default:
                throw new InvalidArgumentException("Tipo de produto desconhecido: {$tipo}");
        }
    }
}