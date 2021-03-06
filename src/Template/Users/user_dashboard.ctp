<?php
use Cake\ORM\TableRegistry;
$this->Shipments = TableRegistry::get('Shipments');
$this->InventoryOrder = TableRegistry::get('InventoryOrder');
$this->Inventory = TableRegistry::get('Inventory');
?>
<style> 
#DataTables_Table_0_filter, #DataTables_Table_0_info, #DataTables_Table_0_length, #DataTables_Table_1_filter, #DataTables_Table_1_info, #DataTables_Table_1_length{
  display: none;
}
.custom-panel{
  padding:0px;
}
table.dataTable{
  width:100%;  
}
.table-responsive{
  overflow: hidden;
}
.zero-config-datatable{
  border:none;
  border-bottom: 0px !important;
}
.zero-config-datatable{
  padding-bottom: 5px;
}
.dataTables_paginate{
  padding-bottom: 10px;
}
.section.scrollable.wrapper{
  padding-top: 58px !important;
}
</style>
<section class="statistics" style="padding-bottom: 0px !important;">
 <div class="row">
    <div class="col-sm-12">
      <div class="panel" style="box-shadow: none;background-color: #ffa400;padding-top: 3px !important;padding-bottom: 5px !important;">
        <div class="row m-n">
          <div class="col-md-4 b-b b-r" style="padding-left: 10px;border: 0px;">
            <a href="<?php echo $base_url ."shipments#pending"; ?>" class="block padder-v hover">
              <span class="i-s i-s-2x pull-left m-r-sm">
                <i class="i i-hexagon2 i-s-base text-danger hover-rotate"></i>
                <i class="fa fa-fw fa-truck icon icon-big white"></i>
              </span>
              <span class="clear">
                <span class="h3 block m-t-xs text-danger white"><?php echo $pendingShipments->count(); ?></span>
                <small class="text-muted text-u-c white">Total Pending Shipments</small>
              </span>
            </a>
          </div>
          <div class="col-md-4 b-b left-30" style="border: 0px;">
            <a href="<?php echo $base_url ."shipments#completed"; ?>" class="block padder-v hover">
              <span class="i-s i-s-2x pull-left m-r-sm">
                <i class="i i-hexagon2 i-s-base text-success-lt hover-rotate"></i>
                <i class="fa fa-fw fa-truck icon icon-big white"></i>
              </span>
              <span class="clear">
                <span class="h3 block m-t-xs text-success white"><?php echo $completedShipments->count(); ?></span>
                <small class="text-muted text-u-c white">Total Complete Shipments</small>
              </span>
            </a>
          </div>
          <div class="col-md-4 b-b b-r" style="padding-left: 10px;border: 0px;">
            <a href="<?php echo $base_url ."inventory/employee#pending"; ?>" class="block padder-v hover">
              <span class="i-s i-s-2x pull-left m-r-sm">
                <i class="i i-hexagon2 i-s-base text-info hover-rotate"></i>
                <i class="fa fa-fw fa-truck icon icon-big white"></i>
              </span>
              <span class="clear">
                <span class="h3 block m-t-xs text-info white"><?php echo $receivedAndStoredShipments->count(); ?></span>
                <small class="text-muted text-u-c white">Total Received and Stored Shipments</small>
              </span>
            </a>
          </div>
        </div>
      </div>
  </div>
</section>
<section class="content" style="padding-top: 0px !important;padding-bottom: 0px !important;">
 
    <div class="ribbon-section" style="padding-top:0px !important;">
      <div class="ribbon-black" style="background-color: #1d89cf;"><h3 class="ribbon-h3" style="margin-left: 25px;">Pending Orders</h3></div>
    </div>
 
    <br style="clear:both;" />
    <div class="panel panel-primary custom-panel">
