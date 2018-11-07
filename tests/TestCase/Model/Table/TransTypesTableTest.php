<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TransTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TransTypesTable Test Case
 */
class TransTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TransTypesTable
     */
    public $TransTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::getTableLocator()->exists('TransTypes') ? [] : ['className' => TransTypesTable::class];
        $this->TransTypes = TableRegistry::getTableLocator()->get('TransTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TransTypes);

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
