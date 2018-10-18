<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fund Model
 *
 * @property \App\Model\Table\UserTable|\Cake\ORM\Association\BelongsTo $User
 * @property \App\Model\Table\FundTypeTable|\Cake\ORM\Association\BelongsTo $FundType
 *
 * @method \App\Model\Entity\Fund get($primaryKey, $options = [])
 * @method \App\Model\Entity\Fund newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Fund[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fund|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fund|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fund patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Fund[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fund findOrCreate($search, callable $callback = null, $options = [])
 */
class FundTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('fund');
        $this->setDisplayField('fund_id');
        $this->setPrimaryKey('fund_id');

        $this->belongsTo('User', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('FundType', [
            'foreignKey' => 'fund_type_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('fund_id')
            ->allowEmpty('fund_id', 'create');

        $validator
            ->scalar('fund_index')
            ->maxLength('fund_index', 255)
            ->requirePresence('fund_index', 'create')
            ->notEmpty('fund_index');

        $validator
            ->scalar('fund_name')
            ->maxLength('fund_name', 255)
            ->requirePresence('fund_name', 'create')
            ->notEmpty('fund_name');

        $validator
            ->decimal('interest_rate')
            ->allowEmpty('interest_rate');

        $validator
            ->decimal('fund_crnt_value')
            ->allowEmpty('fund_crnt_value');

        $validator
            ->decimal('num_shares')
            ->allowEmpty('num_shares');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'User'));
        $rules->add($rules->existsIn(['fund_type_id'], 'FundType'));

        return $rules;
    }
}
