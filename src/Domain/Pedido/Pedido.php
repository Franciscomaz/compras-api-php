<?php

namespace Compras\Domain\Pedido;

use Compras\Domain\Produto\Produto;
use Toreti\Tempo\Data;

class Pedido
{
    private $id;
    private $data;
    private $produtos;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public static function novo()
    {
        return new self(Data::hoje());
    }

    public function id()
    {
        return $this->id;
    }

    public function adicionarProduto(ProdutoPedido $produto)
    {
        $this->produtos[] = $produto;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function dataDaCompra()
    {
        return $this->produtos;
    }
}
