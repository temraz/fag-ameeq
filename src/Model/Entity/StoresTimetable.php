<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StoresTimetable Entity
 *
 * @property int $id
 * @property int $store_id
 * @property int $day_id
 * @property \Cake\I18n\FrozenTime $open
 * @property \Cake\I18n\FrozenTime $closed
 *
 * @property \App\Model\Entity\Store $store
 * @property \App\Model\Entity\Day $day
 */
class StoresTimetable extends Entity
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
        '*' => true
    ];
}
