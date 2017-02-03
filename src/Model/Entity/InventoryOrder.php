<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InventoryOrder Entity
 *
 * @property int $id
 * @property int $client_id
 * @property int $shipment_id
 * @property string $order_number
 * @property string $order_destination
 * @property float $order_quantity
 * @property \Cake\I18n\Time $date_created
 * @property int $shipping_carrier_id
 * @property int $shipping_service_id
 * @property int $inventory_order_id
 * @property string $combine_comment
 * @property string $order_status
 * @property \Cake\I18n\Time $date_sent
 * @property float $total_remaining
 *
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\Shipment $shipment
 * @property \App\Model\Entity\ShippingCarrier $shipping_carrier
 * @property \App\Model\Entity\ShippingService $shipping_service
 * @property \App\Model\Entity\InventoryOrder[] $inventory_order
 */class InventoryOrder extends Entity
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
