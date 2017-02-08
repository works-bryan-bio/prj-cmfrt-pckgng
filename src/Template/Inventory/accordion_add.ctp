<br/>
<div id="" class="row">   
  <div class="col-lg-12">
    <section class="panel panel-primary pos-rlt clearfix">        
        <div class="panel-body clearfix">   
            <div class="alert alert-info single-shipment-desc" style="display:none;">
                <b>Shipment:</b> <span class="shipment-desc"></span>
                <b style="margin-left:120px;">Sent Quantity:</b> <span class="shipment-sent-quantity-desc"></span>
                <b style="margin-left:120px;">Remaining Quantity:</b> <span class="shipment-remaining-quantity-desc"></span>
                <b style="margin-left:120px;">Status:</b> <span class="shipment-status-desc"></span>
            </div>

          <?= $this->Form->create($inventoryOrder,[ 'url' => '/inventory_order/add', 'class' => 'form-horizontal']) ?>
                <input type="hidden" name="shipment_id" value="" id="inp_shipment_id">
                <fieldset>

                    <div id="dropdown-shipments-list" style="display:none;">
                        <div class='form-group'>
                            <label for='order_number' class='col-sm-2 control-label'>Shipment</label>
                            <div class='col-sm-6'>
                                <select id="all_shipment" class="form-control">
                                    <?php foreach($inventory as $i) { ?>
                                        <option value="<?= $i->shipment->id; ?>"><?= $i->shipment->id ." - ". $i->shipment->item_description ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <?php                  
                                    echo "
                        <div class='form-group'>
                            <label for='order_number' class='col-sm-2 control-label'>" . __('Order Number') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('order_number', ['class' => 'form-control', 'id' => 'order_number', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='order_destination' class='col-sm-2 control-label'>" . __('Order Destination') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('order_destination', ['class' => 'form-control', 'id' => 'order_destination', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='order_quantity' class='col-sm-2 control-label'>" . __('Order Quantity') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('order_quantity', ['class' => 'form-control', 'id' => 'order_quantity', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='date_created' class='col-sm-2 control-label'>" . __('Order to be sent on') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('date_created', ['class' => 'form-control', 'id' => 'date_created', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='shipping_carrier_id' class='col-sm-2 control-label'>" . __('Shipping Carrier Id') . "</label>
                            <div class='col-sm-6'>";
                             echo $this->Form->input('shipping_carrier_id', ['class' => 'form-control', 'id' => 'shipping_carrier_id', 'label' => false, 'options' => $shippingCarriers]);                 
                        echo " </div></div>";    
                                    echo "
                        <div class='form-group'>
                            <label for='shipping_service_id' class='col-sm-2 control-label'>" . __('Shipping Service Id') . "</label>
                            <div class='col-sm-6'>";
                             echo $this->Form->input('shipping_service_id', ['class' => 'form-control', 'id' => 'shipping_service_id', 'label' => false, 'options' => $shippingServices]);  

                        echo " <br /> <label><input type='checkbox' id='toggle_combine_inventory' checked /> Combine order </label>
                              </div></div>";    
                        echo "
                        <div class='form-group combine_inventory'>
                            <label for='combine_inventory_order_id' class='col-sm-2 control-label'>" . __('Combine Inventory Order Id') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('combine_inventory_order_id', [ 'options' => $inventoryOrders, 'class' => 'form-control', 'id' => 'combine_inventory_order_id', 'label' => false ]);
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group combine_inventory'>
                            <label for='combine_comment' class='col-sm-2 control-label'>" . __('Combine Comment') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('combine_comment', ['class' => 'form-control', 'id' => 'combine_comment', 'label' => false]);                
                        echo " </div></div>";    
                        
                        
                                    echo "
                        <div class='form-group'>
                            <label for='date_sent' class='col-sm-2 control-label'>" . __('Date Sent') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('date_sent', ['class' => 'form-control', 'id' => 'date_sent', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='total_remaining' class='col-sm-2 control-label'>" . __('Total Remaining') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('total_remaining', ['class' => 'form-control', 'disabled' , 'id' => 'total_remaining', 'label' => false ]);                
                        echo " </div></div>";    
                        
                                ?>
                </fieldset>
                <div class="form-group" style="margin-top: 80px;">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="action-fixed-bottom">
                            <?= $this->Form->button('<i class="fa fa-save"></i> ' . __('Save'),['name' => 'save', 'value' => 'save', 'class' => 'btn btn-success', 'escape' => false]) ?>
                            <a href="javascript:void(0);" class="btn btn-warning btn-hide-order-form" >Cancel</a>
                        </div>
                    </div>
                </div>    
                <?= $this->Form->end() ?>          
        </div>
    </section>
  </div>
</div>