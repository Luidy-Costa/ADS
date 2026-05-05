<?php

namespace Repositories;

class JsonDatabase {
    
    private static ?JsonDatabase $instancia = null;
    private string $arquivoJson;

    private function __construct() {
        $this->arquivoJson = __DIR__ . '/../data/pedidos.json';
        $this->inicializarArquivo();
    }

    public static function getInstancia(): JsonDatabase {
        if (self::$instancia === null) {
            self::$instancia = new JsonDatabase();
        }
        return self::$instancia;
    }

    private function inicializarArquivo(): void {
        $diretorio = dirname($this->arquivoJson);
        if (!is_dir($diretorio)) {
            mkdir($diretorio, 0777, true);
        }
        
        if (!file_exists($this->arquivoJson)) {
            file_put_contents($this->arquivoJson, json_encode([]));
        }
    }

    public function lerDados(): array {
        $conteudo = file_get_contents($this->arquivoJson);
        return json_decode($conteudo, true) ?? [];
    }

    public function salvarDados(array $dados): void {
        file_put_contents($this->arquivoJson, json_encode($dados, JSON_PRETTY_PRINT));
    }
}