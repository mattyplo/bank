<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FundTypes Model
 *
 * @method \App\Model\Entity\FundType get($primaryKey, $options = [])
 * @method \App\Model\Entity\FundType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FundType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FundType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FundType|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FundType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FundType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FundType findOrCreate($search, callable $callback = null, $options = [])
 */
class FundTypesTable extends Table
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

        $this->setTable('fund_types');
        $this->setDisplayField('fund_type_id');
        $this->setPrimaryKey('fund_type_id');
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
            ->integer('fund_type_id')
            ->allowEmpty('fund_type_id', 'create');

        $validator
            ->scalar('fund_type')
            ->maxLength('fund_type', 255)
            ->requirePresence('fund_type', 'create')
            ->notEmpty('fund_type');

        return $validator;
    }
}
