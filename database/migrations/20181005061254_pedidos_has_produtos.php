<?php


use Phinx\Migration\AbstractMigration;

class PedidosHasProdutos extends AbstractMigration
{
    public function change()
    {
        $this->table('pedidos_has_produtos')
            ->addColumn('id_pedido', 'integer')
            ->addColumn('id_produto', 'integer')
            ->addColumn('quantidade', 'integer')
            ->addColumn('created_at', 'datetime', ['null' => true])
            ->addColumn('updated_at', 'datetime', ['null' => true])
            ->addColumn('deleted_at', 'datetime', ['null' => true])
            ->addForeignKey('id_pedido', 'pedidos', 'id')
            ->addForeignKey('id_produto', 'produtos', 'id')
            ->create();
    }
}
