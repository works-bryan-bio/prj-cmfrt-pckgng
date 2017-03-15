<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MessageHeader Entity
 *
 * @property int $id
 * @property int $client_id
 * @property string $message_subject
 * @property \Cake\I18n\Time $date_created
 *
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\MessageDetail[] $message_details
 */class MessageHeader extends Entity
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
