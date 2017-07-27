<?php
use Cake\ORM\TableRegistry;
$this->Inventory = TableRegistry::get('Inventory');
?>
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
            <td><?= $inventoryOrder->has('client') ? $this->Html->link($inventoryOrder->client->firstname." ".$inventoryOrder->client->lastname, ['controller' => 'Clients', 'action' => 'view', $inventoryOrder->client->id]) : '' ?></td>
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
            <th><?= __('FBA Shipment ID') ?></th>
            <td><?= h($inventoryOrder->fba_shipment_id) ?></td>
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
        <?php if($inventoryOrder->date_completed != null){ ?>
        <tr>
            <th><?= __('Completion Comment') ?></th>
            <td><?= $this->Text->autoParagraph(h($inventoryOrder->completion_comment)); ?></td>
        </tr>
        <?php } ?>
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
        </div>

        <?php
        if($group_id != 4 && $inventoryOrder->order_status == "Pending") {
            $inventory_info = array();
            $inventory_info = $this->Inventory->find('all')->where(['Inventory.shipment_id' => $inventoryOrder->shipment->id])->first();
        ?>
        <a href='#modalStatus-<?php echo $inventoryOrder->id; ?>' title="Update" class="btn btn-info" data-toggle="modal"><i class="fa fa-eye"></i> Update</a>

            <div id="modalStatus-<?=$inventoryOrder->id?>" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Update Confirmation</h4>
                        </div>
                        <div class="modal-body wrapper-lg">
                            <p style="font-weight:400"><?= __('Are you sure you want to update the status to Completed?') ?></p>
                            <br>
                            <p>Current Order Quantity: <?= $inventoryOrder->order_quantity; ?></p>
                            <p>Remaining Quantity After Completion: <?= $inventory_info->remaining_quantity - $inventoryOrder->order_quantity; ?></p>
                            <form   id="inventory-order-<?php echo $inventoryOrder->id; ?>" method="post" action="<?= $base_url; ?>inventory_order/update_status_to_complete/<?php echo $inventoryOrder->id; ?>/<?php echo $inventory_info->id; ?>" >

                                <p>Confirm Shipping Location: <input type="checkbox" name="confirm_ship_location" class="confirm_ship_location" value="1" /></p>
                                <p>
                                    <input type="text" name="ship_location" value="<?= $inventoryOrder->ship_location ?>" disabled />
                                </p>

                                <p>Confirm Trucking: <input type="checkbox" name="confirm_trucking" class="confirm_trucking" value="1" /></p>
                                <p>
                                    <input type="text" name="trucking" value="<?= $inventoryOrder->trucking ?>" disabled />
                                </p>

                                <?php  if($inventory_info->remaining_quantity == $inventoryOrder->order_quantity) { ?>

                                    <p> <label><input id="send_to_client" name="send_to_client" type="checkbox" value="yes" /> Send to client?</label> </p>
                                    <p> <textarea id="completion_comment" name="completion_comment" cols="50" rows="2" placeholder="Completion Comment"></textarea></p>

                                <?php }else{ ?>
                                    <p> <textarea id="completion_comment" name="completion_comment" cols="50" rows="2" placeholder="Completion Comment"></textarea></p>
                                <?php } ?>
                        </div>


                        <div class="modal-footer">

                            <button type="button" data-dismiss="modal" class="btn btn-default">No</button>
                            <button type="submit" class="btn btn-primary">Yes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
    </div>
    </section>
  </div>
</div>

<script>
    $('.confirm_trucking').change(function () {
        if($(this).is(":checked")){
            $(this).parent().parent().find('[name="trucking"]').prop("disabled", false);
        }else{
            $(this).parent().parent().find('[name="trucking"]').prop("disabled", true);
        }
    });

    $('.confirm_ship_location').change(function () {
        if($(this).is(":checked")){
            $(this).parent().parent().find('[name="ship_location"]').prop("disabled", false);
        }else{
            $(this).parent().parent().find('[name="ship_location"]').prop("disabled", true);
        }
    });
</script>