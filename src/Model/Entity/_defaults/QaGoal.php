<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * QaGoal Entity
 *
 * @property int $id
 * @property int|null $emp_id
 * @property string|null $goal_title
 * @property string|null $goal_details
 * @property string|null $goal_progress
 * @property string|null $goal_deadline
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 */
class QaGoal extends Entity
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
        'emp_id' => true,
        'goal_title' => true,
        'goal_details' => true,
        'goal_progress' => true,
        'goal_deadline' => true,
        'created' => true,
        'modified' => true,
        'user' => true
    ];
}
