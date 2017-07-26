<style>
.btn-add-bundle{
    width:50px !important;  
    height: 28px;
    padding: 4px;
}
.custom-hr{
    border-top: 1px solid #232225; 
}
.bundle-shipment-order-container{
    margin:10px 0px;
    padding:10px;
}
.bundle-shipment-container{
    /*margin:37px 20px;*/
}
.bundle-shipment-container h3{
    padding:10px;
    background-color: #232225;
    color:#ffffff;
}
.bundle-list{
    list-style: none;
}
.bundle-list li{
    margin:10px;
}
</style>
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

          <?= $this->Form->create($inventoryOrder,[ 'url' => '/inventory_order/bundle_add', 'class' => 'form-horizontal']) ?>                
                <fieldset>
                    <div class='row'>                        
                        <div class='col-sm-8 bundle-shipment-container'>                            
                            <h3>Bundled Order : Please specify shipment and quantity</h3>
                            <div class="bundle-shipment-list-container">
                                <ul class="bundle-list">
                                <?php for( $x=1; $x<=5; $x++ ){ ?>                                    
                                        <li>
                                            <div class="row">
                                            <div class="col-md-5">
                                                <select id="all_shipment" class="form-control" name="bundle[<?php echo $x; ?>][shipment_id]" style="width:98%;">
                                                    <option value="">- Select Shipment -</option>
                                                    <?php foreach($inventory as $i) { ?>
                                                        <option value="<?= $i->shipment->id; ?>"><?= "(" . $i->shipment->id . ") " . $i->shipment->sid ." - ". $i->shipment->item_description ?></option>
                                                    <?php } ?>
                                                </select>        
                                            </div>
                                            <div class="col-md-2">
                                                <input type="number" class="form-control" placeholder="Quantity" name="bundle[<?php echo $x; ?>][quantity]" />
                                            </div>           
                                            <div class="row">                                 
                                        </li>                                    
                                <?php } ?>
                                </ul>
                            </div>                            
                        </div>
                    </div>                    
                    <br/><br/>
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
                            <label for='boxes' class='col-sm-2 control-label'>" . __('Order Price') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Auto Suggest Pricing from the shipment' ></i></span>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('order_price', ['type' => 'text', 'class' => 'form-control', 'id' => 'order_price', 'label' => false]);                
                        echo "<span id='price_text' ></span> </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='date_created' class='col-sm-2 control-label'>" . __('Order to be sent on') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Input the Order to be sent on' ></i></span>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('date_created', ['type' => 'text', 'class' => 'form-control dt-default', 'id' => 'date_created', 'label' => false]);                
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
                         echo "</div></div>";   

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
                            <label for='date_sent' class='col-sm-2 control-label'>" . __('Date Sent') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Input the Date sent' ></i></span>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('date_sent', ['type' => 'text', 'class' => 'form-control dt-default', 'id' => 'date_sent', 'label' => false]);                
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
                            <a href="javascript:void(0);" class="btn btn-warning btn-hide-bundle-order-form" >Cancel</a>
                        </div>
                    </div>
                </div>    
                <?= $this->Form->end() ?>          
        </div>
    </section>
  </div>
</div>