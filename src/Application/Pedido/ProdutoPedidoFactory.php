<?php

namespace Compras\Application\Pedido;

use Compras\Application\Produto\ProdutoFactory;
use Compras\Domain\Pedido\ProdutoDoPedido;

class ProdutoPedidoFactory
{
    public static function criar($dados)
    {
        $produto = ProdutoFactory::criar($dados);
        return new ProdutoDoPedido($produto, $dados['quantidade']);
    }
}
