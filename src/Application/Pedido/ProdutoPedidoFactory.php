<?php

namespace Compras\Application\Pedido;

use Compras\Application\Produto\ProdutoFactory;
use Compras\Domain\Pedido\ProdutoPedido;

class ProdutoPedidoFactory
{
    public static function criar($dados)
    {
        $produto = ProdutoFactory::criar($dados);
        return new ProdutoPedido($produto, $dados['quantidade']);
    }
}
