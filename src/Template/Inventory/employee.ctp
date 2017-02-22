<?php
use Cake\ORM\TableRegistry;
$this->Shipments = TableRegistry::get('Shipments');
$this->InventoryOrder = TableRegistry::get('InventoryOrder');
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
    </div>
</div>
<div id="send-new-order-container" class="send-new-order-container" style="display:none;"><?php include("accordion_add.ctp"); ?></div>
  <div class="ribbon-section">
      <div class="ribbon-black" style="padding-top:0px !important;">
          <ul class="nav nav-tabs nav-justified">
            <li class="active"><a href="#pending" class="ribbon-li" data-toggle="tab">Pending Shipments</a></li>
            <li><a href="#completed" data-toggle="tab" class="ribbon-li">Completed Shipments</a></li>      
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
                      <th style="text-align:center;">Actions</th>
                      <th class="data-id">ID</th>
                      <th class="">Shipment ID</th>
                      <th class="">Shipment Quantity</th>
                      <th class="">Remaining Quantity</th>
                      <th class="">Last Sent Order Quantity</th>
                      <th class="">Last Sent Order Date</th>
                      <th class="">Last Sent Destination</th>
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
                      <td class="no-border-right table-actions">
                          <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                                Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">        
                                <li role="presentation"><?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('View'), ['action' => 'view', $inventory->id],['title' => 'View', 'escape' => false]) ?></li>
                                <li role="presentation"><?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('Inventory Order'), ['controller' => 'inventory_order', 'action' => 'index', $inventory->shipment->id, $inventory->id],['title' => 'View', 'escape' => false]) ?></li>
                                <li role="presentation"><a href="javascript:void(0);" class="btn-show-order-form" data-shipment-id="<?= $inventory->shipment->id ?>" data-remaining-quantity="<?= $inventory->remaining_quantity ?>" data-shipment-desc="<?= $inventory->shipment->id ." - ". $inventory->shipment->item_description ?>" data-sent-quantity="<?= $inventory->sent_quantity ?>" data-shipment-status="<?= $status; ?>"><i class="fa fa-pencil"></i><span class="text-send"> Send New <br/> Order</span></a></li>
                                <li role="presentation"><a href='#modalBillLading-<?php echo $inventory->id; ?>' data-toggle="modal">Bill Lading</a></li>
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
                      <td><?= $inventory->shipment->comments . " " . $inventory->shipment->combine_comment ." ". $inventory->shipment->amazon_shipment_note ?></td>                      
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
                                <li role="presentation"><?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('View'), ['action' => 'view', $inventory_completed->id],['title' => 'View', 'escape' => false]) ?></li>
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
      </div>    
    </div>
  </div>
</section>