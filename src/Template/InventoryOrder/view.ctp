<style>
table{
    text-align: left !important;
    margin:10px;
}
</style>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('View Inventory Order') ?></h1>        
    </div>
</div>
<br/>
<div class="row">   
  <div class="col-lg-12">
    <section class="panel panel-primary pos-rlt clearfix">          
        <div class="panel-body clearfix"> 
        <table class="table table-striped table-bordered table-hover">
    <tbody>
        <tr>
            <td><?= __('Client') ?></th>
            <td><?= $inventoryOrder->has('client') ? $this->Html->link($inventoryOrder->client->id, ['controller' => 'Clients', 'action' => 'view', $inventoryOrder->client->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Shipment') ?></th>
            <td><?= $inventoryOrder->has('shipment') ? $this->Html->link($inventoryOrder->shipment->id, ['controller' => 'Shipments', 'action' => 'view', $inventoryOrder->shipment->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Order Number') ?></th>
            <td><?= h($inventoryOrder->order_number) ?></td>
        </tr>
        <tr>
            <td><?= __('Shipping Carrier') ?></th>
            <td><?= $inventoryOrder->has('shipping_carrier') ? $this->Html->link($inventoryOrder->shipping_carrier->name, ['controller' => 'ShippingCarriers', 'action' => 'view', $inventoryOrder->shipping_carrier->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Shipping Service') ?></th>
            <td><?= $inventoryOrder->has('shipping_service') ? $this->Html->link($inventoryOrder->shipping_service->name, ['controller' => 'ShippingServices', 'action' => 'view', $inventoryOrder->shipping_service->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Ship Location') ?></th>
            <td><?= h($inventoryOrder->ship_location) ?></td>
        </tr>
        <tr>
            <th><?= __('Trucking') ?></th>
            <td><?= h($inventoryOrder->trucking) ?></td>
        </tr>
        <tr>
            <th><?= __('Order Status') ?></th>
            <td><?= h($inventoryOrder->order_status) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($inventoryOrder->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Order Quantity') ?></th>
            <td><?= $this->Number->format($inventoryOrder->order_quantity) ?></td>
        </tr>
        <tr>
            <th><?= __('FNSKU Label') ?></th>
            <td>
              <?php if( $inventoryOrder->fnsku_label != "" ){ ?>
              	<a href="<?php echo $inventoryOrder->fnsku_label; ?>"><i class="fa fa-file-text"></i> Download</a>                
              <?php }else{ ?>
                -
              <?php } ?>
            </td>
        </tr>
       
        <?php if($inventoryOrder->order_status <> "Completed") {?>
        <tr>
            <th><?= __('Total Remaining') ?></th>
            <td><?= $this->Number->format($inventoryOrder->total_remaining) ?></td>
        </tr>
        <?php } ?>


    <tr>
        <th><?= __('Order Destination') ?></th>
        <td><?= $this->Text->autoParagraph(h($inventoryOrder->order_destination)); ?></td>        
    </tr>
    <tr>
        <th><?= __('Combine Comment') ?></th>
        <td><?= $this->Text->autoParagraph(h($inventoryOrder->combine_comment)); ?></td>        
    </tr>
        <tr>
            <th><?= __('Order Due date') ?></th>
            <td><?= h($inventoryOrder->date_created) ?></td>
        </tr>
        <tr>
            <th><?= __('Date Created') ?></th>
            <td><?= h($inventoryOrder->date_sent) ?></td>
        </tr>
        <tr>
            <th><?= __('Date Sent') ?></th>
            <td><?= h($inventoryOrder->date_completed) ?></td>
        </tr>
    </tbody>
    </table>
    <br />
    <div class="related">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?= __('Related Inventory Order') ?></h1>        
            </div>
        </div>
        <br/>           
        <?php if (!empty($inventoryOrder->inventory_order)): ?>
        <div class="row">   
          <div class="col-lg-12">
            <section class="panel panel-primary pos-rlt clearfix">          
                <div class="panel-body clearfix">
                  <table class="table table-striped table-bordered table-hover">
                  <tbody>
                  <tr>
                      <th><?= __('Id') ?></th>
                      <th><?= __('Client Id') ?></th>
                      <th><?= __('Shipment Id') ?></th>
                      <th><?= __('Order Number') ?></th>
                      <th><?= __('Order Destination') ?></th>
                      <th><?= __('Order Quantity') ?></th>
                      <th><?= __('Date Created') ?></th>
                      <th><?= __('Shipping Carrier Id') ?></th>
                      <th><?= __('Shipping Service Id') ?></th>
                      <th><?= __('Inventory Order Id') ?></th>
                      <th><?= __('Combine Comment') ?></th>
                      <th><?= __('Order Status') ?></th>
                      <th><?= __('Date Sent') ?></th>
                      <th><?= __('Total Remaining') ?></th>
                      <th class="actions"><?= __('Actions') ?></th>
                  </tr>
                  <?php foreach ($inventoryOrder->inventory_order as $inventoryOrder): ?>
                  <tr>
                      <td><?= h($inventoryOrder->id) ?></td>
                      <td><?= h($inventoryOrder->client_id) ?></td>
                      <td><?= h($inventoryOrder->shipment_id) ?></td>
                      <td><?= h($inventoryOrder->order_number) ?></td>
                      <td><?= h($inventoryOrder->order_destination) ?></td>
                      <td><?= h($inventoryOrder->order_quantity) ?></td>
                      <td><?= h($inventoryOrder->date_created) ?></td>
                      <td><?= h($inventoryOrder->shipping_carrier_id) ?></td>
                      <td><?= h($inventoryOrder->shipping_service_id) ?></td>
                      <td><?= h($inventoryOrder->inventory_order_id) ?></td>
                      <td><?= h($inventoryOrder->combine_comment) ?></td>
                      <td><?= h($inventoryOrder->order_status) ?></td>
                      <td><?= h($inventoryOrder->date_sent) ?></td>
                      <td><?= h($inventoryOrder->total_remaining) ?></td>
                      <td class="actions">
                          <?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'InventoryOrder', 'action' => 'view', $inventoryOrder->id], ['class' => 'btn btn-info', 'escape' => false]) ?>
                          <?= $this->Html->link('<i class="fa fa-pencil"></i>', ['controller' => 'InventoryOrder', 'action' => 'edit', $inventoryOrder->id], ['class' => 'btn btn-success', 'escape' => false]) ?>
                          <?= $this->Form->postLink('<i class="fa fa-trash"></i>', ['controller' => 'InventoryOrder', 'action' => 'delete', $inventoryOrder->id], ['class' => 'btn btn-danger', 'escape' => false], ['confirm' => __('Are you sure you want to delete # {0}?', $inventoryOrder->id)]) ?>
                      </td>
                  </tr>
                  <?php endforeach; ?>      
                  </tbody>      
              </table>
                </div>
            </section>
          </div>
        </div>        
    <?php endif; ?>
        </div>
        <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <div class="action-fixed-bottom">        
        <a href="javascript:void(0);" class="btn btn-warning" onclick="history.go(-1);" ><i class="fa fa-angle-left"> </i> Back To list</a>
        </div><br>
    </div>
    </div>
    </section>
  </div>
</div>