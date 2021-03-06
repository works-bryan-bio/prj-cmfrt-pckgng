<?php
use Cake\ORM\TableRegistry;
$this->Shipments = TableRegistry::get('Shipments');
$this->InventoryOrder = TableRegistry::get('InventoryOrder');
$this->Inventory = TableRegistry::get('Inventory');
?>
<style>
.datepicker { z-index: 10000 !important;}
.list-icon .col-md-1{
  padding: 0px;
}
.list-icon div{
    margin-right:42px;
}
.list-icon .btn-sm{
    padding:5px 0px;
    width:61px !important;
    margin-right: 42px;
    display: block;
}
.table-actions .btn{
  width:159px;
}
hr{
  margin-top:5px;
  margin-bottom: 5px;
}
</style>
<div class="row">
    <div class="col-lg-12 mt-80" style="">
        <div class="dropdown pull-right" style="margin:-20px 14px 0 0">
            <button class="btn btn-primary dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                Action <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">        
                <li role="presentation"><?= $this->Html->link('<i class="fa fa-plus"></i> ' . __('New Inventory'), ['action' => 'add'], ['escape' => false]) ?></li>
                        <li role="presentation"><?= $this->Html->link('<i class="fa fa-list-alt"></i> ' . __('List Shipments'), ['controller' => 'Shipments', 'action' => 'index'], ['escape' => false]) ?></li>
                <li role="presentation"><?= $this->Html->link('<i class="fa fa-plus"></i> ' . __('New Shipment'), ['controller' => 'Shipments', 'action' => 'add'], ['escape' => false]) ?></li>
                    </ul>
        </div>
        <h1 class="page-header"><?= __('Inventory') ?></h1>
       <div class="modal-body wrapper-lg">
          <label class="col-sm-2 control-label"> Order overdue date: <span class="number-of-order-due label label-danger"></span></label>
       </div>
    </div>
</div>
<div id="send-new-order-container" class="send-new-order-container" style="display:none;"><?php include("accordion_add.ctp"); ?></div>
  <div class="ribbon-section">
      <div class="ribbon-black" style="padding-top:0px !important;">
          <ul class="nav nav-tabs nav-justified">
            <li class="active"><a href="#pending_orders" class="ribbon-li" data-toggle="tab">View Pending Orders</a></li>
            <li><a href="#pending" class="ribbon-li" data-toggle="tab">Stored Shipments</a></li>
            <li><a href="#completed" data-toggle="tab" class="ribbon-li">Completed Orders</a></li>
            <li><a href="#cancelled" data-toggle="tab" class="ribbon-li"><i class="fa fa-ban"></i></a></li>     
          </ul>
      </div>
</div>
    <br style="clear:both;" />  
