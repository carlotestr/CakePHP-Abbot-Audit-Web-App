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
        $this->setDisplayField('emp_email');
        $this->setPrimaryKey('id');
        $this->addBehavior('Search.Search');
        $this->addBehavior('Timestamp');

        $this->addBehavior('Proffer.Proffer', [
          'image' => [    // The name of your upload field
          'root' => WWW_ROOT . 'files', // Customise the root upload folder here, or omit to use the default
          'dir' => 'image_dir',   // The name of the field to store the folder
                'thumbnailSizes' => [ // Declare your thumbnails
                    'square' => [   // Define the prefix of your thumbnail
                        'w' => 960, // Width
                        'h' => 639, // Height
                        'jpeg_quality'  => 100
                    ],
                    'portrait' => [     // Define a second thumbnail
                        'w' => 600,
                        'h' => 454
                    ],
                ],
                'thumbnailMethod' => 'gd'   // Options are Imagick or Gd
            ]

        ]);


        $this->belongsTo('Users', [
            'foreignKey' => 'createdby_id'
        ]);
    }        

    public function searchManager()
    {
        $searchManager = $this->behaviors()->Search->searchManager();
        $searchManager

            ->add('keyword', 'Search.Like', [
                'before' => true,
                'after' => true,
                'filterEmpty' => true,
                'mode' => 'or',
                'comparison' => 'LIKE',
                'wildcardAny' => '*',
                'wildcardOne' => '?',
                'field' => ['emp_firstname', 'emp_lastname','emp_fullname','emp_email','emp_position']
            ]);

        return $searchManager;
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
            ->scalar('employee_id')
            ->allowEmptyString('employee_id');

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
            ->scalar('password')
            ->maxLength('password', 255)
            ->allowEmptyString('password');

        $validator
            ->allowEmpty('image');

        $validator
            ->allowEmpty('image_dir');

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
