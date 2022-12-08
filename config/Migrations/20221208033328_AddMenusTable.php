<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class AddMenusTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $this->table('menus')
            ->addColumn('parent_id', 'integer', ['null' => true, 'default' => null])
            ->addColumn('lft', 'integer')
            ->addColumn('rght', 'integer')
            ->addColumn('level', 'integer', ['default' => 0])
            ->addColumn('name', 'string')
            ->addColumn('url', 'string')
            ->addColumn('active', 'boolean')
            ->addColumn('disabled', 'boolean')
            ->addIndex(['lft'], ['name' => 'idx_lft'])
            ->addIndex(['parent_id'])
            ->addColumn('divider_before', 'boolean', ['default' => false])
            ->create();
    }
}
