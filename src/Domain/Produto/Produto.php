<?php

namespace Compras\Domain\Produto;

use Compras\Infrastructure\Contratos\Arrayable;
use Compras\Infrastructure\Contratos\Jsonable;

class Produto implements Arrayable, Jsonable
{
    private $id;
    private $nome;
    private $descricao;
    private $valor;

    public function __construct($nome, $descricao, $valor)
    {
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->valor = $valor;
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

    public function nome()
    {
        return $this->nome;
    }

    public function descricao()
    {
        return $this->descricao;
    }

    public function valor()
    {
        return $this->valor;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'valor' => $this->valor
        ];
    }

    public function toJson()
    {
        return json_encode($this->toArray());
    }
}
