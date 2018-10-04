<?php

namespace Compras\Infrastructure\Repositories;

use Compras\Domain\Pedido\IPedidoRepository;
use Compras\Domain\Pedido\Pedido;
use Compras\Infrastructure\Models\PedidoModel;

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
}
