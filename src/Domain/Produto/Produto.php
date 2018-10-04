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
    private $categoria;

    public function __construct($nome, $descricao, $valor, $categoria)
    {
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->valor = $valor;
        $this->categoria = $categoria;
    }

    public function id()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
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

    public function categoria()
    {
        return $this->categoria;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'valor' => $this->valor,
            'categoria' => $this->categoria
        ];
    }

    public function toJson()
    {
        return json_encode($this->toArray());
    }
}
