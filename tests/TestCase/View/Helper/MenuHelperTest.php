<?php
declare(strict_types=1);

namespace App\Test\TestCase\View\Helper;

use App\View\Helper\MenuHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\MenuHelper Test Case
 */
class MenuHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\View\Helper\MenuHelper
     */
    protected $Menu;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $view = new View();
        $this->Menu = new MenuHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Menu);

        parent::tearDown();
    }
}
