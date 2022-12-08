<?php

declare(strict_types=1);

use Cake\ORM\Locator\LocatorAwareTrait;
use Migrations\AbstractSeed;

/**
 * Menus seed.
 */
class MenusSeed extends AbstractSeed
{
    use LocatorAwareTrait;
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $table = $this->table('menus');

        $table->truncate();

        $menusTable = $this->fetchTable('Menus');

        $data = [
            [
                'id' => 1,
                'parent_id' => null,
                'name' => 'Admin',
                'url' => '#',
                'active' => true,
                'disabled' => false,
                'divider_before' => false
            ],

            [
                'id' => 2,
                'parent_id' => 1,
                'name' => 'Add Menu',
                'url' => 'menus:add',
                'active' => true,
                'disabled' => false,
                'divider_before' => false
            ],
            [
                'id' => 3,
                'parent_id' => 1,
                'name' => 'List Menus',
                'url' => 'menus:index',
                'active' => true,
                'disabled' => false,
                'divider_before' => true
            ],
            [
                'id' => 4,
                'parent_id' => null,
                'name' => 'External URL',
                'url' => 'https://toggen.com.au',
                'active' => true,
                'disabled' => false,
                'divider_before' => false
            ],
            [
                'id' => 5,
                'parent_id' => null,
                'name' => 'Disabled Link',
                'url' => '#',
                'active' => true,
                'disabled' => true,
                'divider_before' => false
            ]
        ];

        $adapter = $this->getAdapter();

        foreach ($data as $menu) {
            $entity = $menusTable->newEntity($menu);
            $menusTable->save($entity);
            $adapter->beginTransaction();
        }
        // $table->insert($data)->save();
    }
}
