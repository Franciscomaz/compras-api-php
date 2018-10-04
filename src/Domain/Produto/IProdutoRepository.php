<?php

namespace Compras\Domain\Produto;

interface IProdutoRepository
{
    public function listar(): array;
    public function adicionar(Produto $produto): Produto;
    public function buscar($id): Produto;
    public function remover(Produto $produto): Produto;
    public function atualizar(Produto $produto): Produto;
}
