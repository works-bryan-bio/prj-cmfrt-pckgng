<style>
.datepicker { z-index: 10000 !important;}
</style>
<div class="row">
    <div class="col-lg-12 mt-80" style="">
        <div class="dropdown pull-right">
            
            <?php if($hdr_user_data->user->group_id <> 4){?>
             <?= $this->Html->link( __('Back'), ['controller' => 'inventory' ,'action' => 'employee'],['title' => 'Back', 'class' => 'btn btn-sm btn-info', 'escape' => false]) ?> 
             <?php }else{ ?>
             <?= $this->Html->link( __('Back'), ['controller' => 'inventory' ,'action' => 'index'],['title' => 'Back', 'class' => 'btn btn-sm btn-info', 'escape' => false]) ?> 
             <?php } ?>

         </div>
        <h1 class="page-header"><?= __('Inventory Order') ?></h1>
    </div>
</div>
 <div class="ribbon-section">
      <img style="float:left;" src="<?php echo $this->Url->build("/webroot/images/ribbon.png"); ?>">
      <div class="ribbon-black" style="padding-top:0px !important;">
          <ul class="nav nav-tabs nav-justified">
            <li class="active"><a href="#pending" data-toggle="tab" style="height: 85px;border: 0px !important;font-size: 22px;color: white;border-radius: 0px;padding:26px;">Pending Orders</a></li>
            <li><a href="#completed" data-toggle="tab" style="height: 85px;border: 0px !important;font-size: 22px;color: white;border-radius: 0px;padding:26px;">Completed Orders</a></li>      
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
                      <th class="">Order Due Date</th>
                      <th class="">Order Number</th>
                      <th class="">Order Description</th>
                      <th class="">Order Destination</th>
                      <th class="">Order Quantity</th>
                      <th class="">Order Status</th>
                      <th class="actions">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($inventoryOrder as $inventoryOrder): ?>
                    <tr>
                        <td><?= $this->Number->format($inventoryOrder->id) ?></td>                       
                        <td><?= h($inventoryOrder->date_created) ?></td>
                        <td><?= h($inventoryOrder->order_number) ?></td>
                        <td><?= h($inventoryOrder->order_description) ?></td>
                        <td><?= h($inventoryOrder->order_destination) ?></td>
                        <td><?= $this->Number->format($inventoryOrder->order_quantity) ?></td>
                        <td><?= h($inventoryOrder->order_status) ?></td>
                        <td class="actions">
                            <?php if($hdr_user_data->user->group_id != 4) { ?>
                              <?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('Update Status'), '#modalUpdateStatus-'. $inventoryOrder->id,['title' => 'Update Status', 'class' => 'btn btn-sm btn-info','data-toggle' => 'modal','escape' => false]) ?>

                              <div id="modalUpdateStatus-<?=$inventoryOrder->id?>" class="modal fade">
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
                                      <p>Remaining Quantity: <?= $inventory->remaining_quantity; ?></p> 
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" data-dismiss="modal" class="btn btn-default">No</button>
                                      <?= $this->Form->postLink(
                                              'Yes',
                                              ['action' => 'update_status_to_complete', $inventoryOrder->id, $inventory->id],
                                              ['class' => 'btn btn-danger', 'escape' => false]
                                          )
                                      ?>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <?php } ?>
                            <?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('View'), ['action' => 'view', $inventoryOrder->id],['title' => 'View', 'class' => 'btn btn-sm btn-info', 'escape' => false]) ?>                       
                            <?= $this->Html->link('<i class="fa fa-trash-o"></i> ' . __('Delete'), '#modal-'. $inventoryOrder->id,['title' => 'Delete', 'class' => 'btn btn-sm btn-danger','data-toggle' => 'modal','escape' => false]) ?>
                            <!-- Delete Modal -->
                            <div id="modal-<?=$inventoryOrder->id?>" class="modal fade">
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
                                              ['action' => 'delete', $inventoryOrder->id],
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
                      <th class="">Order Number</th>
                      <th class="">Order Quantity</th>
                      <th class="">Order Status</th>
                      <th class="">Date Created</th>
                      <th class="">Shipping Carrier ID</th>
                      <th class="actions">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($inventoryOrderCompleted as $inventoryOrderCompleted): ?>
                    <tr>
                        <td><?= $this->Number->format($inventoryOrderCompleted->id) ?></td>                       
                        <td><?= $inventoryOrderCompleted->has('shipment') ? $this->Html->link($inventoryOrderCompleted->shipment->id, ['controller' => 'Shipments', 'action' => 'view', $inventoryOrderCompleted->shipment->id]) : '' ?></td>
                        <td><?= h($inventoryOrderCompleted->order_number) ?></td>
                        <td><?= $this->Number->format($inventoryOrderCompleted->order_quantity) ?></td>
                        <td><?= h($inventoryOrderCompleted->order_status) ?></td>
                        <td><?= h($inventoryOrderCompleted->date_created) ?></td>
                        <td><?= $inventoryOrderCompleted->has('shipping_carrier') ? $this->Html->link($inventoryOrderCompleted->shipping_carrier->name, ['controller' => 'ShippingCarriers', 'action' => 'view', $inventoryOrderCompleted->shipping_carrier->id]) : '' ?></td>
                        <td class="actions">                            
                            <?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('View'), ['action' => 'view', $inventoryOrderCompleted->id],['title' => 'View', 'class' => 'btn btn-sm btn-info', 'escape' => false]) ?>                       
                            <?php if( $group_id == 1 ){ ?>
                              <?= $this->Html->link('<i class="fa fa-trash-o"></i> ' . __('Delete'), '#modal-'. $inventoryOrderCompleted->id,['title' => 'Delete', 'class' => 'btn btn-sm btn-danger','data-toggle' => 'modal','escape' => false]) ?>
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