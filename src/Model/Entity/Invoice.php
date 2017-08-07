<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Invoice Entity
 *
 * @property int $id
 * @property int $shipments_id
 * @property int $inventory_order_id
 * @property int $clients_id
 * @property string $billing_address
 * @property string $terms
 * @property \Cake\I18n\Time $invoice_date
 * @property \Cake\I18n\Time $due_date
 * @property string $product_services
 * @property string $description
 * @property float $quantity
 * @property float $rate
 * @property float $balance_due
 * @property \Cake\I18n\Time $date_created
 *
 * @property \App\Model\Entity\Shipment $shipment
 * @property \App\Model\Entity\InventoryOrder $inventoryOrder
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\InvoiceDetail[] $invoice_details
 */class Invoice extends Entity
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
