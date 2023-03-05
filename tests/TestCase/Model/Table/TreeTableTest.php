<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TreeTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TreeTable Test Case
 */
class TreeTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TreeTable
     */
    protected $Tree;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Tree',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Tree') ? [] : ['className' => TreeTable::class];
        $this->Tree = $this->getTableLocator()->get('Tree', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Tree);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TreeTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
