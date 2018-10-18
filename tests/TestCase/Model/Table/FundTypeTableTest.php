<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FundTypeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FundTypeTable Test Case
 */
class FundTypeTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FundTypeTable
     */
    public $FundType;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.fund_type'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('FundType') ? [] : ['className' => FundTypeTable::class];
        $this->FundType = TableRegistry::getTableLocator()->get('FundType', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FundType);

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
}
