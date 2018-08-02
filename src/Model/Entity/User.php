<?php
namespace App\Model\Entity;
use Cake\Auth\DefaultPasswordHasher;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $nationality_id
 * @property string $name
 * @property bool $is_captin
 * @property int $status_id
 * @property int $role_id
 * @property string $mobile
 * @property string $password
 * @property string $profile_pic
 * @property int $rating
 * @property bool $allow_notification
 * @property string $vehicle_number
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $deleted
 *
 * @property \App\Model\Entity\Nationality $nationality
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Notification[] $notifications
 * @property \App\Model\Entity\RefreshToken[] $refresh_tokens
 * @property \App\Model\Entity\UsersDocument[] $users_documents
 * @property \App\Model\Entity\UsersWallet[] $users_wallet
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
        '*' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
    protected function _setPassword($value)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
    }
}