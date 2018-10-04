<?php

namespace Compras\Infrastructure\Factories;

use Compras\Domain\Produto\Produto;

class ProdutoFactory
{
    public static function criar($registro)
    {
        return new Produto(
            $registro->id,
            $registro->nome,
            $registro->descricao,
            $registro->valor,
            $registro->categoria
        );
    }
}

