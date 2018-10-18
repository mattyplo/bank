<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TransType Model
 *
 * @method \App\Model\Entity\TransType get($primaryKey, $options = [])
 * @method \App\Model\Entity\TransType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TransType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TransType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TransType|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TransType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TransType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TransType findOrCreate($search, callable $callback = null, $options = [])
 */
class TransTypeTable extends Table
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

        $this->setTable('trans_type');
        $this->setDisplayField('trans_type_id');
        $this->setPrimaryKey('trans_type_id');
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
            ->integer('trans_type_id')
            ->allowEmpty('trans_type_id', 'create');

        $validator
            ->scalar('trans_name')
            ->maxLength('trans_name', 255)
            ->requirePresence('trans_name', 'create')
            ->notEmpty('trans_name');

        return $validator;
    }
}
