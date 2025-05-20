<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AgentDisputes Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\AgentDispute get($primaryKey, $options = [])
 * @method \App\Model\Entity\AgentDispute newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AgentDispute[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AgentDispute|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AgentDispute saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AgentDispute patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AgentDispute[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AgentDispute findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AgentDisputesTable extends Table
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

        $this->setTable('agent_disputes');
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
            ->scalar('rebuttal_reason')
            ->maxLength('rebuttal_reason', 255)
            ->allowEmptyString('rebuttal_reason');

        $validator
            ->scalar('new_score')
            ->maxLength('new_score', 255)
            ->allowEmptyString('new_score');

        $validator
            ->scalar('dispute_summary')
            ->maxLength('dispute_summary', 255)
            ->allowEmptyString('dispute_summary');

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
