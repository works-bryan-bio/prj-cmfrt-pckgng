<style>
.datepicker { z-index: 10000 !important;}
</style>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('Shipments') ?></h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> <?= __('Shipments') ?>
            </li>
        </ol>
        <div class="dropdown pull-right" style="margin:-117px 14px 0 0">
            <button class="btn btn-primary dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                Action <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">        
                <li role="presentation"><?= $this->Html->link('<i class="fa fa-plus"></i> ' . __('New Shipment'), ['action' => 'add'], ['escape' => false]) ?></li>
                        <li role="presentation"><?= $this->Html->link('<i class="fa fa-list-alt"></i> ' . __('List Shipping Carriers'), ['controller' => 'ShippingCarriers', 'action' => 'index'], ['escape' => false]) ?></li>
                <li role="presentation"><?= $this->Html->link('<i class="fa fa-plus"></i> ' . __('New Shipping Carrier'), ['controller' => 'ShippingCarriers', 'action' => 'add'], ['escape' => false]) ?></li>
                        <li role="presentation"><?= $this->Html->link('<i class="fa fa-list-alt"></i> ' . __('List Shipping Services'), ['controller' => 'ShippingServices', 'action' => 'index'], ['escape' => false]) ?></li>
                <li role="presentation"><?= $this->Html->link('<i class="fa fa-plus"></i> ' . __('New Shipping Service'), ['controller' => 'ShippingServices', 'action' => 'add'], ['escape' => false]) ?></li>
                    </ul>
        </div>
    </div>
