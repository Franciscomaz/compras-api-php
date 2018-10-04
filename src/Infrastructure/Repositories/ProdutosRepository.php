<?php

namespace Compras\Infrastructure\Repositories;

use Compras\Domain\Produto\IProdutoRepository;
use Compras\Domain\Produto\Produto;
use Compras\Infrastructure\Factories\ProdutoFactory;
use Compras\Infrastructure\Models\ProdutoModel;
use Exception;

class ProdutosRepository implements IProdutoRepository
{
    public function listar(): array
    {
        return ProdutoModel::all()->all();
    }

    public function adicionar(Produto $produto): Produto
    {
        try {
            ProdutoModel::create($produto->toArray());
            return $produto;
        } catch (\Exception $exception) {
            throw new Exception('Ocorreu um erro ao salvar o produto: ' . $exception->getMessage());
        }
    }

    public function remover(Produto $produto): Produto
    {
        try {
            ProdutoModel::destroy($produto->id());
            return $produto;
        } catch (\Exception $exception) {
            throw new Exception('Ocorreu um erro ao remover o produto: ' . $exception->getMessage());
        }
    }

    public function buscar($id): Produto
    {
        $produto = ProdutoModel::query()
            ->where('id', $id)
            ->get();
        if ($produto->isEmpty()) {
            throw new Exception('Produto não encontrado: ' . $id);
        }
        return ProdutoFactory::criar($produto);
    }

    public function atualizar(Produto $produto): Produto
    {
        try {
            Produto::where('id', $produto->id())
                ->update($produto->toArray());
            return $produto;
        } catch (\Exception $exception) {
            throw new Exception('Ocorreu um erro ao atualizar o produto: ' . $exception->getMessage());
        }

    }
}
