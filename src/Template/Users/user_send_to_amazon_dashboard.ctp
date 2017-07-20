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
          <div class="col-md-4 b-b" style="padding-left: 30px;border: 0px;">
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
      <div class="ribbon-black" style="background-color: #1d89cf;"><h3 class="ribbon-h3" style="margin-left: 25px;">Send to amazon Overdue</h3></div>
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
                        <th class="data-id">Client Name</th>
                        <th class="">Item Desc</th>
                        <th class="">Qty</th>
                        <th class="">Boxes</th>
                        <th class="">Shipping Carrier</th>
                        <th class="">Shipping Service</th>
                        <th class="">Shipping Purpose</th>
                        <th class="">Status</th>
                        <th class="">Date to send to amazon</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($send_to_amazon as $send_to_amazon): ?>
                      <tr>
                        <td><?= $send_to_amazon->client->firstname . " " . $send_to_amazon->client->lastname ?></td>
                        <td><?=
                        $this->Html->link($send_to_amazon->id ." - ". $send_to_amazon->item_description, [ 'controller' => 'shipments' , 'action' => 'client_view', $send_to_amazon->id],['class' => '','escape' => false])
                        ?></td>
                        <td><?= $send_to_amazon->quantity ?></td>
                        <td><?= $send_to_amazon->boxes ?></td>
                        <td><?= $send_to_amazon->shipping_carrier->name ?></td>
                        <td><?= $send_to_amazon->shipping_service->name ?></td>
                        <td><?= $send_to_amazon->shipping_purpose->name ?></td>
                        <td><?php 
                            if( $send_to_amazon->status == 1 ){
                              echo "Pending";
                            }elseif($send_to_amazon->status == 4 || $send_to_amazon->status == 3 ){
                              
                              if(strtotime(date("Y-m-d")) <= strtotime($send_to_amazon->amazon_shipment_date) || strtotime(date("Y-m-d")) <= strtotime($send_to_amazon->amazon_shipment_date_client) ) { 
                                echo "Temporary Storage";
                              }else{
                                echo "Received-Pending";
                              }
                           
                              
                            }else{
                              echo "Completed";
                            }
                          ?></td>
                        <td><?= h($send_to_amazon->amazon_shipment_date) ?></td>
                      </tr>
                      <?php endforeach; ?>
                  </tbody>
              </table>

            
              
                       
        </div>        
    </div>    
</section>



