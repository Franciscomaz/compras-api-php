<?php

namespace Compras\Infrastructure\Factories;

use Compras\Domain\Produto\Produto;

class ProdutoFactory
{
    public static function criar($registro)
    {
        $produto = new Produto(
            $registro->nome,
            $registro->descricao,
            $registro->valor
        );
        return $produto->setId($registro['id']);
    }
}

