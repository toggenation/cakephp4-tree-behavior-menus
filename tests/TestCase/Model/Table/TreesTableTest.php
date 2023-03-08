<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TreesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TreesTable Test Case
 */
class TreesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TreesTable
     */
    protected $Trees;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Trees',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Trees') ? [] : ['className' => TreesTable::class];
        $this->Trees = $this->getTableLocator()->get('Trees', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Trees);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TreesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
