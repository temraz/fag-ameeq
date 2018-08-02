<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Invoice Entity
 *
 * @property int $id
 * @property int $attachment_id
 * @property int $order_id
 * @property int $client_user_id
 * @property int $captain_user_id
 * @property float $delivery_cost
 * @property float $purchases_price
 * @property float $total_cost
 * @property bool $accepted
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Attachment $attachment
 * @property \App\Model\Entity\Order $order
 * @property \App\Model\Entity\ClientUser $client_user
 * @property \App\Model\Entity\CaptainUser $captain_user
 */
class Invoice extends Entity
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
        '*' => true,
    ];
}