<!--	    <div style="border-bottom: 1px solid #bfbfbf;margin-bottom: 15px;padding-bottom: 6px;">
	      <h4 style="margin-top: 0px;color: #524742;margin-left: 6px;font-weight: 600;">Sample Data Table</h4>
	    </div>    -->
          <div class="table-responsive data-content">    
              <table class="zero-config-datatable-user-dash display">
                  <thead>
                      <tr class="heading">                      
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
                        <td style="text-align:center;"><?= $this->Html->link($inventory_order->order_number, [ 'controller' => 'inventory_order' , 'action' => 'view', $inventory_order->id],['class' => '','escape' => false]) ?></td>
                        <td><?= $this->Html->link($inventory_order->client->firstname ." ". $inventory_order->client->lastname, [ 'controller' => 'inventory_order' , 'action' => 'view', $inventory_order->id],['class' => '','escape' => false]) ?></td>
                        <td><?= $this->Html->link($inventory_order->shipment_id ." - ". $inventory_order->shipment->item_description, [ 'controller' => 'inventory_order' , 'action' => 'view', $inventory_order->id],['class' => '','escape' => false]) ?></td>
                        <td><?= $this->Html->link($inventory_order->order_destination, [ 'controller' => 'inventory_order' , 'action' => 'view', $inventory_order->id],['class' => '','escape' => false]) ?></td>
                        <td><?= $this->Html->link(h($inventory_order->date_created), [ 'controller' => 'inventory_order' , 'action' => 'view', $inventory_order->id],['class' => '','escape' => false]) ?></td>
                      </tr>
                      <?php endforeach; ?>
                  </tbody>
              </table>

              <div class="ribbon-section" style="padding-top:0px !important;">
                <div class="ribbon-black" style="background-color: #1d89cf;"><h3 class="ribbon-h3" style="margin-left: 25px;">Pending Shipments</h3></div>
              </div>
                <table class="zero-config-datatable-pending-shipment display">
                <thead>
                    <tr class="heading">                      
                      <?php if($hdr_user_data->user->group_id <> 4) { ?>
                        <th>Client Name</th>
                      <?php } ?>
                      <th class="data-id">Item Desc</th>                      
                      <th class="">Qty</th>
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
                        <?php if($hdr_user_data->user->group_id <> 4) { ?>
                          <td><?= $this->Html->link($shipment->client->firstname .' '. $shipment->client->lastname , [ 'controller' => 'shipments' , 'action' => 'client_view', $shipment->id],['class' => '','escape' => false]) ?></td>
                        <?php } ?>
                        <td><?= $this->Html->link($shipment->item_description .' - '. $shipment->id , [ 'controller' => 'shipments' , 'action' => 'client_view', $shipment->id],['class' => '','escape' => false]) ?></td>                        
                        <td><?= $this->Html->link($this->Number->precision($shipment->quantity,2) , [ 'controller' => 'shipments' , 'action' => 'client_view', $shipment->id],['class' => '','escape' => false]) ?></td>
                        <td><?= $this->Html->link($this->Number->precision($shipment->boxes,2) , [ 'controller' => 'shipments' , 'action' => 'client_view', $shipment->id],['class' => '','escape' => false]) ?></td>
                        <td>
                          <?php
                            if( $shipment->shipping_carrier_id == 4 ){
                              echo $this->Html->link($shipment->shipping_carrier->name . " - " . $shipment->other_shipping_carrier, [ 'controller' => 'shipments' , 'action' => 'client_view', $shipment->id],['class' => '','escape' => false]);
                            }else{
                              echo $this->Html->link($shipment->shipping_carrier->name, [ 'controller' => 'shipments' , 'action' => 'client_view', $shipment->id],['class' => '','escape' => false]);
                            }                            
                          ?>                          
                        </td>
                        <td>
                          <?php 
                            if( $shipment->shipping_service_id == 4 ){
                              echo $this->Html->link($shipment->shipping_service->name . " - " . $shipment->other_shipping_service, [ 'controller' => 'shipments' , 'action' => 'client_view', $shipment->id],['class' => '','escape' => false]);
                            }else{
                              echo $this->Html->link($shipment->shipping_service->name, [ 'controller' => 'shipments' , 'action' => 'client_view', $shipment->id],['class' => '','escape' => false]);                              
                            }                            
                          ?>
                        </td>
                        <td>
                          <?php 
                            echo $this->Html->link($shipment->shipping_purpose->name, [ 'controller' => 'shipments' , 'action' => 'client_view', $shipment->id],['class' => '','escape' => false]);
                          ?>
                        </td>
                        <td>
                          <?php 
                            if( $shipment->status == 1 ){
                              echo $this->Html->link("Pending", [ 'controller' => 'shipments' , 'action' => 'client_view', $shipment->id],['class' => '','escape' => false]);                              
                            }elseif($shipment->status == 4){
                              echo $this->Html->link("Received-Pending", [ 'controller' => 'shipments' , 'action' => 'client_view', $shipment->id],['class' => '','escape' => false]);                              
                            }else{
                              echo $this->Html->link("Completed", [ 'controller' => 'shipments' , 'action' => 'client_view', $shipment->id],['class' => '','escape' => false]);                              
                            }
                          ?>
                        </td>
                        <td><?= $this->Html->link(h($shipment->created), [ 'controller' => 'shipments' , 'action' => 'client_view', $shipment->id],['class' => '','escape' => false]) ?></td>                        
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
              
          </div>              
        </div>        
    </div>    
</section>



