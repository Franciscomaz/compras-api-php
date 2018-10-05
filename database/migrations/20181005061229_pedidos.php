<?php


use Phinx\Migration\AbstractMigration;

class Pedidos extends AbstractMigration
{
    public function change()
    {
        $this->table('pedidos')
            ->addColumn('data_pedido', 'datetime', ['null' => false])
            ->addColumn('created_at', 'datetime', ['null' => true])
            ->addColumn('updated_at', 'datetime', ['null' => true])
            ->addColumn('deleted_at', 'datetime', ['null' => true])
            ->create();
    }
}
