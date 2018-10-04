<?php

namespace Compras\Domain\Pedido;

interface IPedidoRepository
{
    public function listar(): array;
    public function adicionar(Pedido $pedido): Pedido;
    public function buscar($id): Pedido;
}