<section class="panel panel-default">
  <div class="panel-body">
    <div class="tab-content">
      <div class="tab-pane active" id="pending_orders">
          <div class="table-responsive data-content">    
            <table class="zero-config-datatable-5-desc display">
                <thead>
                    <tr class="heading">
                      <th style="text-align:center;">Actions</th>
                      <th class="data-id">Order ID</th>
                      <th class="">Client</th>
                      <th class="">Item Description</th>
                      <th class="">Order Destination</th>
                      <th class="">Order to be sent</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($inventory_order as $inventory_order):
                          $inventory_info = array();
                          $inventory_info = $this->Inventory->find('all')->where(['Inventory.shipment_id' => $inventory_order->shipment->id])->first();
                      ?>
                    <tr>
                      <td class="no-border-right table-actions">

                            <div class="dropdown">
                              <button class="btn btn-primary dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                                  Action <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">      
                                  <?php if($group_id != 4) { ?>
                                    <li role="presentation"><?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('Update Status'), '#modalStatus-'. $inventory_order->id,['title' => 'Update Status', 'data-toggle' => 'modal','escape' => false]) ?></li>
                                   
                                  <?php } ?>

                                  <li role="presentation"><?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('View Orders'), ['controller' => 'inventory_order' , 'action' => 'view', $inventory_order->id],['title' => 'View', 'escape' => false]) ?></li>                       
                                  <li role="presentation"><?= $this->Html->link('<i class="fa fa-trash-o"></i> ' . __('Delete'), '#modal-'. $inventory_order->id,['title' => 'Delete', 'data-toggle' => 'modal','escape' => false]) ?></li>
                                  <li role="presentation"><?= $this->Html->link('<i class="fa fa-ban"></i> ' . __('Cancel Order'), '#modalCancel-'.$inventoryOrder->id,['title' => 'Cancel', 'escape' => false, 'data-toggle' => 'modal']) ?>      </li> 
                              </ul>
                            </div>

                            <div id="modalCancel-<?=$inventoryOrder->id?>" class="modal fade">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                      <h4 class="modal-title">Cancel Order</h4>
                                  </div>
                                  <div class="modal-body wrapper-lg">
                                      <p><?= __('Are you sure you want to cancel selected entry?') ?></p>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" data-dismiss="modal" class="btn btn-default">No</button>
                                      <?= $this->Form->postLink(
                                              'Yes',
                                              ['controller' => 'inventory_order', 'action' => 'cancel', $inventory_order->id],
                                              ['class' => 'btn btn-danger', 'escape' => false]
                                          )
                                      ?>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <!-- Delete Modal -->
                            <div id="modal-<?=$inventory_order->id?>" class="modal fade">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                      <h4 class="modal-title">Delete Confirmation</h4>
                                  </div>
                                  <div class="modal-body wrapper-lg">
                                      <p><?= __('Are you sure you want to delete selected entry?') ?></p>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" data-dismiss="modal" class="btn btn-default">No</button>
                                      <?= $this->Form->postLink(
                                              'Yes',
                                              ['controller' => 'inventory_order' ,'action' => 'delete', $inventory_order->id],
                                              ['class' => 'btn btn-danger', 'escape' => false]
                                          )
                                      ?>
                                  </div>
                                </div>
                              </div>
                            </div>

                         <?php if($group_id != 4) { ?>
                             <div id="modalStatus-<?=$inventory_order->id?>" class="modal fade">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title">Update Confirmation</h4>
                                    </div>
                                    <div class="modal-body wrapper-lg">
                                        <p style="font-weight:400"><?= __('Are you sure you want to update the status to Completed?') ?></p>
                                        <br>
                                        <p>Current Order Quantity: <?= $inventory_order->order_quantity; ?></p> 
                                        <p>Remaining Quantity After Completion: <?= $inventory_info->remaining_quantity - $inventory_order->order_quantity; ?></p>
                                         <form   id="inventory-order-<?php echo $inventory_order->id; ?>" method="post" action="<?= $base_url; ?>inventory_order/update_status_to_complete/<?php echo $inventory_order->id; ?>/<?php echo $inventory_info->id; ?>" >

					     <p>Confirm Shipping Location: <input type="checkbox" name="confirm_shipping_location" class="confirm_shipping_location" value="1" /></p>
                                             <p>
                                                 <input type="text" name="shipping_location" value="<?= $inventory_order->ship_location ?>" disabled />
                                             </p>

                                             <p>Confirm Trucking: <input type="checkbox" name="confirm_trucking" class="confirm_trucking" value="1" /></p>
                                             <p>
                                                 <input type="text" name="trucking" value="<?= $inventory_order->trucking ?>" disabled />
                                             </p>
					     
                                        <?php  if($inventory_info->remaining_quantity <= $inventory_order->order_quantity) { ?>
                                           

                                        <?php  if($inventory_info->remaining_quantity <= $inventory_order->order_quantity) { ?>       
                                         <span style="font-weight:40; color:#ff0000;" > Note: only the remaining quantity will be sent on the order. </span>                                    
                                        <?php } ?>  

                                        <p> <label><input id="send_to_client" name="send_to_client" type="checkbox" value="yes" /> Send to client?</label> </p>
                                        <p> <textarea id="completion_comment" name="completion_comment" cols="50" rows="2" placeholder="Completion Comment"><?php  if($inventory_info->remaining_quantity <= $inventory_order->order_quantity){ echo "Remaining qty: ". $inventory_info->remaining_quantity . " - Ordered Qty: ". $inventory_order->order_quantity ." send only the remaining qty.";
                                             } ?>
                                        </textarea></p>
                                        
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
                      </td>


                      <td style="text-align:center;"><?= $inventory_order->order_number ?></td>
                      <td><?= $inventory_order->client->firstname ." ". $inventory_order->client->lastname ?></td>
                      <td>
<!--                          --><?//= $inventory_order->shipment_id ." - ". $inventory_order->shipment->item_description ?>
                          <?= $this->Html->link($inventory_order->shipment->id ." - ". $inventory_order->shipment->item_description, ['controller' => 'Shipments', 'action' => 'view', $inventory_order->shipment->id]) ?>
                          <?php
                          $this->Shipments = Cake\ORM\TableRegistry::get('Shipments');
                          $combined_shipment = array();
                          $combined_shipment = $this->Shipments->find('all')->where(['Shipments.combine_with_id' => $inventory_order->shipment_id]);
                          if($combined_shipment->count() > 0) {
                              echo "<hr>";
                              foreach($combined_shipment as $cs) {
//                                            echo $cs->item_description . " - " . $cs->id . "<br>";
                                  echo $cs->id . " - " . $cs->item_description . "<br>";
                              }
                          }
                          ?>
                      </td>
                      <td><?= $inventory_order->order_destination ?></td>
                      <td><?= h($inventory_order->date_created) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>        
      </div>    

      <div class="tab-pane" id="pending">
          <div class="table-responsive data-content">    
            <table class="zero-config-datatable display">
                <thead>
                    <tr class="heading">
                      <th style="text-align:center;">Actions</th>
                      <th class="data-id">ID</th>
                      <th class="">Shipment ID</th>
                      <th class="">Shipment Quantity</th>
                      <th class="">Remaining Quantity</th>
                      <th class="">Last Sent Order Quantity</th>
                      <th class="">Last Sent Order Date</th>
                      <th class="">Last Sent Destination</th>
                      <th>Status</th>
                      <th class="">Comments</th>                      
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($inventory as $inventory):
                        
                        $shipmentsOrder = $this->InventoryOrder->find('all')
                            ->where(['shipment_id' => $inventory->shipment_id ])
                            ->andWhere(['order_status' => 'Pending'])
                            ->order(['id' => 'ASC'])->count()
                        ;

                     ?>

                      <?php 
                        $combined_shipment = array();
                        $combined_shipment = $this->Shipments->find('all')->where(['Shipments.combine_with_id' => $inventory->shipment->id, 'Shipments.status' => 3]);
                        
                        $status = "";
                          if($inventory->shipment->status == "1") {
                            $status = "Pending";
                          }elseif($inventory->shipment->status == "2") {
                            $status = "Completed";
                          }elseif($inventory->shipment->status == "3") {
                            $status = "Received and Stored";
                          }elseif($inventory->shipment->status == "4") {
                            $status = "Received-Pending";
                          }

                        $tempStorage = false;
                        if($inventory->shipment->send_option == "send_part_of_it_to_amazon" || $inventory->shipment->send_option == "send_to_amazon"){
                              if(strtotime(date("Y-m-d")) <= strtotime($inventory->shipment->amazon_shipment_date)){
                                  $tempStorage = true;
                              }
                        }

                      ?>
                    <tr>
                      <td class="no-border-right table-actions">
                          <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                                Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">        
                               <?php /* <li role="presentation"><?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('View'), ['action' => 'view', $inventory->id],['title' => 'View', 'escape' => false]) ?></li> */ ?>
                                <li role="presentation"><?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('Inventory Order'), ['controller' => 'inventory_order', 'action' => 'index', $inventory->shipment->id, $inventory->id],['title' => 'View', 'escape' => false]) ?></li>
                                <?php if(!$tempStorage) { ?>
                                <li role="presentation"><a href="javascript:void(0);" class="btn-show-order-form" data-shipment-id="<?= $inventory->shipment->id ?>" data-remaining-quantity="<?= $inventory->remaining_quantity ?>" data-shipment-desc="<?= $inventory->shipment->id ." - ". $inventory->shipment->item_description ?>" data-sent-quantity="<?= $inventory->sent_quantity ?>" data-shipment-status="<?= $status; ?>"><i class="fa fa-pencil"></i><span class="text-send"> Send New Order</span></a></li>
                                <?php } ?>
                                <li role="presentation"><a class="btn-bill-lading" href='#modalBillLading-<?php echo $inventory->id; ?>' data-toggle="modal">Bill Lading</a></li>
                            </ul>
                          </div>

                          <div id="modalBillLading-<?=$inventory->id?>" class="modal fade">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title">Bill Lading</h4>
                                </div>
                                <div class="modal-body wrapper-lg">
                                    <?php include("bill_lading.ctp"); ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div id="modal-<?=$inventory->id?>" class="modal fade">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title">Delete Confirmation</h4>
                                </div>
                                <div class="modal-body wrapper-lg">
                                    <p><?= __('Are you sure you want to delete selected entry?') ?></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn btn-default">No</button>
                                    <?= $this->Form->postLink(
                                            'Yes',
                                            ['action' => 'delete', $inventory->id],
                                            ['class' => 'btn btn-danger', 'escape' => false]
                                        )
                                    ?>
                                </div>
                              </div>
                            </div>
                          </div>
                      </td>
                      <td style="text-align:center;"><span class="label label-danger" > <?php echo $shipmentsOrder; ?> </span><br/><?= $this->Number->format($inventory->shipment->id) ?></td>
                      <td><?= $inventory->shipment->combine_with_id ?><?= $inventory->has('shipment') ? $this->Html->link($inventory->shipment->id ." - ". $inventory->shipment->item_description, ['controller' => 'Shipments', 'action' => 'view', $inventory->shipment->id ]) : '' ?>

                        <?php if($combined_shipment->count() > 0) { ?>
                          <hr>
                          <?php foreach($combined_shipment as $cs) { ?>
                            <?= $cs->id; ?> - <?= $cs->item_description ?><br>
                          <?php } ?>
                        <?php } ?>
                      </td>
                      <td><?= $this->Number->format($inventory->sent_quantity) ?>
                      </td>
                      <td><?= $this->Number->format($inventory->remaining_quantity) ?></td>
                      <td><?= $this->Number->format($inventory->last_sent_order_quantity) ?></td>
                      <td><?= h($inventory->last_sent_order_date) ?></td>
                      <td><?= h($inventory->last_sent_destination) ?></td>
                      <td>
                        <?php if($inventory->shipment->send_option == "send_part_of_it_to_amazon") { ?>
                          <?php 
                            if(strtotime(date("Y-m-d")) <= strtotime($inventory->shipment->amazon_shipment_date)) { 
                              echo "Temporary Storage";
                            }else{
                              echo "Storage";
                            }
                          ?>
                        <?php }elseif($inventory->shipment->send_option == "send_to_amazon" ){ ?> 
                            <?php 
                              if(strtotime(date("Y-m-d")) <= strtotime($inventory->shipment->amazon_shipment_date)) { 
                                echo "Temporary Storage";
                              }else{
                                echo "Storage";
                              }
                            ?>
                        <?php }else { echo $status; }  ?>
                      </td>
                      <td><?= $inventory->shipment->comments . "<br>" . $inventory->shipment->combine_comment ."<br>". $inventory->shipment->amazon_shipment_note ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>        
      </div>

        <div class="tab-pane" id="completed">
            <div class="table-responsive data-content">
                <table class="zero-config-datatable display">
                    <thead>
                    <tr class="heading">
                        <th style="text-align:center;">Actions</th>
                        <th class="data-id" style="width:100px;">ID</th>
                        <th class="" style="width:150px;">Shipment</th>
                        <th class="" style="width:150px;">Order Due Date</th>
                        <th class="" style="width:150px;">Order Number</th>
                        <th class="" style="width:150px;">Order Description</th>
                        <th class="" style="width:150px;">Order Destination</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($inventoryOrderCompleted as $inventoryOrderCompleted): ?>
                        <tr>
                            <td class="no-border-right table-actions">
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">
                                        <li role="presentation"><?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('View'), ['action' => 'view', $inventoryOrderCompleted->id],['title' => 'View', 'escape' => false]) ?> </li>
                                        <?php if( $group_id == 1 ){ ?>
                                            <li role="presentation"><?= $this->Html->link('<i class="fa fa-trash-o"></i> ' . __('Delete'), '#modal-'. $inventoryOrderCompleted->id,['title' => 'Delete', 'data-toggle' => 'modal','escape' => false]) ?></li>
                                            <!-- Delete Modal -->
                                            <div id="modal-<?=$inventoryOrderCompleted->id?>" class="modal fade">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            <h4 class="modal-title">Delete Confirmation</h4>
                                                        </div>
                                                        <div class="modal-body wrapper-lg">
                                                            <p><?= __('Are you sure you want to delete selected entry?') ?></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" data-dismiss="modal" class="btn btn-default">No</button>
                                                            <?= $this->Form->postLink(
                                                                'Yes',
                                                                ['action' => 'delete', $inventoryOrderCompleted->id],
                                                                ['class' => 'btn btn-danger', 'escape' => false]
                                                            )
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </td>
                            <td><?= $this->Number->format($inventoryOrderCompleted->id) ?></td>
                            <td><?= $inventoryOrderCompleted->has('shipment') ? $this->Html->link($inventoryOrderCompleted->shipment->id ." - ". $inventoryOrderCompleted->shipment->item_description, ['controller' => 'Shipments', 'action' => 'view', $inventoryOrderCompleted->shipment->id]) : '' ?>
                            <td><?= h($inventoryOrderCompleted->date_created) ?></td>
                            <td>
                                <?=
                                $this->Html->link($inventoryOrderCompleted->order_number, [ 'controller' => 'inventory_order' , 'action' => 'view', $inventoryOrderCompleted->id],['class' => '','escape' => false])
                                ?>
                            </td>
                            <td><?= h($inventoryOrderCompleted->shipment->item_description) ?></td>
                            <td><?= h($inventoryOrderCompleted->order_destination) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php /*
        <div class="tab-pane" id="completedOld">
        <div class="table-responsive data-content">    
            <table class="zero-config-datatable display">
                <thead>
                    <tr class="heading">
                      <th style="text-align:center;">Actions</th>
                      <th class="data-id">ID</th>
                      <th class="" style="width:180px;">Shipment ID</th>
                      <th class="">Shipment Quantity</th>
                      <th class="">Remaining Quantity</th>
                      <th class="" style="width:120px;">Last Sent Order Quantity</th>
                      <th class="" style="width:120px;">Last Sent Order Date</th>
                      <th class="" style="width:120px;">Last Sent Destination</th>
                      <th class="" style="width:220px;">Comments</th>                      
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($inventory_completed as $inventory_completed): ?>
                      <?php 
                        $combined_shipment = array();
                        $combined_shipment = $this->Shipments->find('all')->where(['Shipments.combine_with_id' => $inventory_completed->shipment->id]);
                        
                      ?>
                    <tr>  
                      <td class="no-border-right table-actions">
                          <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                                Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">        
                                <li role="presentation"><?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('View Orders'), ['action' => 'view', $inventory_completed->id],['title' => 'View', 'escape' => false]) ?></li>
                                <li role="presentation"><?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('Inventory Order'), ['controller' => 'inventory_order', 'action' => 'index', $inventory_completed->shipment->id, $inventory_completed->id],['title' => 'View', 'escape' => false]) ?></li>                                
                            </ul>
                          </div>
                      </td>
                      <td><?= $this->Number->format($inventory_completed->shipment->id) ?></td>
                      <td><?= $inventory_completed->has('shipment') ? $this->Html->link($inventory_completed->shipment->id ." - ". $inventory_completed->shipment->item_description, ['controller' => 'Shipments', 'action' => 'view', $inventory_completed->shipment->id]) : '' ?>

                        <?php if($combined_shipment->count() > 0) { ?>
                          <hr>
                          <?php foreach($combined_shipment as $cs) { ?>
                            <?= $cs->id; ?> - <?= $cs->item_description ?><br>
                          <?php } ?>
                        <?php } ?>
                      </td>
                      <td><?= $this->Number->format($inventory_completed->sent_quantity) ?></td>
                      <td><?= $this->Number->format($inventory_completed->remaining_quantity) ?></td>
                      <td><?= $this->Number->format($inventory_completed->last_sent_order_quantity) ?></td>
                      <td><?= h($inventory_completed->last_sent_order_date) ?></td>
                      <td><?= h($inventory_completed->last_sent_destination) ?></td>
                      <td><?= $inventory_completed->shipment->comments . " " . $inventory_completed->shipment->combine_comment ." ". $inventory_completed->shipment->amazon_shipment_note ?></td>                      
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>        
      </div>  */ ?>
      <div class="tab-pane" id="cancelled">
          <div class="table-responsive data-content">    
            <table class="zero-config-datatable-5-desc display">
                <thead>
                    <tr class="heading">
                      <th style="text-align:center;">Actions</th>
                      <th class="data-id">Order ID</th>
                      <th class="">Client</th>
                      <th class="">Item Description</th>
                      <th class="">Order Destination</th>
                      <th class="">Order to be sent</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cancelled_order as $inventory_order):
                          $inventory_info = array();
                          $inventory_info = $this->Inventory->find('all')->where(['Inventory.shipment_id' => $inventory_order->shipment->id])->first();

                      ?>
                    <tr>
                      <td class="no-border-right table-actions">

                            <div class="dropdown">
                              <button class="btn btn-primary dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                                  Action <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">      
                                  <li role="presentation"><?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('View'), ['controller' => 'inventory_order' , 'action' => 'view', $inventory_order->id],['title' => 'View', 'escape' => false]) ?></li>                       
                              </ul>
                            </div>

                        
                      </td>


                      <td style="text-align:center;"><?= $inventory_order->order_number ?></td>
                      <td><?= $inventory_order->client->firstname ." ". $inventory_order->client->lastname ?></td>
                      <td>
		      <?= $inventory_order->shipment_id ." - ". $inventory_order->shipment->item_description ?>
		      <?php
                          $this->Shipments = Cake\ORM\TableRegistry::get('Shipments');
                          $combined_shipment = array();
                          $combined_shipment = $this->Shipments->find('all')->where(['Shipments.combine_with_id' => $inventory_order->shipment_id]);
                          if($combined_shipment->count() > 0) {
                              echo "<hr>";
                              foreach($combined_shipment as $cs) {
//                                            echo $cs->item_description . " - " . $cs->id . "<br>";
                                  echo $cs->id . " - " . $cs->item_description . "<br>";
                              }
                          }
                          ?>
		      </td>
                      <td><?= $inventory_order->order_destination ?></td>
                      <td><?= h($inventory_order->date_created) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>        
      </div>  
    </div>
  </div>
</section>

<script>
    $('.confirm_trucking').change(function () {
        if($(this).is(":checked")){
            $(this).parent().parent().find('[name="trucking"]').prop("disabled", false);
        }else{
            $(this).parent().parent().find('[name="trucking"]').prop("disabled", true);
        }
    });

    $('.confirm_shipping_location').change(function () {
        if($(this).is(":checked")){
            $(this).parent().parent().find('[name="shipping_location"]').prop("disabled", false);
        }else{
            $(this).parent().parent().find('[name="shipping_location"]').prop("disabled", true);
        }
    });
</script>