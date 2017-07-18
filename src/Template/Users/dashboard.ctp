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
</style>
<section class="statistics" style="padding-bottom: 0px !important;height: 70px;">
 <div class="row">
    <div class="col-sm-12">
      <div class="panel" style="box-shadow: none;background-color: #ffa400;padding-top: 3px !important;padding-bottom: 5px !important;">
        <div class="row m-n">
          <div class="col-md-4 b-b b-r" style="padding-left: 10px;border: 0px;">
            <a href="#" class="block padder-v hover">
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
            <a href="#" class="block padder-v hover">
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
            <a href="#" class="block padder-v hover">
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
              <table class="zero-config-datatable display">
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
                        <td style="text-align:center;"><?= $inventory_order->order_number ?></td>
                        <td><?= $inventory_order->client->firstname ." ". $inventory_order->client->lastname ?></td>
                        <td><?= $inventory_order->shipment_id ." - ". $inventory_order->shipment->item_description ?></td>
                        <td><?= $inventory_order->order_destination ?></td>
                        <td><?= h($inventory_order->date_created) ?></td>
                      </tr>
                      <?php endforeach; ?>
                  </tbody>
              </table>

              <div class="ribbon-section" style="padding-top:0px !important;">
                <div class="ribbon-black" style="background-color: #1d89cf;"><h3 class="ribbon-h3" style="margin-left: 25px;">Pending Shipments</h3></div>
              </div>
           
              <br style="clear:both;" />
              <div class="panel panel-primary custom-panel">
                <table class="zero-config-datatable display">
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
                          <td><?= $shipment->client->firstname ?> <?= $shipment->client->lastname ?></td>
                        <?php } ?>
                        <td><?= $shipment->item_description .' - '. $shipment->id  ?></td>                        
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
                            }elseif($shipment->status == 4){
                              echo "Received-Pending";
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
        </div>        
    </div>    
</section>



