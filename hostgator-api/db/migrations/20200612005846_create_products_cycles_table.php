<?php

use Phinx\Migration\AbstractMigration;

class CreateProductsCyclesTable extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $cycles = $this->table('cycles');
        $cycles->addColumn('type', 'string', ['null' => false])
               ->addColumn('priceRenew', 'string', ['null' => false])
               ->addColumn('priceOrder', 'string', ['null' => false])
               ->addColumn('months', 'integer', ['null' => false])
               ->addColumn('product_id', 'integer')
               ->addColumn('created_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
               ->addColumn('updated_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
               ->addForeignKey('product_id', 'products', 'id', ['update'=> 'NO_ACTION'])
               ->save();
    }
    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->dropTable('cycles');
    }
}
