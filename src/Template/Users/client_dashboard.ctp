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
.block-client{
  padding-left:10px;
  padding-right:10px;
}
</style>
<section class="statistics" style="padding-bottom: 0px !important;height: 70px;">
 <div class="row" style="margin: 0 auto;width: 98%;">
 <div class="col-lg-4 col-xs-6 block-client">
  <!-- small box -->
  <div class="small-box bg-aqua">
    <div class="inner ">
      <h3 class="shipment-order-due"><?php //echo $pendingShipments->count(); ?></h3>

      <p>Total Pending Shipments</p>
    </div>
    <div class="icon">
      <i class="ion ion-bag"></i>
    </div>
    <a href="<?php echo $this->Url->build('/shipments/client'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-4 col-xs-6 block-client">
  <!-- small box -->
  <div class="small-box bg-green">
    <div class="inner">
      <h3><?php echo $pendingInvoice->count(); ?></h3>

      <p>Total Pending Invoice  </p>
    </div>
    <div class="icon">
      <i class="ion ion-stats-bars"></i>
    </div>
    <a href="<?php echo $this->Url->build('/invoice/client'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-4 col-xs-6 block-client">
  <!-- small box -->
  <div class="small-box bg-yellow">
    <div class="inner">
      <h3><?php echo $completedShipments->count(); ?></h3>

      <p>Total Completed Shipments</p>
    </div>
    <div class="icon">
      <i class="ion ion-person-add"></i>
    </div>
    <a href="<?php echo $this->Url->build('/shipments/client#completed'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>

<!-- ./col -->
<div class="col-lg-4 col-xs-6 block-client">
  <!-- small box -->
  <div class="small-box bg-orange">
    <div class="inner">
      <h3><?php //echo $completedShipments->count(); ?></h3>

      <p>Pay My Bill</p>
    </div>
    <div class="icon">
      <i class="ion ion-person-add"></i>
    </div>
    <a href="<?php echo $this->Url->build('/invoice/client#pending'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-4 col-xs-6 block-client">
  <!-- small box -->
  <div class="small-box bg-red-active">
    <div class="inner">
      <h3><?php //echo $pendingInvoice->count(); ?></h3>

      <p>Create Shipment</p>
    </div>
    <div class="icon">
      <i class="ion ion-stats-bars"></i>
    </div>
    <a href="<?php echo $this->Url->build('/shipments/client_add'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-4 col-xs-6 block-client">
  <!-- small box -->
  <div class="small-box bg-teal">
    <div class="inner">
      <h3><?php //echo $completedShipments->count(); ?></h3>

      <p>Create Inventory Order</p>
    </div>
    <div class="icon">
      <i class="ion ion-person-add"></i>
    </div>
    <a href="<?php echo $this->Url->build('/inventory'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-4 col-xs-6 block-client">
  <!-- small box -->
  <div class="small-box bg-navy">
    <div class="inner">
      <h3><?php //echo $completedShipments->count(); ?></h3>

      <p>Edit Pending Shipment</p>
    </div>
    <div class="icon">
      <i class="ion ion-person-add"></i>
    </div>
    <a href="<?php echo $this->Url->build('/shipments/client#pending'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>

</section>
