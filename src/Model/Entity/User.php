<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate|null $emp_hiredate
 * @property string|null $emp_firstname
 * @property string|null $emp_lastname
 * @property string|null $emp_fullname
 * @property string|null $emp_email
 * @property string|null $emp_position
 * @property string|null $emp_team
 * @property string|null $emp_manager
 * @property string|null $emp_supervisor
 * @property string|null $emp_username
 * @property string|null $emp_password
 * @property string|null $employee_id
 * @property int|null $createdby_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Createdby $createdby
 */
class User extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'employee_id' => true,
        'emp_hiredate' => true,
        'emp_firstname' => true,
        'emp_lastname' => true,
        'emp_fullname' => true,
        'emp_email' => true,
        'emp_position' => true,
        'emp_team' => true,
        'emp_manager' => true,
        'emp_supervisor' => true,
        'emp_username' => true,
        'image' => true,
        'image_dir' => true,
        'password' => true,
        'createdby_id' => true,
        'created' => true,
        'modified' => true,
        'createdby' => true
    ];

     /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected function _setPassword($password)
   {
       if (strlen($password) > 0) {
           return (new DefaultPasswordHasher)->hash($password);
       }
   }

}
