<?php


use Phinx\Migration\AbstractMigration;

class Produtos extends AbstractMigration
{
    public function change()
    {
        $this->table('produtos')
            ->addColumn('nome', 'string', ['limit' => 100, 'null' => false])
            ->addColumn('descricao', 'string', ['limit' => 200, 'null' => false])
            ->addColumn('valor', 'float', ['null' => false])
            ->addColumn('created_at', 'datetime', ['null' => true])
            ->addColumn('updated_at', 'datetime', ['null' => true])
            ->addColumn('deleted_at', 'datetime', ['null' => true])
            ->create();
    }
}
