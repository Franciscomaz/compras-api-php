<?php

namespace Compras\Domain\Pedido;

use Compras\Domain\Produto\Produto;

class ProdutoPedido
{
    private $quantidade;
    private $produto;

    public function __construct(Produto $produto, $quantidade)
    {
        $this->produto = $produto;
        $this->quantidade = $quantidade;
    }

    public function valorTotal()
    {
        return $this->produto->valor() * $this->quantidade;
    }

    public function quantidade()
    {
        return $this->quantidade;
    }
}
