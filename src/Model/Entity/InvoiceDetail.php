<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InvoiceDetail Entity
 *
 * @property int $id
 * @property int $invoice_id
 * @property string $product_service
 * @property string $description
 * @property float $quantity
 * @property float $rate
 * @property float $amount
 * @property \Cake\I18n\Time $date_created
 *
 * @property \App\Model\Entity\Invoice $invoice
 */class InvoiceDetail extends Entity
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
