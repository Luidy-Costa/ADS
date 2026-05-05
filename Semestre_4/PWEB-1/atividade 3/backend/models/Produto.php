<?php

namespace Models;

class Produto {
    private int $id;
    private string $nome;
    private float $preco;
    private int $categoria_id;

    public function __construct(int $id, string $nome, float $preco, int $categoria_id) {
        $this->id = $id;
        $this->nome = $nome;
        $this->preco = $preco;
        $this->categoria_id = $categoria_id;
    }

    // Getters para acessar os dados com segurança
    public function getId(): int { return $this->id; }
    public function getNome(): string { return $this->nome; }
    public function getPreco(): float { return $this->preco; }
    public function getCategoriaId(): int { return $this->categoria_id; }

    public function getDados(): array {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'preco' => $this->preco,
            'categoria_id' => $this->categoria_id
        ];
    }
}