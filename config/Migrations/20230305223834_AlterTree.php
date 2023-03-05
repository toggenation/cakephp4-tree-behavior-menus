<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class AlterTree extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        /**
         * parent_id (nullable) The column holding the ID of the parent row. This column should be indexed.

lft (integer, signed) Used to maintain the tree structure. This column should be indexed.

rght (integer, signed) Used to maintain the tree structure.
         */
        $this->table('tree')
            ->addColumn('parent_id', 'integer', ['null' => true, 'default' => null])
            ->addColumn('lft', 'integer', ['null' => true, 'default' => null])
            ->addColumn('rght', 'integer', ['null' => true, 'default' => null])
            ->update();
    }
}
