<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TransTypeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TransTypeTable Test Case
 */
class TransTypeTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TransTypeTable
     */
    public $TransType;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.trans_type'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TransType') ? [] : ['className' => TransTypeTable::class];
        $this->TransType = TableRegistry::getTableLocator()->get('TransType', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TransType);

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
