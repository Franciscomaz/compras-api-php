<?php

namespace Compras\Domain\Pedido;

use Compras\Domain\Produto\Produto;
use Compras\Infrastructure\Contratos\Arrayable;

class ProdutoDoPedido implements Arrayable
{
    private $quantidade;
    private $produto;

    public function __construct(Produto $produto, $quantidade)
    {
        $this->produto = $produto;
        $this->quantidade = $quantidade;
    }

    public function id()
    {
        return $this->produto->id();
    }

    public function valorTotal()
    {
        return $this->produto->valor() * $this->quantidade;
    }

    public function quantidade()
    {
        return $this->quantidade;
    }

    public function toArray()
    {
        $array = [
            'quantidade' => $this->quantidade,
            'valor_total' => $this->valorTotal()
        ];
        return array_merge($this->produto->toArray(), $array);
    }
}
