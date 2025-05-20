<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BatAudits Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\BatAudit get($primaryKey, $options = [])
 * @method \App\Model\Entity\BatAudit newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BatAudit[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BatAudit|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BatAudit saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BatAudit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BatAudit[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BatAudit findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BatAuditsTable extends Table
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

        $this->setTable('bat_audits');
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
            ->scalar('auditor')
            ->maxLength('auditor', 255)
            ->allowEmptyString('auditor');

        $validator
            ->scalar('audit_reference')
            ->maxLength('audit_reference', 255)
            ->allowEmptyString('audit_reference');

        $validator
            ->date('audit_collectiondate')
            ->allowEmptyDate('audit_collectiondate');

        $validator
            ->date('audit_processdate')
            ->allowEmptyDate('audit_processdate');

        $validator
            ->scalar('week')
            ->maxLength('week', 255)
            ->allowEmptyString('week');

        $validator
            ->scalar('tenureship')
            ->maxLength('tenureship', 255)
            ->allowEmptyString('tenureship');

        $validator
            ->date('audit_date')
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
            ->scalar('fatal_clientinfo')
            ->maxLength('fatal_clientinfo', 255)
            ->allowEmptyString('fatal_clientinfo');

        $validator
            ->scalar('fatal_donorssn')
            ->maxLength('fatal_donorssn', 255)
            ->allowEmptyString('fatal_donorssn');

        $validator
            ->scalar('fatal_testinfo')
            ->maxLength('fatal_testinfo', 255)
            ->allowEmptyString('fatal_testinfo');

        $validator
            ->scalar('fatal_routing')
            ->maxLength('fatal_routing', 255)
            ->allowEmptyString('fatal_routing');

        $validator
            ->scalar('nonfatal_testnum')
            ->maxLength('nonfatal_testnum', 255)
            ->allowEmptyString('nonfatal_testnum');

        $validator
            ->scalar('nonfatal_doc')
            ->maxLength('nonfatal_doc', 255)
            ->allowEmptyString('nonfatal_doc');

        $validator
            ->scalar('nonfatal_donorinfo')
            ->maxLength('nonfatal_donorinfo', 255)
            ->allowEmptyString('nonfatal_donorinfo');

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
