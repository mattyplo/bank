<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Transactions Model
 *
 * @property \App\Model\Table\FundsTable|\Cake\ORM\Association\BelongsTo $Funds
 * @property \App\Model\Table\TransTypesTable|\Cake\ORM\Association\BelongsTo $TransTypes
 *
 * @method \App\Model\Entity\Transaction get($primaryKey, $options = [])
 * @method \App\Model\Entity\Transaction newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Transaction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Transaction|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Transaction|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Transaction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Transaction[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Transaction findOrCreate($search, callable $callback = null, $options = [])
 */
class TransactionsTable extends Table
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

        $this->setTable('transactions');
        $this->setDisplayField('trans_id');
        $this->setPrimaryKey('trans_id');

        $this->belongsTo('Funds', [
            'foreignKey' => 'fund_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('TransTypes', [
            'foreignKey' => 'trans_type_id',
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
            ->integer('trans_id')
            ->allowEmpty('trans_id', 'create');

        $validator
            ->date('trans_date')
            ->requirePresence('trans_date', 'create')
            ->notEmpty('trans_date');

        $validator
            ->decimal('trans_amt')
            ->requirePresence('trans_amt', 'create')
            ->notEmpty('trans_amt');

        $validator
            ->decimal('trans_num_shares')
            ->requirePresence('trans_num_shares', 'create')
            ->notEmpty('trans_num_shares');

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
        $rules->add($rules->existsIn(['fund_id'], 'Funds'));
        $rules->add($rules->existsIn(['trans_type_id'], 'TransTypes'));

        return $rules;
    }
}
