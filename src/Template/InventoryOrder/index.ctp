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
      <div class="ribbon-black" style="padding-top:0px !important;">
          <ul class="nav nav-tabs nav-justified">
            <li class="active"><a href="#pending" data-toggle="tab" class="ribbon-li">Pending Orders</a></li>
            <li><a href="#completed" data-toggle="tab" class="ribbon-li">Completed Orders</a></li>      
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
                      <th class="data-id" style="width:120px;">ID</th>
                      <th class="" style="width:150px;">Order Due Date</th>
                      <th class="" style="width:150px;">Order Number</th>
                      <th class="" style="width:150px;">Order Description</th>
                      <th class="" style="width:150px;">Order Destination</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($inventoryOrder as $inventoryOrder): ?>
                    <tr>
                        <td class="no-border-right table-actions">
                            <div class="dropdown">
                              <button class="btn btn-primary dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                                  Action <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">      
                                  <?php if($hdr_user_data->user->group_id != 4) { ?>
                                    <li role="presentation"><?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('Update Status'), '#modalUpdateStatus-'. $inventoryOrder->id,['title' => 'Update Status', 'data-toggle' => 'modal','escape' => false]) ?></li>
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
                                  <li role="presentation"><?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('View'), ['action' => 'view', $inventoryOrder->id],['title' => 'View', 'escape' => false]) ?></li>                       
                                  <li role="presentation"><?= $this->Html->link('<i class="fa fa-trash-o"></i> ' . __('Delete'), '#modal-'. $inventoryOrder->id,['title' => 'Delete', 'data-toggle' => 'modal','escape' => false]) ?></li>
                              </ul>
                            </div>
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
                        <td><?= $this->Number->format($inventoryOrder->id) ?></td>                       
                        <td><?= h($inventoryOrder->date_created) ?></td>
                        <td><?= h($inventoryOrder->order_number) ?></td>
                        <td><?= h($inventoryOrder->shipment->item_description) ?></td>
                        <td><?= h($inventoryOrder->order_destination) ?></td>
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
                        <td><?= h($inventoryOrderCompleted->date_created) ?></td>
                        <td><?= h($inventoryOrderCompleted->order_number) ?></td>
                        <td><?= h($inventoryOrderCompleted->shipment->item_description) ?></td>
                        <td><?= h($inventoryOrderCompleted->order_destination) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>        
      </div>    
    </div>
  </div>
</section>