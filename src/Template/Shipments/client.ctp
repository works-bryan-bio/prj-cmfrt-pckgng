<?php
use Cake\ORM\TableRegistry;
$this->Shipments = TableRegistry::get('Shipments');
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
        <div class="dropdown pull-right" style="margin:0px 14px 55px 0">
            <button class="btn btn-primary dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                Action <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn" style="right: 0 !important;left: -1px !important;top: 32px !important;width: 179px !important;">        
                <li role="presentation"><?= $this->Html->link('<i class="fa fa-plus"></i> ' . __('New Shipment'), ['action' => 'client_add'], ['escape' => false]) ?></li>                
            </ul>
        </div>
        <h1 class="page-header"><?= __('Shipments') ?></h1>
    </div>
</div>
 <div class="ribbon-section">
      


      <div class="ribbon-black" style="padding-top:0px !important;">
          <ul class="nav nav-tabs nav-justified">
            <li class="active"><a href="#pending" data-toggle="tab" class="ribbon-li">Pending Shipments</a></li>
            <li><a href="#received_and_stored" data-toggle="tab" class="ribbon-li">Received and Stored</a></li>      
            <li><a href="#completed" data-toggle="tab" class="ribbon-li">Completed Shipments</a></li>
            <li><a href="#all_shipment" data-toggle="tab" class="ribbon-li">All</a></li>     
            <li><a href="#cancelled_shipment" data-toggle="tab" class="ribbon-li"><i class="fa fa-ban"></i></a></li>       
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
                      <th class="">Item Description</th>                      
                      <th class="">Quantity</th>
                      <th class="">Boxes</th>
                      <th class="">Shipping Carrier</th>
                      <th class="">Shipping Service</th>
                      <th class="">Shipping Purpose</th>
                      <th class="">Status</th>
                      <th class="date-time">Created</th>                      
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pendingShipments as $shipment): ?>
                    <tr>
                        <td class="no-border-right table-actions">
                            <div class="dropdown">
                              <button class="btn btn-primary dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                                  Action <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">        
                                  <li role="presentation"><?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('View'), ['action' => 'client_view', $shipment->id],['title' => 'View','escape' => false]) ?></li>
                                  <li role="presentation"><?= $this->Html->link('<i class="fa fa-pencil"></i> ' . __('Edit'), ['action' => 'client_edit', $shipment->id],['title' => 'Edit', 'escape' => false]) ?>      </li>   
                                  <li role="presentation"><?= $this->Html->link('<i class="fa fa-ban"></i> ' . __('Cancel Shipment'), '#modalCancel-'.$shipment->id,['title' => 'Cancel', 'escape' => false, 'data-toggle' => 'modal']) ?>      </li>                              
                              </ul>
                            </div>  

                            <div id="modalCancel-<?=$shipment->id?>" class="modal fade">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                      <h4 class="modal-title">Cancel Shipment</h4>
                                  </div>
                                  <div class="modal-body wrapper-lg">
                                      <p><?= __('Are you sure you want to cancel selected entry?') ?></p>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" data-dismiss="modal" class="btn btn-default">No</button>
                                      <?= $this->Form->postLink(
                                              'Yes',
                                              ['action' => 'cancel', $shipment->id],
                                              ['class' => 'btn btn-danger', 'escape' => false]
                                          )
                                      ?>
                                  </div>
                                </div>
                              </div>
                            </div>

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
                        </td>
                        <td><?= $shipment->item_description ." - " .$shipment->id ?></td>                        
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
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>       
      </div>
      <div class="tab-pane" id="received_and_stored">
        <div class="table-responsive data-content">    
            <table class="zero-config-datatable display">
                <thead>
                    <tr class="heading">
                      <th style="text-align:center;">Actions</th>
                      <th class="data-id" style="width:150px;">Item Description</th>                      
                      <th class="" style="width:150px;">Quantity</th>
                      <th class="" style="width:150px;">Boxes</th>
                      <th class="" style="width:150px;">Shipping Carrier</th>
                      <th class="" style="width:150px;">Shipping Service</th>
                      <th class="" style="width:150px;">Shipping Purpose</th>
                      <th class="" style="width:150px;">Remaining Quantity</th>
                      <th class="date-time" style="width:150px;">Created</th>                     
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($receivedAndStoredShipments as $shipment): ?>
                    <tr>
                        <td class="no-border-right table-actions">
                            <div class="dropdown">
                              <button class="btn btn-primary dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                                  Action <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">        
                                  <li role="presentation"><?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('View'), ['controller' => 'inventory_order', 'action' => 'index/'.$shipment->shipment->id.'/'.$shipment->id],['title' => 'View', 'escape' => false]) ?></li>
                              </ul>
                            </div>                          
                        </td>
                        <td><?= $shipment->shipment->item_description ." - ". $shipment->shipment->id ?></td>                        
                        <td><?= $this->Number->precision($shipment->shipment->quantity,2) ?></td>
                        <td><?= $this->Number->precision($shipment->shipment->boxes,2) ?></td>
                        <td>
                          <?php
                            if( $shipment->shipment->shipping_carrier_id == 4 ){
                              echo $shipment->shipment->shipping_carrier->name . " - " . $shipment->shipment->other_shipping_carrier;
                            }else{
                              echo $shipment->shipment->shipping_carrier->name;
                            }                            
                          ?>                          
                        </td>
                        <td>
                          <?php 
                            if( $shipment->shipment->shipping_service_id == 4 ){
                              echo $shipment->shipment->shipping_service->name . " - " . $shipment->shipment->other_shipping_service;
                            }else{
                              echo $shipment->shipment->shipping_service->name;
                            }                            
                          ?>
                        </td>
                        <td>
                          <?php 
                            echo $shipment->shipment->shipping_purpose->name;
                          ?>
                        </td>
                        <td>
                          <?= $shipment->remaining_quantity  ?>
                        </td>
                        <td><?= h($shipment->shipment->created) ?></td>                        
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
                      <th class="data-id" style="width:150px;">Item Description</th>                      
                      <th class="" style="width:150px;">Quantity</th>
                      <th class="" style="width:150px;">Boxes</th>
                      <th class="" style="width:150px;">Shipping Carrier</th>
                      <th class="" style="width:150px;">Shipping Service</th>
                      <th class="" style="width:150px;">Shipping Purpose</th>
                      <th class="" style="width:150px;">Status</th>
                      <th class="date-time" style="width:150px;">Created</th>                      
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($completedShipments as $shipment): ?>
                    <tr>
                        <td class="no-border-right table-actions">
                            <div class="dropdown">
                              <button class="btn btn-primary dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                                  Action <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">        
                                  <li role="presentation"><?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('View'), ['action' => 'client_view', $shipment->id],['title' => 'View', 'escape' => false]) ?></li>
                              </ul>
                            </div>
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
                        </td>
                        <td><?= $shipment->item_description." - ". $shipment->id ?></td>                        
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
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>        
      </div>
      <div class="tab-pane" id="all_shipment">
        <div class="table-responsive data-content">    
            <table class="zero-config-datatable display">
                <thead>
                    <tr class="heading">
                      <th style="text-align:center;">Actions</th>
                      <th class="data-id" style="width:150px;">Item Description</th>                      
                      <th class="" style="width:150px;">Quantity</th>
                      <th class="" style="width:150px;">Boxes</th>
                      <th class="" style="width:150px;">Shipping Carrier</th>
                      <th class="" style="width:150px;">Shipping Service</th>
                      <th class="" style="width:150px;">Shipping Purpose</th>
                      <th class="" style="width:150px;">Status</th>
                      <th class="date-time" style="width:150px;">Created</th>                      
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($allShipments as $shipment): ?>
                    <tr>
                        <td class="no-border-right table-actions">
                            <div class="dropdown">
                              <button class="btn btn-primary dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                                  Action <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">        
                                  <li role="presentation"><?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('View'), ['action' => 'client_view', $shipment->id],['title' => 'View', 'escape' => false]) ?> </li>                                                          
                              </ul>
                            </div>                                                       
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
                        </td>
                        <td><?= $shipment->item_description ." - ". $shipment->id ?></td>                        
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
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>        
      </div> 
      <div class="tab-pane" id="cancelled_shipment">
        <div class="table-responsive data-content">    
            <table class="zero-config-datatable display">
                <thead>
                    <tr class="heading">
                      <th style="text-align:center;">Actions</th>
                      <th class="data-id" style="width:150px;">Item Description</th>                      
                      <th class="" style="width:150px;">Quantity</th>
                      <th class="" style="width:150px;">Boxes</th>
                      <th class="" style="width:150px;">Shipping Carrier</th>
                      <th class="" style="width:150px;">Shipping Service</th>
                      <th class="" style="width:150px;">Shipping Purpose</th>
                      <th class="date-time" style="width:150px;">Created</th>                      
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cancelled_shipments as $shipment): ?>
                    <tr>
                        <td class="no-border-right table-actions">
                            <div class="dropdown">
                              <button class="btn btn-primary dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                                  Action <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">        
                                  <li role="presentation"><?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('View'), ['action' => 'client_view', $shipment->id],['title' => 'View', 'escape' => false]) ?> </li>                                                          
                              </ul>
                            </div>                                                       
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
                        </td>
                        <td><?= $shipment->item_description ." - ". $shipment->id ?></td>                        
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
                        <td><?= h($shipment->created) ?></td>                        
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>        
      </div> 
    </div>
       
    </div>
  </div>
</section>