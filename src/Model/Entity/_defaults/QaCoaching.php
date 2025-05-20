<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * QaCoaching Entity
 *
 * @property int $id
 * @property int|null $emp_id
 * @property string|null $coaching_month
 * @property string|null $coaching_connect
 * @property string|null $coaching_engage
 * @property string|null $coaching_check
 * @property string|null $coaching_notes
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 */
class QaCoaching extends Entity
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
        'coaching_month' => true,
        'coaching_connect' => true,
        'coaching_engage' => true,
        'coaching_check' => true,
        'coaching_notes' => true,
        'created' => true,
        'modified' => true,
        'user' => true
    ];
}
