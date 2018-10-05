<?php

namespace Compras\Domain\Pedido;

use Compras\Infrastructure\Contratos\Arrayable;
use Compras\Infrastructure\Contratos\Jsonable;
use Toreti\Tempo\Data;

class Pedido implements Arrayable, Jsonable
{
    private $id;
    private $data;
    private $produtos;

    public function __construct(Data $data)
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

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function adicionarProduto(ProdutoDoPedido $produto)
    {
        $this->produtos[] = $produto;
    }

    public function dataDoPedido()
    {
        return $this->data;
    }

    /**
     * @return ProdutoDoPedido[]
     */
    public function produtos()
    {
        return $this->produtos;
    }

    public function quantidade()
    {
        return count($this->produtos);
    }

    public function valorTotal()
    {
        return array_reduce($this->produtos, function ($total, ProdutoDoPedido $produto) {
            return $total + $produto->valorTotal();
        }, 0);
    }

    public function toArray()
    {
        $produtos = [];
        foreach ($this->produtos() as $produto) {
            $produtos[] = $produto->toArray();
        }
        return [
            'id' => $this->id,
            'data_pedido' => $this->data->formatoBR(),
            'produtos' => $produtos,
            'valor' => $this->valorTotal()
        ];
    }

    public function toJson()
    {
        return json_encode($this->toArray());
    }
}
