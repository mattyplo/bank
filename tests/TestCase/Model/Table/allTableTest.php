<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\allTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\allTable Test Case
 */
class allTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\allTable
     */
    public $all;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('all') ? [] : ['className' => allTable::class];
        $this->all = TableRegistry::getTableLocator()->get('all', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->all);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
