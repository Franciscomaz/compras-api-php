<?php

namespace Test\Integration\Produto;

use Compras\Application\Produto\ProdutoService;
use Compras\Infrastructure\Repositories\ProdutosRepository;
use PHPUnit\Framework\TestCase;

class ProdutoTest extends TestCase
{


    public function testAdicionarProduto()
    {
        (new ProdutoService(new ProdutosRepository()))->adicionar();
    }
}
