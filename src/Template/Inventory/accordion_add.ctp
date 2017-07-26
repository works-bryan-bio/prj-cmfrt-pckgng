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
             <input type="hidden" id="remaining_val"  value=""/>
          <?= $this->Form->create($inventoryOrder,[ 'url' => '/inventory_order/add', 'class' => 'form-horizontal']) ?>
                <input type="hidden" name="shipment_id" value="" id="inp_shipment_id">
                <fieldset>

                    <div id="dropdown-shipments-list" style="display:none;">
                        <div class='form-group'>
                            <label for='order_number' class='col-sm-2 control-label'>Shipment</label> <span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Select the Shipment' ></i></span>
                            <div class='col-sm-6'>
                                <select id="all_shipment" class="form-control">
                                    <?php foreach($inventory as $i) { ?>
                                        <option value="<?= $i->shipment->id; ?>"><?= "(" . $i->shipment->id . ") " . $i->shipment->sid ." - ". $i->shipment->item_description ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <?php                  
                    
                     echo "
                        <div class='form-group'>
                            <label for='order_number' class='col-sm-2 control-label'>" . __('FBA Shipment ID') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Input the FBA Shipment ID' ></i></span>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('fba_shipment_id', ['type' => 'text', 'class' => 'form-control', 'id' => 'order_number', 'label' => false]);
                      echo " </div></div>";        

                      echo "
                        <div class='form-group'>
                            <label for='order_number' class='col-sm-2 control-label'>" . __('Order Number') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Input the Order Number' ></i></span>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('order_number', ['class' => 'form-control', 'id' => 'order_number', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='order_destination' class='col-sm-2 control-label'>" . __('Order Destination') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Input the Order Destination' ></i></span>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('order_destination', ['class' => 'form-control', 'id' => 'order_destination', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='order_quantity' class='col-sm-2 control-label'>" . __('Order Quantity') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Input the Order Quantity' ></i></span>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('order_quantity', ['class' => 'form-control', 'id' => 'order_quantity', 'label' => false]);                
                        echo " </div></div>";

                        echo "
                        <div class='form-group'>
                            <label for='boxes' class='col-sm-2 control-label'>" . __('Order Price') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Auto Suggest Pricing from the shipment' ></i></span>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('order_price', ['disabled' => 'disabled', 'type' => 'text', 'class' => 'form-control', 'id' => 'order_price', 'label' => false]);                
                        echo "<span id='price_text' ></span> </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='date_created' class='col-sm-2 control-label'>" . __('Order to be sent on') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Input the Order to be sent on' ></i></span>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('date_created', ['type' => 'text', 'class' => 'form-control dt-default', 'id' => 'date_created', 'label' => false , 'value' => date('Y-m-d') ]);                
                        echo " </div></div>";   
                           
                                    echo "
                        <div class='form-group'>
                            <label for='shipping_carrier_id' class='col-sm-2 control-label'>" . __('Shipping Carrier') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Select the Shipping Carrier' ></i></span>
                            <div class='col-sm-6'>";
                             echo $this->Form->input('shipping_carrier_id', ['class' => 'form-control', 'id' => 'shipping_carrier_id', 'label' => false, 'options' => $shippingCarriers]);                 
                        echo " </div></div>";    
                                    echo "
                        <div class='form-group'>
                            <label for='shipping_service_id' class='col-sm-2 control-label'>" . __('Shipping Service') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Select the Shipping Service' ></i></span>
                            <div class='col-sm-6'>";
                             echo $this->Form->input('shipping_service_id', ['class' => 'form-control', 'id' => 'shipping_service_id', 'label' => false, 'options' => $shippingServices]);  

                        echo " 
                              </div></div>";    

                        echo "
                        <div class='form-group'>
                            <label for='send_amazon_qty' class='col-sm-2 control-label'>" . __('add FNSKU labels') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Upload FNSKU labels' ></i></span>
                            <div class='col-sm-6'>";
                             echo $this->Form->input('fnsku_label', ['type' => 'text', 'class' => 'form-control has-ck-finder', 'id' => '', 'label' => false]); 
                                      
                        echo " </div></div>";

                        echo "
                        <div class='form-group'>
                            <label for='ship_location' class='col-sm-2 control-label'>" . __('Ship Location') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Ship Location' ></i></span>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('ship_location', ['type' => 'text', 'class' => 'form-control', 'id' => 'ship_location', 'label' => false]);                
                        echo " </div></div>"; 

                        echo "
                        <div class='form-group'>
                            <label for='trucking' class='col-sm-2 control-label'>" . __('Trucking') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Trucking' ></i></span>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('trucking', ['type' => 'text', 'class' => 'form-control', 'id' => 'trucking', 'label' => false]);                
                        echo " </div></div>"; 

                        echo "
                        <div class='form-group'>
                            <label for='date_sent' class='col-sm-2 control-label'>" . __('Date Created') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Input the Date sent' ></i></span>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('date_sent', ['type' => 'text', 'value' => date("Y-m-d"), 'class' => 'form-control dt-default', 'id' => 'date_sent', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='total_remaining' class='col-sm-2 control-label'>" . __('Total Remaining') . "</label> <span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='the Total Remaining' ></i></span>
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