<?php

namespace Test\Integration\Pedido;

use Compras\Application\Pedido\PedidoService;
use Compras\Infrastructure\Database;
use Compras\Infrastructure\Env;
use Compras\Infrastructure\Repositories\PedidoRepository;
use PHPUnit\Framework\TestCase;

class PedidoTest extends TestCase
{
    public static function setUpBeforeClass()
    {
        Env::load();
        Database::conectar();
    }

    public function testRealizarPedido()
    {
        $array = [
            'produtos' => [
                [
                    'id' => 2,
                    'nome' => 'Camisa',
                    'descricao' => 'Camisa verd',
                    'valor' => '59.9',
                    'quantidade' => '4'
                ]
            ]
        ];
        $pedidoService = new PedidoService(new PedidoRepository());
        $pedido = $pedidoService->realizarPedido($array);
        $novoPedido = $pedidoService->buscar($pedido->id());
        $this->assertEquals($pedido->id(), $novoPedido->id());
    }
}
