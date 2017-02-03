<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EndUserOrder Entity
 *
 * @property int $id
 * @property int $client_id
 * @property string $name
 * @property string $address
 * @property int $shipping_service_id
 * @property string $comments
 *
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\ShippingService $shipping_service
 */class EndUserOrder extends Entity
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
