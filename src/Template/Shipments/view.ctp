<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('View Shipment') ?></h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> <?= __('Shipments') ?>
            </li>
            <li class="active">
                <i class="fa fa-eye"></i> <?= __('View') ?>
            </li>
        </ol>       
    </div>
</div>

<section class="content">   
    <table class="table table-striped table-bordered table-hover">
    <tbody>
        <tr>
            <td><?= __('Shipping Carrier') ?></th>
            <td><?= $shipment->has('shipping_carrier') ? $this->Html->link($shipment->shipping_carrier->name, ['controller' => 'ShippingCarriers', 'action' => 'view', $shipment->shipping_carrier->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Shipping Service') ?></th>
            <td><?= $shipment->has('shipping_service') ? $this->Html->link($shipment->shipping_service->name, ['controller' => 'ShippingServices', 'action' => 'view', $shipment->shipping_service->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($shipment->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Client Id') ?></th>
            <td><?= $this->Number->format($shipment->client_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($shipment->quantity) ?></td>
        </tr>
        <tr>
            <th><?= __('Boxes') ?></th>
            <td><?= $this->Number->format($shipment->boxes) ?></td>
        </tr>
    <tr>
        <th><?= __('Item Description') ?></th>
        <td><?= $this->Text->autoParagraph(h($shipment->item_description)); ?></td>        
    </tr>
    <tr>
        <th><?= __('Other Shipping Carried') ?></th>
        <td><?= $this->Text->autoParagraph(h($shipment->other_shipping_carried)); ?></td>        
    </tr>
    <tr>
        <th><?= __('Other Shipping Service') ?></th>
        <td><?= $this->Text->autoParagraph(h($shipment->other_shipping_service)); ?></td>        
    </tr>
    <tr>
        <th><?= __('Comments') ?></th>
        <td><?= $this->Text->autoParagraph(h($shipment->comments)); ?></td>        
    </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($shipment->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($shipment->modified) ?></td>
        </tr>
    </tbody>
    </table>

    <div class="form-group" style="margin-top: 80px;">
    <div class="col-sm-offset-2 col-sm-10">
        <div class="action-fixed-bottom">        
        <a href="javascript:void(0);" class="btn btn-warning" onclick="history.go(-1);" ><i class="fa fa-angle-left"> </i> Back To list</a>
        </div><br>
    </div>
    </div>
</section>
