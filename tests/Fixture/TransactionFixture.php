<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TransactionFixture
 *
 */
class TransactionFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'transaction';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'trans_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'trans_date' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'trans_amt' => ['type' => 'decimal', 'length' => 10, 'precision' => 0, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'trans_share_amt' => ['type' => 'decimal', 'length' => 10, 'precision' => 0, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'fund_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'trans_type_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fund' => ['type' => 'index', 'columns' => ['fund_id'], 'length' => []],
            'trans_type_id' => ['type' => 'index', 'columns' => ['trans_type_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['trans_id'], 'length' => []],
            'FK_fund_id' => ['type' => 'foreign', 'columns' => ['fund_id'], 'references' => ['fund', 'fund_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'FK_trans_type_id' => ['type' => 'foreign', 'columns' => ['trans_type_id'], 'references' => ['trans_type', 'trans_type_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'trans_id' => 1,
                'trans_date' => '2018-10-18',
                'trans_amt' => 1.5,
                'trans_share_amt' => 1.5,
                'fund_id' => 1,
                'trans_type_id' => 1
            ],
        ];
        parent::init();
    }
}
