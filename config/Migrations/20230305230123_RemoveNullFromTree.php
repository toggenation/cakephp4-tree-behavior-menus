<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class RemoveNullFromTree extends AbstractMigration
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
        $this->table('tree')
            ->changeColumn('lft', 'integer', ['null' => false])
            ->changeColumn('rght', 'integer', ['null' => false])
            ->changeColumn('level', 'integer', ['null' => false])
            ->update();
    }
}
