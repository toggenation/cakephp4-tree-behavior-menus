<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class TreeEnableTreesTable extends AbstractMigration
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
        $this->table('trees')
            ->addColumn('parent_id', 'integer', [
                'null' => true,
                'default' => null
            ])
            ->addColumn('lft', 'integer', [
                'null' => true,
                'default' => null
            ])
            ->addColumn('rght', 'integer', [
                'null' => true,
                'default' => null
            ])
            ->update();
    }
}
