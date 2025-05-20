<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AgentDispute Entity
 *
 * @property int $id
 * @property int|null $emp_id
 * @property string|null $audit_reference
 * @property \Cake\I18n\FrozenDate|null $audit_collectiondate
 * @property \Cake\I18n\FrozenDate|null $audit_processdate
 * @property string|null $week
 * @property \Cake\I18n\FrozenDate|null $audit_date
 * @property string|null $overall_score
 * @property string|null $rebuttal_reason
 * @property string|null $new_score
 * @property string|null $dispute_summary
 * @property \Cake\I18n\FrozenDate|null $created
 * @property \Cake\I18n\FrozenDate|null $modified
 *
 * @property \App\Model\Entity\User $user
 */
class AgentDispute extends Entity
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
        'rebuttal_reason' => true,
        'new_score' => true,
        'dispute_summary' => true,
        'created' => true,
        'modified' => true,
        'user' => true
    ];
}
