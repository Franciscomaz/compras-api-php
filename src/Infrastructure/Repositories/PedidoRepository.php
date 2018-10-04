<?php

namespace Compras\Infrastructure\Repositories;

use Compras\Application\Produto\ProdutoFactory;
use Compras\Domain\Pedido\IPedidoRepository;
use Compras\Domain\Pedido\Pedido;
use Compras\Infrastructure\Models\PedidoModel;
use Compras\Infrastructure\Models\ProdutoModel;

class PedidoRepository implements IPedidoRepository
{
    public function listar(): array
    {
        $pedido = PedidoModel::all();

    }

    public function buscar($id): Pedido
    {
        $pedido = PedidoModel::query()->where('id', $id);
    }

    public function adicionar(Pedido $pedido): Pedido
    {
        // TODO: Implement adicionar() method.
    }

    public function produtosDoPedido($id): array
    {
        $registros = ProdutoModel::query()
            ->where('id', $id)
            ->get();
        $produtos = [];
        foreach ($registros->all() as $registro) {
            $produtos[] = ProdutoFactory::criar($registro);
        }
        return $produtos;
    }
}
