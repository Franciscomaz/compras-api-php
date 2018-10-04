<?php

namespace Compras\Application\Produto;

use Compras\Domain\Produto\IProdutoRepository;
use Compras\Domain\Produto\Produto;

class ProdutoService
{
    private $produtoRepository;

    public function __construct(IProdutoRepository $produtoRepository)
    {
        $this->produtoRepository = $produtoRepository;
    }

    public function listar(): array
    {
        return $this->produtoRepository->listar();
    }

    public function buscar($id): Produto
    {
        return $this->produtoRepository->buscar($id);
    }

    public function adicionar($dados): Produto
    {
        $produto = ProdutoFactory::criar($dados);
        return $this->produtoRepository->adicionar($produto);
    }

    public function atualizar($dados): Produto
    {
        $produto = ProdutoFactory::criar($dados);
        return $this->produtoRepository->adicionar($produto);
    }

    public function remover($id): Produto
    {
        return $this->produtoRepository->remover($this->buscar($id));
    }
}
