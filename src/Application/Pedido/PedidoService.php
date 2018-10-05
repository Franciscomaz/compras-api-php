<?php

namespace Compras\Application\Pedido;

use Compras\Domain\Pedido\Pedido;
use Compras\Domain\Pedido\IPedidoRepository;

class PedidoService
{
    /**
     * @var IPedidoRepository
     */
    private $pedidoRepository;

    public function __construct(IPedidoRepository $pedidoRepository)
    {
        $this->pedidoRepository = $pedidoRepository;
    }

    public function realizarPedido($dados): Pedido
    {
        if(!isset($dados['produtos'])) {
            throw new \Exception('Nenhum produto foi informado.');
        }

        $produtos = $dados['produtos'];

        $pedido = Pedido::novo();
        foreach ($produtos as $produto) {
            $pedido->adicionarProduto(ProdutoPedidoFactory::criar($produto));
        }
        return $this->pedidoRepository->adicionar($pedido);
    }

    public function pedidosRealizados(): array
    {
        $pedidos = $this->pedidoRepository->listar();
        return !empty($pedidos) ? array_map(function (Pedido $pedido) {
            return $pedido->toArray();
        }, $pedidos) : [];
    }

    public function buscar($id)
    {
        return $this->pedidoRepository->buscar($id);
    }
}
