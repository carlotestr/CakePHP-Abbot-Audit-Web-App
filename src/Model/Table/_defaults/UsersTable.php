<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\CreatedbiesTable|\Cake\ORM\Association\BelongsTo $Createdbies
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'createdby_id'
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
            ->date('emp_hiredate')
            ->allowEmptyDate('emp_hiredate');

        $validator
            ->scalar('emp_firstname')
            ->maxLength('emp_firstname', 255)
            ->allowEmptyString('emp_firstname');

        $validator
            ->scalar('emp_lastname')
            ->maxLength('emp_lastname', 255)
            ->allowEmptyString('emp_lastname');

        $validator
            ->scalar('emp_fullname')
            ->maxLength('emp_fullname', 255)
            ->allowEmptyString('emp_fullname');

        $validator
            ->scalar('emp_email')
            ->maxLength('emp_email', 255)
            ->allowEmptyString('emp_email');

        $validator
            ->scalar('emp_position')
            ->maxLength('emp_position', 255)
            ->allowEmptyString('emp_position');

        $validator
            ->scalar('emp_team')
            ->maxLength('emp_team', 255)
            ->allowEmptyString('emp_team');

        $validator
            ->scalar('emp_manager')
            ->maxLength('emp_manager', 255)
            ->allowEmptyString('emp_manager');

        $validator
            ->scalar('emp_supervisor')
            ->maxLength('emp_supervisor', 255)
            ->allowEmptyString('emp_supervisor');

        $validator
            ->scalar('emp_username')
            ->maxLength('emp_username', 255)
            ->allowEmptyString('emp_username');

        $validator
            ->scalar('emp_password')
            ->maxLength('emp_password', 255)
            ->allowEmptyString('emp_password');

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
        $rules->add($rules->existsIn(['createdby_id'], 'Users'));

        return $rules;
    }
}
