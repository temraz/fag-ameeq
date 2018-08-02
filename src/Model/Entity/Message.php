<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Message Entity
 *
 * @property int $id
 * @property int $request_id
 * @property string $body
 * @property int $sender_id
 * @property int $parent_id
 * @property int $attachment_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $deleted
 *
 * @property \App\Model\Entity\Request $request
 * @property \App\Model\Entity\Sender $sender
 * @property \App\Model\Entity\ParentMessage $parent_message
 * @property \App\Model\Entity\Attachment $attachment
 * @property \App\Model\Entity\ChildMessage[] $child_messages
 * @property \App\Model\Entity\MessagesRecipient[] $messages_recipients
 */
class Message extends Entity
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
