<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * QaGoals Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\QaGoal get($primaryKey, $options = [])
 * @method \App\Model\Entity\QaGoal newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\QaGoal[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\QaGoal|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\QaGoal saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\QaGoal patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\QaGoal[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\QaGoal findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class QaGoalsTable extends Table
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

        $this->setTable('qa_goals');
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
            ->scalar('goal_title')
            ->maxLength('goal_title', 255)
            ->allowEmptyString('goal_title');

        $validator
            ->scalar('goal_details')
            ->maxLength('goal_details', 255)
            ->allowEmptyString('goal_details');

        $validator
            ->scalar('goal_progress')
            ->maxLength('goal_progress', 255)
            ->allowEmptyString('goal_progress');

        $validator
            ->scalar('goal_deadline')
            ->maxLength('goal_deadline', 255)
            ->allowEmptyString('goal_deadline');

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
