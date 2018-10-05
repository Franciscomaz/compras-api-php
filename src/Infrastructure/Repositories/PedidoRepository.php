<?php

namespace Compras\Infrastructure\Repositories;

use Compras\Domain\Pedido\IPedidoRepository;
use Compras\Domain\Pedido\Pedido;
use Compras\Domain\Pedido\ProdutoDoPedido;
use Compras\Infrastructure\Models\PedidoHasProdutos;
use Compras\Infrastructure\Models\PedidoModel;
use Toreti\Tempo\Data;

class PedidoRepository implements IPedidoRepository
{
    public function listar(): array
    {
        $registros = PedidoModel::all();
        $pedidos = [];
        foreach ($registros->all() as $registro) {
            $pedidos[] = $this->criarObjeto($registro);
        }
        return $pedidos;
    }

    public function buscar($id): Pedido
    {
        $registro = PedidoModel::query()
            ->where('id', $id)
            ->get();

        if ($registro->isEmpty()) {
            throw new \Exception('Pedido não encontrado');
        }

       return $this->criarObjeto($registro->first());
    }

    public function adicionar(Pedido $pedido): Pedido
    {
        $data = $pedido->dataDoPedido()->formato('Y-m-d H:i:s');
        $novoPedido = PedidoModel::create(['data_pedido' => $data]);
        $pedido->setId($novoPedido->id);
        foreach ($pedido->produtos() as $produto){
            $array = [
                'id_pedido' => $pedido->id(),
                'id_produto' => $produto->id(),
                'quantidade' => $produto->quantidade()
            ];
            PedidoHasProdutos::create($array);
        }
        return $pedido;
    }

    public function produtosDoPedido($id): array
    {
        $registros = PedidoHasProdutos::query()
            ->where('id_pedido', $id)
            ->get();
        $produtos = [];
        foreach ($registros->all() as $registro) {
            $produto = (new ProdutosRepository())->buscar($registro->id_produto);
            $produtos[] = new ProdutoDoPedido($produto, $registro['quantidade']);
        }
        return $produtos;
    }

    private function criarObjeto($registro)
    {
        $pedido = new Pedido(Data::criar($registro->data_pedido, 'Y-m-d H:i:s'));
        $produtos = $this->produtosDoPedido($registro->id);
        foreach ($produtos as $produto) {
            $pedido->adicionarProduto($produto);
        }
        return $pedido->setId($registro->id);
    }
}
