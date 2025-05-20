<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ErrorCoachings Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\ErrorCoaching get($primaryKey, $options = [])
 * @method \App\Model\Entity\ErrorCoaching newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ErrorCoaching[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ErrorCoaching|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ErrorCoaching saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ErrorCoaching patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ErrorCoaching[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ErrorCoaching findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ErrorCoachingsTable extends Table
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

        $this->setTable('error_coachings');
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
            ->scalar('audit_reference')
            ->maxLength('audit_reference', 255)
            ->allowEmptyString('audit_reference');

        $validator
            ->scalar('audit_collectiondate')
            ->allowEmptyDate('audit_collectiondate');

        $validator
            ->scalar('audit_processdate')
            ->allowEmptyDate('audit_processdate');

        $validator
            ->scalar('week')
            ->maxLength('week', 255)
            ->allowEmptyString('week');

        $validator
            ->scalar('audit_date')
            ->allowEmptyDate('audit_date');

        $validator
            ->scalar('overall_score')
            ->maxLength('overall_score', 255)
            ->allowEmptyString('overall_score');

        $validator
            ->scalar('call_summary')
            ->maxLength('call_summary', 255)
            ->allowEmptyString('call_summary');

        $validator
            ->scalar('why_one')
            ->maxLength('why_one', 255)
            ->allowEmptyString('why_one');

        $validator
            ->scalar('why_two')
            ->maxLength('why_two', 255)
            ->allowEmptyString('why_two');

        $validator
            ->scalar('why_three')
            ->maxLength('why_three', 255)
            ->allowEmptyString('why_three');

        $validator
            ->scalar('why_four')
            ->maxLength('why_four', 255)
            ->allowEmptyString('why_four');

        $validator
            ->scalar('why_five')
            ->maxLength('why_five', 255)
            ->allowEmptyString('why_five');

        $validator
            ->scalar('coaching_summary')
            ->maxLength('coaching_summary', 255)
            ->allowEmptyString('coaching_summary');

        $validator
            ->scalar('action_plan')
            ->maxLength('action_plan', 255)
            ->allowEmptyString('action_plan');

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
