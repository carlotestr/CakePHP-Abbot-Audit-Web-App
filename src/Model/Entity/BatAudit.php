<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BatAudit Entity
 *
 * @property int $id
 * @property int|null $emp_id
 * @property string|null $auditor
 * @property string|null $audit_reference
 * @property \Cake\I18n\FrozenDate|null $audit_collectiondate
 * @property \Cake\I18n\FrozenDate|null $audit_processdate
 * @property string|null $week
 * @property string|null $tenureship
 * @property \Cake\I18n\FrozenDate|null $audit_date
 * @property string|null $audit_time
 * @property string|null $audit_count
 * @property string|null $fatal_score
 * @property string|null $nonfatal_score
 * @property string|null $overall_score
 * @property string|null $rft
 * @property string|null $fatal_clientinfo
 * @property string|null $fatal_donorssn
 * @property string|null $fatal_testinfo
 * @property string|null $fatal_routing
 * @property string|null $nonfatal_testnum
 * @property string|null $nonfatal_doc
 * @property string|null $nonfatal_donorinfo
 * @property string|null $call_summary
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 */
class BatAudit extends Entity
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
        'auditor' => true,
        'audit_reference' => true,
        'audit_collectiondate' => true,
        'audit_processdate' => true,
        'week' => true,
        'tenureship' => true,
        'audit_date' => true,
        'audit_time' => true,
        'audit_count' => true,
        'fatal_score' => true,
        'nonfatal_score' => true,
        'overall_score' => true,
        'rft' => true,
        'fatal_clientinfo' => true,
        'fatal_donorssn' => true,
        'fatal_testinfo' => true,
        'fatal_routing' => true,
        'nonfatal_testnum' => true,
        'nonfatal_doc' => true,
        'nonfatal_donorinfo' => true,
        'call_summary' => true,
        'created' => true,
        'modified' => true,
        'user' => true
    ];
}
