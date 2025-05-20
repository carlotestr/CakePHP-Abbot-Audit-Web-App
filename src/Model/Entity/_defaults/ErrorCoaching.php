<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ErrorCoaching Entity
 *
 * @property int $id
 * @property int|null $emp_id
 * @property string|null $audit_reference
 * @property \Cake\I18n\FrozenDate|null $audit_collectiondate
 * @property \Cake\I18n\FrozenDate|null $audit_processdate
 * @property string|null $week
 * @property \Cake\I18n\FrozenDate|null $audit_date
 * @property string|null $overall_score
 * @property string|null $call_summary
 * @property string|null $why_one
 * @property string|null $why_two
 * @property string|null $why_three
 * @property string|null $why_four
 * @property string|null $why_five
 * @property string|null $coaching_summary
 * @property string|null $action_plan
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 */
class ErrorCoaching extends Entity
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
        'audit_reference' => true,
        'audit_collectiondate' => true,
        'audit_processdate' => true,
        'week' => true,
        'audit_date' => true,
        'overall_score' => true,
        'call_summary' => true,
        'why_one' => true,
        'why_two' => true,
        'why_three' => true,
        'why_four' => true,
        'why_five' => true,
        'coaching_summary' => true,
        'action_plan' => true,
        'created' => true,
        'modified' => true,
        'user' => true
    ];
}