</div>
<section class="panel panel-default">
  <header class="panel-heading bg-light">
    <ul class="nav nav-tabs nav-justified">
      <li class="active"><a href="#pending" data-toggle="tab">Pending Shipments</a></li>
      <li><a href="#completed" data-toggle="tab">Completed Shipments</a></li>      
    </ul>
  </header>
  <div class="panel-body">
    <div class="tab-content">
      <div class="tab-pane active" id="pending">
          <div class="table-responsive data-content">    
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr class="heading">
                      <th class="data-id"><?= $this->Paginator->sort('item_description') ?></th>                      
                      <th class=""><?= $this->Paginator->sort('quantity') ?></th>
                      <th class=""><?= $this->Paginator->sort('boxes') ?></th>
                      <th class=""><?= $this->Paginator->sort('shipping_carrier_id', __('Shipping Carrier')) ?></th>
                      <th class=""><?= $this->Paginator->sort('shipping_service_id', __('Shipping Service')) ?></th>
                      <th class=""><?= $this->Paginator->sort('shipping_purpose_id', __('Shipping Purpose')) ?></th>
                      <th class=""><?= $this->Paginator->sort('status') ?></th>
                      <th class="date-time"><?= $this->Paginator->sort('created') ?></th>
                      <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pendingShipments as $shipment): ?>
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
                            <?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('View'), ['action' => 'client_view', $shipment->id],['title' => 'View', 'class' => 'btn btn-sm btn-info', 'escape' => false]) ?>
                            <?= $this->Html->link('<i class="fa fa-pencil"></i> ' . __('Edit'), ['action' => 'client_edit', $shipment->id],['title' => 'Edit', 'class' => 'btn btn-sm btn-info','escape' => false]) ?>                                                        
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

                            <?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('Received'), '#modalReceived-'. $shipment->id,['title' => 'Received', 'class' => 'btn btn-sm btn-info','data-toggle' => 'modal','escape' => false]) ?>                          
                            <!-- Delete Modal -->
                            <div id="modalReceived-<?=$shipment->id?>" class="modal fade">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                      <h4 class="modal-title">Send to Received and stored</h4>
                                  </div>
                                  <form method="post" action="<?= $base_url; ?>shipments/send_to_received_and_stored">
                                    <input type="hidden" name="shipment_id" value="<?= $shipment->id; ?>" >
                                    <div class="modal-body wrapper-lg">
                                      <div class="row" style="margin-bottom:5px">
                                        <div class="form-group">
                                          <label for="is_correct_quantity" class="col-sm-4 control-label" style="margin-top:5px">Correct Quantity</label>
                                          <div class="col-sm-6">
                                            <div class="input radio">
                                              <label>
                                                <input name="is_correct_quantity" value="1" class="" id="is_correct_quantity1" required="required"  type="radio"> Yes
                                              </label>
                                              <label style="margin-left:10px">
                                                <input name="is_correct_quantity" value="0" class="" id="is_correct_quantity2" required="required"  type="radio" > No
                                              </label>
                                            </div> 
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row" style="margin-bottom:5px">
                                        <div class="form-group">
                                          <label for="aisle_number" class="col-sm-4 control-label" style="margin-top:5px">Aisle Number</label>
                                          <div class="col-sm-6">
                                            <div class="input text required">
                                              <input name="aisle_number" class="form-control" id="aisle_number" required="required"  type="text">
                                            </div> 
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row" style="margin-bottom:5px">
                                        <div class="form-group">
                                          <label for="combine_with_id" class="col-sm-4 control-label" style="margin-top:5px">Shipment Combine</label>
                                          <div class="col-sm-6">
                                            <div class="input text required">
                                              <select name="combine_with_id" class="form-control">
                                                <option value=""></option>
                                                  <?php foreach($subShipments[$shipment->id] as $key => $value ) { ?>
                                                    <option value="<?= $value['id'] ?>" ><?= $value['id'] ?></option>
                                                  <?php } ?>
                                              </select>
                                            </div> 
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row" style="margin-bottom:5px">
                                        <div class="form-group">
                                          <label for="amazon_shipment_date" class="col-sm-4 control-label" style="margin-top:5px">Amazon Shipment Date</label>
                                          <div class="col-sm-6">
                                            <div class="input text required">
                                              <input name="amazon_shipment_date" class="form-control dt-default" id="amazon_shipment_date" required="required"  type="text">
                                            </div> 
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row" style="margin-bottom:5px">
                                        <div class="form-group">
                                          <label for="amazon_shipment_note" class="col-sm-4 control-label" style="margin-top:5px">How shipment was sent</label>
                                          <div class="col-sm-6">
                                            <div class="input text required">
                                              <input name="amazon_shipment_note" class="form-control" id="amazon_shipment_note" required="required"  type="text">
                                            </div> 
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row" style="margin-bottom:5px">
                                        <div class="form-group">
                                          <label for="amazon_confirmation_receipt" class="col-sm-4 control-label" style="margin-top:5px">Amazon Receipt</label>
                                          <div class="col-sm-6">
                                            <div class="input text required">
                                              <input name="amazon_confirmation_receipt" value="1" class="" id="amazon_confirmation_receipt" required="required"  type="checkbox">
                                            </div> 
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn btn-default">No</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">                            
              <div class="col-sm-12 text-right text-center-xs">                
                <ul class="pagination pagination-sm m-t-none m-b-none">
                  <?= $this->Paginator->prev('«') ?>
                  <?= $this->Paginator->numbers() ?>
                  <?= $this->Paginator->next('»') ?>
                </ul>
              </div>
            </div>
        </footer> 
      </div>
      <div class="tab-pane" id="completed">
        <div class="table-responsive data-content">    
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr class="heading">
                      <th class="data-id"><?= $this->Paginator->sort('item_description') ?></th>                      
                      <th class=""><?= $this->Paginator->sort('quantity') ?></th>
                      <th class=""><?= $this->Paginator->sort('boxes') ?></th>
                      <th class=""><?= $this->Paginator->sort('shipping_carrier_id', __('Shipping Carrier')) ?></th>
                      <th class=""><?= $this->Paginator->sort('shipping_service_id', __('Shipping Service')) ?></th>
                      <th class=""><?= $this->Paginator->sort('shipping_purpose_id', __('Shipping Purpose')) ?></th>
                      <th class=""><?= $this->Paginator->sort('status') ?></th>
                      <th class="date-time"><?= $this->Paginator->sort('created') ?></th>
                      <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($completedShipments as $shipment): ?>
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
                            <?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('View'), ['action' => 'client_view', $shipment->id],['title' => 'View', 'class' => 'btn btn-sm btn-info', 'escape' => false]) ?>                            
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
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">                            
              <div class="col-sm-12 text-right text-center-xs">                
                <ul class="pagination pagination-sm m-t-none m-b-none">
                  <?= $this->Paginator->prev('«') ?>
                  <?= $this->Paginator->numbers() ?>
                  <?= $this->Paginator->next('»') ?>
                </ul>
              </div>
            </div>
        </footer> 
      </div>    
    </div>
  </div>
</section>