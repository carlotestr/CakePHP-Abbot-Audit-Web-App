<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * QaCoachings Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\QaCoaching get($primaryKey, $options = [])
 * @method \App\Model\Entity\QaCoaching newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\QaCoaching[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\QaCoaching|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\QaCoaching saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\QaCoaching patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\QaCoaching[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\QaCoaching findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class QaCoachingsTable extends Table
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

        $this->setTable('qa_coachings');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'emp_id'
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
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('coaching_month')
            ->maxLength('coaching_month', 255)
            ->allowEmptyString('coaching_month');

        $validator
            ->scalar('coaching_connect')
            ->maxLength('coaching_connect', 255)
            ->allowEmptyString('coaching_connect');

        $validator
            ->scalar('coaching_engage')
            ->maxLength('coaching_engage', 255)
            ->allowEmptyString('coaching_engage');

        $validator
            ->scalar('coaching_check')
            ->maxLength('coaching_check', 255)
            ->allowEmptyString('coaching_check');

        $validator
            ->scalar('coaching_notes')
            ->maxLength('coaching_notes', 16777215)
            ->allowEmptyString('coaching_notes');

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
        $rules->add($rules->existsIn(['emp_id'], 'Users'));

        return $rules;
    }
}
