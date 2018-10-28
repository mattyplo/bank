<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transaction Entity
 *
 * @property int $trans_id
 * @property \Cake\I18n\FrozenDate $trans_date
 * @property float $trans_amt
 * @property float $trans_share_amt
 * @property int $fund_id
 * @property int $trans_type_id
 *
 * @property \App\Model\Entity\Fund $fund
 * @property \App\Model\Entity\TransType $trans_type
 */
class Transaction extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'trans_date' => true,
        'trans_amt' => true,
        'trans_share_amt' => true,
        'fund_id' => true,
        'trans_type_id' => true,
        'fund' => true,
        'trans_type' => true
    ];
}
