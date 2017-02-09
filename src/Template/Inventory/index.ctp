<?php
use Cake\ORM\TableRegistry;
$this->Shipments = TableRegistry::get('Shipments');
?>
<style>
.datepicker { z-index: 10000 !important;}
</style>
<div class="row">
    <div class="col-lg-12 mt-80" style="">  
        <div class="dropdown pull-right">
            <button class="btn btn-primary dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                Action <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">        
                <li role="presentation"><?= $this->Html->link('<i class="fa fa-plus"></i> ' . __('New Shipments'), ['controller' => 'shipments' , 'action' => 'client_add'], ['escape' => false]) ?></li>
                       <!--  <li role="presentation"><?= $this->Html->link('<i class="fa fa-list-alt"></i> ' . __('List Shipments'), ['controller' => 'Shipments', 'action' => 'index'], ['escape' => false]) ?></li>
                <li role="presentation"><?= $this->Html->link('<i class="fa fa-plus"></i> ' . __('New Shipment'), ['controller' => 'Shipments', 'action' => 'add'], ['escape' => false]) ?></li> -->
                    </ul>
        </div>      
        <h1 class="page-header"><?= __('Inventory') ?></h1>
    </div>
</div>
<div id="send-new-order-container" class="send-new-order-container" style="display:none;"><?php include("accordion_add.ctp"); ?></div>
 <div class="ribbon-section">
      <img style="float:left;" src="<?php echo $this->Url->build("/webroot/images/ribbon.png"); ?>">
      <div class="ribbon-black" style="padding-top:0px !important;">
          <ul class="nav nav-tabs nav-justified">
            <li class="active"><a href="#pending" data-toggle="tab" style="height: 85px;border: 0px !important;font-size: 22px;color: white;border-radius: 0px;padding:26px;">Pending Shipments</a></li>
            <li><a href="#completed" data-toggle="tab" style="height: 85px;border: 0px !important;font-size: 22px;color: white;border-radius: 0px;padding:26px;">Completed Shipments</a></li>      
          </ul>
      </div>
    </div>
    <br style="clear:both;" />  
