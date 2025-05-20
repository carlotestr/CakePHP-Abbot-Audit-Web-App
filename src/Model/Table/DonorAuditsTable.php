<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DonorAudits Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\DonorAudit get($primaryKey, $options = [])
 * @method \App\Model\Entity\DonorAudit newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DonorAudit[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DonorAudit|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DonorAudit saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DonorAudit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DonorAudit[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DonorAudit findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DonorAuditsTable extends Table
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

        $this->setTable('donor_audits');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
         $this->addBehavior('Search.Search');
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
            ->scalar('auditor')
            ->maxLength('auditor', 255)
            ->allowEmptyString('auditor');

        $validator
            ->scalar('audit_reference')
            ->maxLength('audit_reference', 255)
            ->allowEmptyString('audit_reference');

        $validator
            ->scalar('audit_collectiondate')
            ->maxLength('audit_collectiondate', 255)
            ->allowEmptyString('audit_collectiondate');

        $validator
            ->scalar('audit_processdate')
            ->maxLength('audit_processdate', 255)
            ->allowEmptyString('audit_processdate');

        $validator
            ->scalar('week')
            ->maxLength('week', 255)
            ->allowEmptyString('week');

        $validator
            ->scalar('tenureship')
            ->maxLength('tenureship', 255)
            ->allowEmptyString('tenureship');

        $validator
            ->scalar('audit_date')
            ->allowEmptyDate('audit_date');

        $validator
            ->scalar('audit_time')
            ->maxLength('audit_time', 255)
            ->allowEmptyString('audit_time');

        $validator
            ->scalar('audit_count')
            ->maxLength('audit_count', 255)
            ->allowEmptyString('audit_count');

        $validator
            ->scalar('fatal_score')
            ->maxLength('fatal_score', 255)
            ->allowEmptyString('fatal_score');

        $validator
            ->scalar('nonfatal_score')
            ->maxLength('nonfatal_score', 255)
            ->allowEmptyString('nonfatal_score');

        $validator
            ->scalar('overall_score')
            ->maxLength('overall_score', 255)
            ->allowEmptyString('overall_score');

        $validator
            ->scalar('rft')
            ->maxLength('rft', 255)
            ->allowEmptyString('rft');

        $validator
            ->scalar('fatal_hipaa')
            ->maxLength('fatal_hipaa', 255)
            ->allowEmptyString('fatal_hipaa');

        $validator
            ->scalar('nonfatal_greeting')
            ->maxLength('nonfatal_greeting', 255)
            ->allowEmptyString('nonfatal_greeting');

        $validator
            ->scalar('nonfatal_purpose')
            ->maxLength('nonfatal_purpose', 255)
            ->allowEmptyString('nonfatal_purpose');

        $validator
            ->scalar('nonfatal_callproper')
            ->maxLength('nonfatal_callproper', 255)
            ->allowEmptyString('nonfatal_callproper');

        $validator
            ->scalar('nonfatal_updateacc')
            ->maxLength('nonfatal_updateacc', 255)
            ->allowEmptyString('nonfatal_updateacc');

        $validator
            ->scalar('nonfatal_doc')
            ->maxLength('nonfatal_doc', 255)
            ->allowEmptyString('nonfatal_doc');

        $validator
            ->scalar('nonfatal_log')
            ->maxLength('nonfatal_log', 255)
            ->allowEmptyString('nonfatal_log');

        $validator
            ->scalar('nonfatal_handling')
            ->maxLength('nonfatal_handling', 255)
            ->allowEmptyString('nonfatal_handling');

        $validator
            ->scalar('call_summary')
            ->maxLength('call_summary', 255)
            ->allowEmptyString('call_summary');

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
