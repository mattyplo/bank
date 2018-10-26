<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fund Entity
 *
 * @property int $fund_id
 * @property int $user_id
 * @property string $fund_index
 * @property string $fund_name
 * @property int $fund_type_id
 * @property float $interest_rate
 * @property float $fund_crnt_value
 * @property float $num_shares
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\FundType $fund_type
 */
class Fund extends Entity
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
        'user_id' => true,
        'fund_index' => true,
        'fund_name' => true,
        'fund_type_id' => true,
        'interest_rate' => true,
        'fund_crnt_value' => true,
        'num_shares' => true,
        'user' => true,
        'fund_type' => true
    ];
}
