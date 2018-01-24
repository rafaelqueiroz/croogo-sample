<?php
namespace Subscriptions\Model\Entity;

use Cake\ORM\Entity;

/**
 * Subscription Entity
 *
 * @property int $id
 * @property int $plan_id
 * @property string $name
 * @property string $email
 * @property int $status
 * @property \Cake\I18n\FrozenTime $created
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime $updated
 * @property int $updated_by
 *
 * @property \Subscriptions\Model\Entity\Plan $plan
 */
class Subscription extends Entity
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
        'plan_id' => true,
        'name' => true,
        'email' => true,
        'status' => true,
        'created' => true,
        'created_by' => true,
        'updated' => true,
        'updated_by' => true,
        'plan' => true
    ];
}
