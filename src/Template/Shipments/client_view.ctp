<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('View Shipment') ?></h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> <?= __('Shipments') ?>
            </li>
            <li class="active">
                <i class="fa fa-eye"></i> <?= __('View') ?>
            </li>
        </ol>       
    </div>
</div>

<section class="content">   
    <table class="table table-striped table-bordered table-hover">
    <tbody>
        <tr>
            <td><?= __('Shipping Carrier') ?></th>
            <td><?= $shipment->shipping_carrier->name ?></td>
        </tr>
        <tr>
            <td><?= __('Shipping Service') ?></th>
            <td><?= $shipment->shipping_service->name ?></td>
        </tr>
         <tr>
            <td><?= __('Shipping Purpose') ?></th>
            <td><?= $shipment->shipping_purpose->name ?></td>
        </tr>            
        <tr>
            <th><?= __('Quantity') ?></th>
            <td><?= $this->Number->precision($shipment->quantity,2) ?></td>
        </tr>
        <tr>
            <th><?= __('Boxes') ?></th>
            <td><?= $this->Number->precision($shipment->boxes,2) ?></td>
        </tr>
        <tr>
            <th><?= __('Item Description') ?></th>
            <td><?= $this->Text->autoParagraph(h($shipment->item_description)); ?></td>        
        </tr>
         <tr>
            <th><?= __('Additional Information') ?></th>
            <td><?= $this->Text->autoParagraph(h($shipment->additional_information)); ?></td>        
        </tr>                 
        <tr>
            <th><?= __('Comments') ?></th>
            <td><?= $this->Text->autoParagraph(h($shipment->comments)); ?></td>        
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($shipment->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($shipment->modified)   ?></td>
        </tr>
    </tbody>
    </table>
        <?php $stat = $shipment->status; ?>

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
                                                <input name="is_correct_quantity" <?= ($shipment->is_correct_quantity == 1 ? "checked='checked'" : ""); ?> value="1" class="" id="is_correct_quantity1" required="required"  type="radio"> Yes
                                              </label>
                                              <label style="margin-left:10px">
                                                <input name="is_correct_quantity" <?= ($shipment->is_correct_quantity == 0 ? "checked='checked'" : ""); ?> value="0" class="" id="is_correct_quantity2" required="required"  type="radio" > No
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
    <div class="form-group" style="margin-top: 80px;">
    <div class="col-sm-offset-2 col-sm-10">
        <div class="action-fixed-bottom">              
        <?php   
            if( $group_id == 1 ){
                echo $this->Html->link('<i class="fa fa-pencil"></i> ' . __('Edit'), ['action' => 'client_edit', $shipment->id],['title' => 'Edit', 'class' => 'btn btn-info','escape' => false]); 
                echo $this->Html->link('<i class="fa fa-angle-left"> </i> Back To list', ['action' => 'index'],['class' => 'btn btn-warning', 'escape' => false]);
            }else{
                if($group_id == 4) {
                   echo $this->Html->link('<i class="fa fa-angle-left"> </i> Back To list', ['action' => 'client'],['class' => 'btn btn-warning', 'escape' => false]);     
                 }else{   
                echo $this->Html->link('<i class="fa fa-angle-left"> </i> Back To list', ['action' => 'index'],['class' => 'btn btn-warning', 'escape' => false]);
                if($shipment->status <> 2){
                ?>
                  <a href='#modalReceived-<?php echo $shipment->id; ?>' title="Received" class="btn btn-info" data-toggle="modal" onclick='javascript:updateReceivedOption(<?php echo $shipment->id; ?>);'><i class="fa fa-eye"></i> Update</a>  

                <?php } 
               }
            }
        ?>
        </div>
    </div>
    </div>
</section>
