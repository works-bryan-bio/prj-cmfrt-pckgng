<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MessageDetail Entity
 *
 * @property int $id
 * @property int $message_id
 * @property int $user_id
 * @property int $user_group
 * @property string $message_details
 * @property \Cake\I18n\Time $date_created
 *
 * @property \App\Model\Entity\MessageHeader $message_header
 * @property \App\Model\Entity\User $user
 */class MessageDetail extends Entity
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
        'id' => false
    ];
}
