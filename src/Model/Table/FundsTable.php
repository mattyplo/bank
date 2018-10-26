<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Utility\Text;

/**
 * Funds Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\FundTypesTable|\Cake\ORM\Association\BelongsTo $FundTypes
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
class FundsTable extends Table
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

        $this->setTable('funds');
        $this->setDisplayField('fund_id');
        $this->setPrimaryKey('fund_id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('FundTypes', [
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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['fund_type_id'], 'FundTypes'));

        return $rules;
    }
    
    public function beforeSave($event, $entity, $options)
    {
        if($entity->isNew() && !$entity->slug) {
            $sluggedTitle = Text::slug($entity->title);
            $entity->slug = substr($sluggedTitle, 0, 191);
        }
    }
}
