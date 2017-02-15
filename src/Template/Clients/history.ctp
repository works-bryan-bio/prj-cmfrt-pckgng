<?php
use Cake\ORM\TableRegistry;
$this->Shipments = TableRegistry::get('Shipments');
?>
<div class="row">
    <div class="col-lg-12 mt-80">
        <h1 class="page-header"><?= __('Client History') ?> : <?= $client->firstname; ?> <?= $client->lastname; ?></h1>
    </div>
</div>
<section class="content">
    <div class="ribbon-section">
      <img style="float:left;" src="<?php echo $this->Url->build("/webroot/images/ribbon.png"); ?>">
      <div class="ribbon-black" style="padding-top:0px !important;">
          <ul class="nav nav-tabs nav-justified">
            <li class="active"><a href="#shipments" data-toggle="tab" style="height: 85px;border: 0px !important;font-size: 22px;color: white;border-radius: 0px;padding:26px;">Shipments</a></li>
            <li><a href="#orders" data-toggle="tab" style="height: 85px;border: 0px !important;font-size: 22px;color: white;border-radius: 0px;padding:26px;">Orders</a></li>           
          </ul>
      </div>
    </div>
    <br style="clear:both;" />
    <div class="panel panel-primary">
      <div class="tab-content">
      <div class="tab-pane active" id="shipments">
          <div class="table-responsive data-content">    
            <div class="table-responsive data-content">    
            <table class="zero-config-datatable display">
                <thead>
                    <tr class="heading">
                      <th class="">Item Description</th>                      
                      <th class="">Quantity</th>
                      <th class="">Boxes</th>
                      <th class="">Shipping Carrier</th>
                      <th class="">Shipping Service</th>
                      <th class="">Shipping Purpose</th>
                      <th class="">Status</th>
                      <th class="date-time">Created</th>
                      <th class="actions">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($shipments as $shipment): ?>
                    <tr>
                        <td><?= $shipment->item_description ?></td>                        
                        <td><?= $this->Number->precision($shipment->quantity,2) ?></td>
                        <td><?= $this->Number->precision($shipment->boxes,2) ?></td>
                        <td>
                          <?php
                            if( $shipment->shipping_carrier_id == 4 ){
                              echo $shipment->shipping_carrier->name . " - " . $shipment->other_shipping_carrier;
                            }else{
                              echo $shipment->shipping_carrier->name;
                            }                            
                          ?>                          
                        </td>
                        <td>
                          <?php 
                            if( $shipment->shipping_service_id == 4 ){
                              echo $shipment->shipping_service->name . " - " . $shipment->other_shipping_service;
                            }else{
                              echo $shipment->shipping_service->name;
                            }                            
                          ?>
                        </td>
                        <td>
                          <?php 
                            echo $shipment->shipping_purpose->name;
                          ?>
                        </td>
                        <td>
                          <?php 
                            if( $shipment->status == 1 ){
                              echo "Pending";
                            }else{
                              echo "Completed";
                            }
                          ?>
                        </td>
                        <td><?= h($shipment->created) ?></td>
                        <td class="actions">
                            <?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('View'), ['controller' => 'shipments', 'action' => 'client_view', $shipment->id],['title' => 'View', 'class' => 'btn btn-sm btn-info', 'escape' => false]) ?>                                                    
                            <!-- Delete Modal -->
                            <div id="modal-<?=$shipment->id?>" class="modal fade">
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
                                              ['action' => 'delete', $shipment->id],
                                              ['class' => 'btn btn-danger', 'escape' => false]
                                          )
                                      ?>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!--
                            <?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('Received'), '#modalReceived-'. $shipment->id,['title' => 'Received', 'class' => 'btn btn-sm btn-info','data-toggle' => 'modal','escape' => false]) ?>                          

                            <div id="modalReceived-<?=$shipment->id?>" class="modal fade">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                      <h4 class="modal-title">Confirmation</h4>
                                  </div>
                                  <div class="modal-body wrapper-lg">
                                      <p><?= __('Send to Received and stored?') ?></p>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" data-dismiss="modal" class="btn btn-default">No</button>
                                      <?= $this->Form->postLink(
                                              'Yes',
                                              ['action' => 'send_to_received_and_stored', $shipment->id],
                                              ['class' => 'btn btn-primary', 'escape' => false]
                                          )
                                      ?>
                                  </div>
                                </div>
                              </div>
                            </div>
                            -->
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="tab-pane" id="orders">  
        <div class="table-responsive data-content"> 
              <table class="table table-striped b-t b-light">
                <thead>
                    <tr class="heading">
                      <th class="data-id"><?= $this->Paginator->sort('id') ?></th>
                      <th class=""><?= $this->Paginator->sort('shipment_id') ?></th>
                      <th class=""><?= $this->Paginator->sort('sent_quantity') ?></th>
                      <th class=""><?= $this->Paginator->sort('remaining_quantity') ?></th>
                      <th class=""><?= $this->Paginator->sort('last_sent_order_date') ?></th>
                      <th class=""><?= $this->Paginator->sort('last_sent_order_quantity') ?></th>
                      <th class=""><?= $this->Paginator->sort('last_sent_destination') ?></th>
                      <th class=""><?= $this->Paginator->sort('shipment_id', __('Comments')) ?></th>
                      <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($inventories as $inventory):
                       
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
                                <td><?= $this->Number->format($inventory->id) ?></td>
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
                                <td><?= h($inventory->last_sent_order_date) ?></td>
                                <td><?= $this->Number->format($inventory->last_sent_order_quantity) ?></td>
                                <td><?= h($inventory->last_sent_destination) ?></td>
                                <td><?= $inventory->shipment->comments . " " . $inventory->shipment->combine_comment ." ". $inventory->shipment->amazon_shipment_note ?></td>
                                <td class="actions no-border-right" style="width:20% !important;">
                            <?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('View'), ['controller' => 'inventory_order', 'action' => 'index', $inventory->shipment->id, $inventory->id],['title' => 'View', 'class' => 'btn btn-sm btn-info', 'escape' => false]) ?>
                            <!--<?= $this->Html->link('<i class="fa fa-pencil"></i> ' . __('Send New Order'), ['controller' => 'inventory_order', 'action' => 'add', $inventory->shipment->id],['title' => 'Send New Order', 'class' => 'btn btn-sm btn-info','escape' => false]) ?> -->
                            <br/>
                            
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
        <footer class="panel-footer">
            <div class="row">                            
              <div class="col-sm-12 text-right text-center-xs">                
                 <ul class="pagination pagination-sm m-t-none m-b-none">
                 <!--  <?= $this->Paginator->prev('«') ?>
                  <?= $this->Paginator->numbers() ?>
                  <?= $this->Paginator->next('»') ?> -->
                </ul> 
              </div>
            </div>
        </footer>   
            </div>      
      </div>
    </div>        
    </div>    
</section>
