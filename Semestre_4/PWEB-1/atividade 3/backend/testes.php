<?php

spl_autoload_register(function ($class) {
    $partes = explode('\\', $class);
    $nomeArquivo = array_pop($partes);
    $pastas = strtolower(implode('/', $partes));
    $path = __DIR__ . '/' . $pastas . '/' . $nomeArquivo . '.php';
    if (file_exists($path)) {
        require_once $path;
    }
});

use Models\Pedido;
use Models\ItemPedido;
use Services\DescontoPix;

echo "🚀 Iniciando bateria de testes...\n\n";

// ==========================================
// TESTE 1: Cálculo de Total Sem Desconto
// ==========================================
echo "Teste 1: Cálculo de Total do Pedido\n";
$pedido = new Pedido(1);

$pedido->adicionarItem(new ItemPedido(1, 1, 101, 2, 45.00));
// 1x Hambúrguer de R$ 25.00 = R$ 25.00
$pedido->adicionarItem(new ItemPedido(2, 1, 102, 1, 25.00));

$totalEsperado = 115.00; // 90 + 25
$totalCalculado = $pedido->getValorTotal();

if ($totalCalculado === $totalEsperado) {
    echo "✅ PASSOU: O cálculo do total está correto (R$ 115.00).\n";
} else {
    echo "❌ FALHOU: Esperado R$ {$totalEsperado}, mas o sistema calculou R$ {$totalCalculado}.\n";
}

echo "------------------------------------------\n";

// ==========================================
// TESTE 2: Aplicação de Desconto (Strategy)
// ==========================================
echo "Teste 2: Aplicação de Desconto Pix (10%)\n";

$pedido->setDescontoEstrategia(new DescontoPix());

$totalEsperadoComDesconto = 103.50;
$totalCalculadoComDesconto = $pedido->getValorTotal();

if ($totalCalculadoComDesconto === $totalEsperadoComDesconto) {
    echo "✅ PASSOU: O desconto foi aplicado corretamente (R$ 103.50).\n";
} else {
    echo "❌ FALHOU: Esperado R$ {$totalEsperadoComDesconto}, mas o sistema calculou R$ {$totalCalculadoComDesconto}.\n";
}

echo "\n🏁 Testes finalizados!\n";