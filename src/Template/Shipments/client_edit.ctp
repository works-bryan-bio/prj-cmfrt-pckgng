<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('Edit Shipment') ?></h1>        
    </div>
</div>
<br/>
<div class="row">   
  <div class="col-lg-12">
    <section class="panel panel-primary pos-rlt clearfix">          
        <div class="panel-body clearfix">          
          <?= $this->Form->create($shipment,['class' => 'form-horizontal']) ?>
                <fieldset>        
                    <?php    
                        $add_shipping_carrier_class = "";
                        $add_shipping_service_class = "";
                        $add_amazon_group_class     = "hidden";
                        $add_combine_group_class    = "hidden";
                        $amazon_shipment_date_class = "hidden";

                        if( $shipment->shipping_carrier_id != 4 ){
                            $add_shipping_carrier_class = 'hidden';
                        }                        

                        if( $shipment->shipping_service_id != 4 ){
                            $add_shipping_service_class = 'hidden';
                        } 

                        if( $shipment->shipping_purpose_id == 3 ){
                            $add_amazon_group_class = "";
                        }   

                        if( $shipment->shipping_purpose_id == 2 ){
                            $amazon_shipment_date_class = "";
                        }

                        if( $shipment->shipping_purpose_id == 5 ){
                            $add_combine_group_class = "";
                        }                    
                                    echo "
                        <div class='form-group'>
                            <label for='item_description' class='col-sm-2 control-label'>" . __('Item Description') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('item_description', ['class' => 'form-control', 'id' => 'item_description', 'label' => false]);                
                        echo " </div></div>";    

                        echo "
                        <div class='form-group'>
                            <label for='additional_information' class='col-sm-2 control-label'>" . __('Additional Information') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('additional_information', ['class' => 'form-control', 'id' => 'additional_information', 'label' => false]);                
                        echo " </div></div>";
                        
                                    echo "
                        <div class='form-group'>
                            <label for='quantity' class='col-sm-2 control-label'>" . __('Quantity') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('quantity', ['type' => 'text', 'class' => 'form-control', 'id' => 'quantity', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='boxes' class='col-sm-2 control-label'>" . __('Boxes') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('boxes', ['type' => 'text', 'class' => 'form-control', 'id' => 'boxes', 'label' => false]);                
                        echo " </div></div>";    
                        
                                   echo "
                        <div class='form-group'>
                            <label for='boxes' class='col-sm-2 control-label'>" . __('Supplier') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Input the supplier name' ></i></span>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('supplier', ['type' => 'text', 'class' => 'form-control', 'id' => 'supplier', 'label' => false]);                
                        echo " </div></div>";

                         echo "
                        <div class='form-group'>
                            <label for='boxes' class='col-sm-2 control-label'>" . __('Asin Number') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Input the FBA Number' ></i></span>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('fba_number', ['type' => 'text', 'class' => 'form-control', 'id' => 'fba_number', 'label' => false]);                
                        echo " </div></div>";

                          echo "
                        <div class='form-group'>
                            <label for='boxes' class='col-sm-2 control-label'>" . __('UPC Number') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Input the UPC Number' ></i></span>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('upc_number', ['type' => 'text', 'class' => 'form-control', 'id' => 'upc_number', 'label' => false, 'autocomplete' => false]);                
                        echo " </div></div>"; 

                        echo "
                        <div class='form-group'>
                            <label for='boxes' class='col-sm-2 control-label'>" . __('Price') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Input the Price' ></i></span>
                            <div class='col-sm-6'>";
                       if($user_group == 4){
                            echo $this->Form->input('price', ['readonly' => 'true', 'type' => 'text', 'class' => 'form-control', 'id' => 'price', 'label' => false]);                
                       }else{
                            echo $this->Form->input('price', ['type' => 'text', 'class' => 'form-control', 'id' => 'price', 'label' => false]);                
                       }
                       

                        echo "<span id='price_text' ></span> </div></div>";

                         echo "
                        <div class='form-group'>
                            <label for='upload_label' class='col-sm-2 control-label'>" . __('Upload label') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Upload label' ></i></span>
                            <div class='col-sm-6'>";
                             echo $this->Form->input('shipment_label', ['type' => 'text', 'class' => 'form-control has-ck-finder', 'id' => '', 'label' => false]); 
                                            
                        echo " </div></div>";


                        
                                    echo "
                        <div class='form-group'>
                            <label for='shipping_carrier_id' class='col-sm-2 control-label'>" . __('Shipping Carrier') . "</label>
                            <div class='col-sm-6'>";
                             echo $this->Form->input('shipping_carrier_id', ['class' => 'form-control', 'id' => 'shipping_carrier_id', 'label' => false, 'options' => $shippingCarriers]);                 
                        echo " </div></div>";    
                                    echo "
                        <div class='form-group " . $add_shipping_carrier_class . " other-shipping-carrier'>
                            <label for='other_shipping_carrier' class='col-sm-2 control-label'>" . __('Other Shipping Carrier') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('other_shipping_carrier', ['class' => 'form-control', 'id' => 'other_shipping_carrier', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='shipping_service_id' class='col-sm-2 control-label'>" . __('Shipping Service') . "</label>
                            <div class='col-sm-6'>";
                             echo $this->Form->input('shipping_service_id', ['class' => 'form-control', 'id' => 'shipping_service_id', 'label' => false, 'options' => $shippingServices]);                 
                        echo " </div></div>";    
                                    echo "
                        <div class='form-group " . $add_shipping_service_class . " other-shipping-service'>
                            <label for='other_shipping_service' class='col-sm-2 control-label'>" . __('Other Shipping Service') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('other_shipping_service', ['class' => 'form-control', 'id' => 'other_shipping_service', 'label' => false]);                
                        echo " </div></div>";

                        echo "
                        <div class='form-group'>
                            <label for='shipping_purpose_id' class='col-sm-2 control-label'>" . __('Shipping Purpose') . "</label>
                            <div class='col-sm-6'>";
                             echo $this->Form->input('shipping_purpose_id', ['class' => 'form-control', 'id' => 'shipping_purpose_id', 'label' => false, 'options' => $shippingPurposes]);                 
                        echo " </div></div>";

                        echo "
                        <div class='form-group amazon-shipment-date " . $amazon_shipment_date_class . "'>
                            <label for='amazon_shipment_date_client' class='col-sm-2 control-label'>" . __('Amazon Shipment Date') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Amazon Shipment Date' ></i></span>
                            <div class='col-sm-6'>";
                             echo $this->Form->input('amazon_shipment_date_client', ['type' => 'text', 'class' => 'form-control dt-default', 'id' => '', 'label' => false]); 
                                      
                        echo " </div></div>";

                        echo "
                        <div class='form-group send-amazon-only-group hidden'>
                            <label for='send_amazon_qty' class='col-sm-2 control-label'>" . __('add FNSKU labels') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Upload FNSKU labels' ></i></span>
                            <div class='col-sm-6'>";
                             echo $this->Form->input('fnsku_label', ['type' => 'text', 'class' => 'form-control has-ck-finder', 'id' => '', 'label' => false]); 
                                      
                        echo " </div></div>";

                        echo "
                        <div class='form-group send-amazon-group hidden'>
                            <label for='send_amazon_qty' class='col-sm-2 control-label'>" . __('add FNSKU labels') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Upload FNSKU labels' ></i></span>
                            <div class='col-sm-6'>";
                             echo $this->Form->input('fnsku_label', ['type' => 'text', 'class' => 'form-control has-ck-finder', 'id' => '', 'label' => false]); 
                                      
                        echo " </div></div>";

                        echo "
                        <div class='form-group send-amazon-group " . $add_amazon_group_class . "'>
                            <label for='send_amazon_qty' class='col-sm-2 control-label'>" . __('How many?') . "</label>
                            <div class='col-sm-6'>";
                             echo $this->Form->input('send_amazon_qty', ['type' => 'text', 'class' => 'form-control', 'id' => 'send_amazon_qty', 'label' => false]);                 
                        echo " </div></div>";

                        echo "
                        <div class='form-group combine-with-group " . $add_combine_group_class . "'>
                            <label for='combine_with_id' class='col-sm-2 control-label'>" . __('Client Pending Shipments') . "</label>
                            <div class='col-sm-6'>";
                             echo $this->Form->input('combine_with_id', ['class' => 'form-control', 'id' => 'combine_with_id', 'label' => false, 'default' => $shipment->combine_with_id, 'options' => $optionPendingShipments]);                 
                        echo " </div></div>";

                        echo "
                        <div class='form-group combine-with-group " . $add_combine_group_class . "'>
                            <label for='combine_comment' class='col-sm-2 control-label'>" . __('Remarks') . "</label>
                            <div class='col-sm-6'>";
                             echo $this->Form->input('combine_comment', ['type' => 'textarea', 'class' => 'form-control', 'id' => 'combine_comment', 'label' => false]);                 
                        echo " </div></div>";
                            
                                    echo "
                        <div class='form-group'>
                            <label for='comments' class='col-sm-2 control-label'>" . __('Detailed Shipment Instruction') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('comments', ['class' => 'form-control', 'id' => 'comments', 'label' => false]);                
                        echo " </div></div>";    
                        
                                ?>
                </fieldset>
                <div class="form-group" style="margin-top: 80px;">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="action-fixed-bottom">
                           
                            <?= $this->Form->button('<i class="fa fa-save"></i> ' . __('Update Shipment'),['name' => 'save', 'value' => 'save', 'class' => 'btn btn-success', 'escape' => false]) ?>    

                            <?php if($user_group==2){?>
                            <?= $this->Html->link('<i class="fa fa-angle-left"> </i> ' . __('Back To list'), ['controller' => 'shipments'],['class' => 'btn btn-warning', 'escape' => false]) ?>
                            <?php }else{?>
                            <?= $this->Html->link('<i class="fa fa-angle-left"> </i> ' . __('Back To list'), ['action' => 'client'],['class' => 'btn btn-warning', 'escape' => false]) ?>
                            <?php }?>

                        </div>
                    </div>
                </div>    
                <?= $this->Form->end() ?>          
        </div>
    </section>
  </div>
</div>