<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Shipment Entity
 *
 * @property int $id
 * @property int $client_id
 * @property string $item_description
 * @property int $quantity
 * @property int $boxes
 * @property int $shipping_carrier_id
 * @property string $other_shipping_carried
 * @property int $shipping_service_id
 * @property string $other_shipping_service
 * @property string $comments
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\ShippingCarrier $shipping_carrier
 * @property \App\Model\Entity\ShippingService $shipping_service
 */class Shipment extends Entity
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
