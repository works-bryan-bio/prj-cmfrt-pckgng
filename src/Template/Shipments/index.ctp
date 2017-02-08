<style>
.datepicker { z-index: 10000 !important;}
</style>
<div class="row">
    <div class="col-lg-12 mt-80" style="">
       <?php if($hdr_user_data->user->group_id <> 3) { ?>
        <div class="dropdown pull-right" style="margin:-20px 14px 0 0">
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
        <?php } ?>
        <h1 class="page-header" style="    padding-bottom: 25px !important;margin-top: 100px !important;"><?= __('Shipments') ?></h1>
    </div>
</div>
 <div class="ribbon-section">
      <img style="float:left;" src="<?php echo $this->Url->build("/webroot/images/ribbon.png"); ?>">
      <div class="ribbon-black" style="padding-top:0px !important;">
          <ul class="nav nav-tabs nav-justified">
            <li class="active"><a href="#pending" data-toggle="tab" style="height: 85px;border: 0px !important;font-size: 22px;color: white;border-radius: 0px;padding:26px;">Pending Shipments</a></li>
            <li><a href="#completed" data-toggle="tab" style="height: 85px;border: 0px !important;font-size: 22px;color: white;border-radius: 0px;padding:26px;">Completed Shipments</a></li>      
          </ul>
      </div>
    </div>
    <br style="clear:both;" />  