<section class="panel panel-default">
  <div class="panel-body">
    <div class="tab-content">
      <div class="tab-pane active" id="pending">
          <div class="table-responsive data-content">    
            <table class="zero-config-datatable display">
                <thead>
                    <tr class="heading">
                      <th class="data-id">ID</th>
                      <th class="">Shipment ID</th>
                      <th class="">Sent Quantity</th>
                      <th class="">Remaining Quantity</th>
                      <th class="">Last Sent Order Quantity</th>
                      <th class="">Last Sent Order Date</th>
                      <th class="">Last Sent Destination</th>
                      <th class="">Comments</th>
                      <th class="actions no-border-right" style="width:10% !important;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($inventory as $inventory): ?>
                      <?php 
                        $combined_shipment = array();
                        $combined_shipment = $this->Shipments->find('all')->where(['Shipments.combine_with_id' => $inventory->shipment->id]);
                        
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

                      ?>
                    <tr>
                                <td><?= $this->Number->format($inventory->id) ?></td>
                                <td><?= $inventory->has('shipment') ? $this->Html->link($inventory->shipment->id ." - ". $inventory->shipment->item_description, ['controller' => 'Shipments', 'action' => 'view', $inventory->shipment->id]) : '' ?>

                                  <?php if($combined_shipment->count() > 0) { ?>
                                    <hr>
                                    <?php foreach($combined_shipment as $cs) { ?>
                                      <?= $cs->id; ?> - <?= $cs->item_description ?><br>
                                    <?php } ?>
                                  <?php } ?>
                                </td>
                                <td><?= $this->Number->format($inventory->sent_quantity) ?></td>
                                <td><?= $this->Number->format($inventory->remaining_quantity) ?></td>
                                <td><?= $this->Number->format($inventory->last_sent_order_quantity) ?></td>
                                <td><?= h($inventory->last_sent_order_date) ?></td>
                                <td><?= h($inventory->last_sent_destination) ?></td>
                                <td><?= $inventory->shipment->comments . " " . $inventory->shipment->combine_comment ." ". $inventory->shipment->amazon_shipment_note ?></td>
                                <td class="actions">
                            <?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('View'), ['controller' => 'inventory_order', 'action' => 'index', $inventory->shipment->id, $inventory->id],['title' => 'View', 'class' => 'btn btn-sm btn-info', 'escape' => false]) ?>
                            <!--<?= $this->Html->link('<i class="fa fa-pencil"></i> ' . __('Send New Order'), ['controller' => 'inventory_order', 'action' => 'add', $inventory->shipment->id],['title' => 'Send New Order', 'class' => 'btn btn-sm btn-info','escape' => false]) ?>-->
                            <a href="javascript:void(0);" class="btn btn-sm btn-info btn-show-order-form" data-shipment-id="<?= $inventory->shipment->id ?>" data-remaining-quantity="<?= $inventory->remaining_quantity ?>" data-shipment-desc="<?= $inventory->shipment->id ." - ". $inventory->shipment->item_description ?>" data-sent-quantity="<?= $inventory->sent_quantity ?>" data-shipment-status="<?= $status; ?>"><i class="fa fa-pencil"></i> Send New Order</a>                       
                            <?= $this->Html->link('<i class="fa fa-trash-o"></i> ' . __('Cancel Order'), [ 'action' => 'View', 
                            $inventory->id],['title' => 'Cancel Order', 'class' => 'btn btn-sm btn-danger','escape' => false]) ?>  

                            <!-- Delete Modal -->
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
                      <th class="data-id">ID</th>
                      <th class="">Shipment ID</th>
                      <th class="">Sent Quantity</th>
                      <th class="">Remaining Quantity</th>
                      <th class="">Last Sent Order Quantity</th>
                      <th class="">Last Sent Order Date</th>
                      <th class="">Last Sent Destination</th>
                      <th class="">Comments</th>
                      <th class="actions no-border-right" style="width:10% !important;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($inventoryCompleted as $inventoryCompleted): ?>
                      <?php 
                        $combined_shipment = array();
                        $combined_shipment = $this->Shipments->find('all')->where(['Shipments.combine_with_id' => $inventoryCompleted->shipment->id]);
                        
                      ?>
                    <tr>
                                <td><?= $this->Number->format($inventoryCompleted->id) ?></td>
                                <td><?= $inventoryCompleted->has('shipment') ? $this->Html->link($inventoryCompleted->shipment->id ." - ". $inventoryCompleted->shipment->item_description, ['controller' => 'Shipments', 'action' => 'view', $inventoryCompleted->shipment->id]) : '' ?>

                                  <?php if($combined_shipment->count() > 0) { ?>
                                    <hr>
                                    <?php foreach($combined_shipment as $cs) { ?>
                                      <?= $cs->id; ?> - <?= $cs->item_description ?><br>
                                    <?php } ?>
                                  <?php } ?>
                                </td>
                                <td><?= $this->Number->format($inventoryCompleted->sent_quantity) ?></td>
                                <td><?= $this->Number->format($inventoryCompleted->remaining_quantity) ?></td>
                                <td><?= $this->Number->format($inventoryCompleted->last_sent_order_quantity) ?></td>
                                <td><?= h($inventoryCompleted->last_sent_order_date) ?></td>
                                <td><?= h($inventoryCompleted->last_sent_destination) ?></td>
                                <td><?= $inventoryCompleted->shipment->comments . " " . $inventoryCompleted->shipment->combine_comment ." ". $inventoryCompleted->shipment->amazon_shipment_note ?></td>
                                <td class="actions">
                            <?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('View'), ['controller' => 'inventory_order', 'action' => 'index', $inventoryCompleted->shipment->id, $inventoryCompleted->id],['title' => 'View', 'class' => 'btn btn-sm btn-info', 'escape' => false]) ?>                         
                            
                            <!-- Delete Modal -->
                            <div id="modal-<?=$inventoryCompleted->id?>" class="modal fade">
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
                                              ['action' => 'delete', $inventoryCompleted->id],
                                              ['class' => 'btn btn-danger', 'escape' => false]
                                          )
                                      ?>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>        
      </div>    
    </div>
  </div>
</section>