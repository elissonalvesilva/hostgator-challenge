<?php

use Phinx\Migration\AbstractMigration;

class CreateProductsTable extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $products = $this->table('products');
        $products->addColumn('name', 'string', ['null' => false])
              ->addColumn('created_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
              ->addColumn('updated_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
              ->save();
    }
    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->dropTable('products');
    }
}
