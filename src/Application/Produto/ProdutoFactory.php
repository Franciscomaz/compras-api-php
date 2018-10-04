<?php

namespace Compras\Application\Produto;

use Compras\Domain\Produto\Produto;

class ProdutoFactory
{
    public static function criar($dados)
    {
        $produto = new Produto(
            $dados['nome'],
            $dados['descricao'],
            $dados['valor'],
            $dados['categoria'],
            $dados['quantidade']
        );

        if(isset($dados['id'])){
            $produto->setId($dados['id']);
        }

        return $produto;
    }
}
