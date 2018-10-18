<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TransactionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TransactionTable Test Case
 */
class TransactionTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TransactionTable
     */
    public $Transaction;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.transaction',
        'app.funds',
        'app.trans_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Transaction') ? [] : ['className' => TransactionTable::class];
        $this->Transaction = TableRegistry::getTableLocator()->get('Transaction', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Transaction);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