<section class="panel panel-default">
  <div class="panel-body">
    <div class="tab-content">
      <div class="tab-pane active" id="pending">
          <div class="table-responsive data-content">    
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr class="heading">
                      <?php if($hdr_user_data->user->group_id <> 4) { ?>
                        <th>Client Name</th>
                      <?php } ?>
                      <th class="data-id"><?= $this->Paginator->sort('item_description') ?></th>                      
                      <th class=""><?= $this->Paginator->sort('quantity') ?></th>
                      <th class=""><?= $this->Paginator->sort('boxes') ?></th>
                      <th class=""><?= $this->Paginator->sort('shipping_carrier_id', __('Shipping Carrier')) ?></th>
                      <th class=""><?= $this->Paginator->sort('shipping_service_id', __('Shipping Service')) ?></th>
                      <th class=""><?= $this->Paginator->sort('shipping_purpose_id', __('Shipping Purpose')) ?></th>
                      <th class=""><?= $this->Paginator->sort('status') ?></th>
                      <th class="date-time"><?= $this->Paginator->sort('created') ?></th>
                      <th class="actions no-border-right" style="width:10% !important;"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pendingShipments as $shipment): ?>
                    <tr>
                        <?php if($hdr_user_data->user->group_id <> 4) { ?>
                          <td><?= $shipment->client->firstname ?> <?= $shipment->client->lastname ?></td>
                        <?php } ?>
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
                            }elseif($shipment->status == 4){
                              echo "Received-Pending";
                            }else{
                              echo "Completed";
                            }
                          ?>
                        </td>
                        <td><?= h($shipment->created) ?></td>
                        <td class="actions">
                            <?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('View'), ['action' => 'client_view', $shipment->id],['title' => 'View', 'class' => 'btn btn-sm btn-info', 'escape' => false]) ?>
                            <?php if($hdr_user_data->user->group_id <> 3){?>
                            <?= $this->Html->link('<i class="fa fa-pencil"></i> ' . __('Edit'), ['action' => 'client_edit', $shipment->id],['title' => 'Edit', 'class' => 'btn btn-sm btn-info','escape' => false]) ?>                                                        
                            <?php } ?>
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

                            
                            <a href='#modalReceived-<?php echo $shipment->id; ?>' title="Received" class="btn btn-sm btn-info" data-toggle="modal" onclick='javascript:updateReceivedOption(<?php echo $shipment->id; ?>);'><i class="fa fa-eye"></i> Update</a>

                            <!-- Delete Modal -->
                            <div id="modalReceived-<?=$shipment->id?>" class="modal fade">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                      <h4 class="modal-title">Update status of shipment</h4>
                                  </div>
                                  <form id="formModalShipments-<?php echo $shipment->id; ?>" method="post" action="<?= $base_url; ?>shipments/send_to_received_and_stored">
                                    <input type="hidden" name="shipment_id" value="<?= $shipment->id; ?>" >
                                    <div class="modal-body wrapper-lg">
                                      <div class="row" style="margin-bottom:5px">
                                        <div class="form-group">
                                          <label for="send_option" class="col-sm-4 control-label" style="margin-top:5px">Send Option</label>
                                          <div class="col-sm-6">
                                            <div class="input text required">
                                              <select  id="send_option" name="send_option" class="form-control send_option">
                                                <option <?= ($shipment->send_option == "storage" ? "selected='selected'" : ""); ?> value="storage">Storage</option>
                                                <option <?= ($shipment->send_option == "send_to_amazon" ? "selected='selected'" : ""); ?> value="send_to_amazon">Send to amazon</option>
                                                <option <?= ($shipment->send_option == "send_part_of_it_to_amazon" ? "selected='selected'" : ""); ?> value="send_part_of_it_to_amazon">Send Part of it to Amazon</option>
                                                <option <?= ($shipment->send_option == "combine_with_shipment" ? "selected='selected'" : ""); ?> value="combine_with_shipment">Combine with shipment</option>
                                              </select>
                                            </div> 
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row" style="margin-bottom:5px">
                                        <div class="form-group">
                                          <label for="is_correct_quantity" class="col-sm-4 control-label" style="margin-top:5px">Correct Quantity</label>
                                          <div class="col-sm-6">
                                            <div class="input radio">
                                              <label>
                                                <input class="rbtn-correct-quantity" name="is_correct_quantity" <?= ($shipment->is_correct_quantity == 1 ? "checked='checked'" : ""); ?> value="1" class="" id="is_correct_quantity1" required="required"  type="radio"> Yes
                                              </label>
                                              <label style="margin-left:10px">
                                                <input class="rbtn-correct-quantity" name="is_correct_quantity" <?= ($shipment->is_correct_quantity == 0 ? "checked='checked'" : ""); ?> value="0" class="" id="is_correct_quantity2" required="required"  type="radio" > No
                                              </label>
                                            </div> 
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row correct_quantity_container" style="margin-bottom:5px; <?= ($shipment->is_correct_quantity == 1 ? "display:none;" : ""); ?>">
                                        <div class="form-group">
                                          <label for="correct_quantity_comment" class="col-sm-4 control-label" style="margin-top:5px">Comment</label>
                                          <div class="col-sm-6">
                                            <div class="input text">
                                              <input name="correct_quantity_comment" value="<?= $shipment->correct_quantity_comment; ?>" class="form-control" id="correct_quantity_comment" type="text">
                                            </div> 
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row" style="margin-bottom:5px">
                                        <div class="form-group">
                                          <label for="aisle_number" class="col-sm-4 control-label" style="margin-top:5px">Aisle Number</label>
                                          <div class="col-sm-6">
                                            <div class="input text required">
                                              <select name="aisle_number" class="form-control" id="aisle_number">
                                                <?php for($x = 1; $x<=5; $x++){ ?>
                                                  <option <?php echo( $x == $shipment->aisle_number ? 'selected="selected"' : '' ); ?> value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                                <?php } ?>
                                              </select>                                              
                                            </div> 
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row shipment-combine-container" style="margin-bottom:5px; display: none;">
                                        <div class="form-group">
                                          <label for="combine_with_id" class="col-sm-4 control-label" style="margin-top:5px">Shipment Combine</label>
                                          <div class="col-sm-6">
                                            <div class="input text required">
                                              <select name="combine_with_id" class="form-control">
                                                <option value=""></option>
                                                  <?php foreach($subShipments[$shipment->id] as $key => $value ) { ?>
                                                    <option value="<?= $value['id'] ?>" ><?= $value['id'] . " - " . $value['item_description'] ?></option>
                                                  <?php } ?>
                                              </select>
                                            </div> 
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row send-to-amazon-container" style="margin-bottom:5px; display: none;">
                                        <div class="form-group">
                                          <label for="amazon_shipment_date" class="col-sm-4 control-label" style="margin-top:5px">Amazon Shipment Date</label>
                                          <div class="col-sm-6">
                                            <div class="input text required">
                                              <input name="amazon_shipment_date" value="<?= $shipment->amazon_shipment_date; ?>" class="form-control dt-default" id="amazon_shipment_date" type="text">
                                            </div> 
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row send-to-amazon-container" style="margin-bottom:5px; display: none;">
                                        <div class="form-group">
                                          <label for="amazon_shipment_note" class="col-sm-4 control-label" style="margin-top:5px">How shipment was sent</label>
                                          <div class="col-sm-6">
                                            <div class="input text required">
                                              <input name="amazon_shipment_note" value="<?= $shipment->amazon_shipment_note; ?>" class="form-control" id="amazon_shipment_note" type="text">
                                            </div> 
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row send-to-amazon-qty-container" style="margin-bottom:5px; display: none;">
                                        <div class="form-group">
                                          <label for="quantity_to_send" class="col-sm-4 control-label" style="margin-top:5px">Quantity to send</label>
                                          <div class="col-sm-6">
                                            <div class="input text required">
                                              <input name="quantity_to_send" value="<?= $shipment->quantity_to_send; ?>" class="form-control" id="quantity_to_send" type="number" min="0" step="any">
                                            </div> 
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row send-to-amazon-container" style="margin-bottom:5px; display: none;">
                                        <div class="form-group">
                                          <label for="amazon_confirmation_receipt" class="col-sm-4 control-label" style="margin-top:5px">Amazon Receipt</label>
                                          <div class="col-sm-6">
                                            <div class="input text required">
                                              <input name="amazon_confirmation_receipt" <?= ($shipment->amazon_confirmation_receipt == 1 ? "checked='checked'" : ""); ?> value="1" class="" id="amazon_confirmation_receipt" type="checkbox">
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
                      <?php if($hdr_user_data->user->group_id <> 4) { ?>
                        <th>Client Name</th>
                      <?php } ?>
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
                        <?php if($hdr_user_data->user->group_id <> 4) { ?>
                          <td><?= $shipment->client->firstname ?> <?= $shipment->client->lastname ?></td>
                        <?php } ?>
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