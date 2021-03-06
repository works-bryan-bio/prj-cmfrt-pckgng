 <style>
.col-sm-6{
    padding-right:10px;    
}
 </style>
 <div class="row">
    <div class="col-lg-12 mt-80" style="">        
        <h1 class="page-header"><?= __('Add Shipment') ?></h1>
    </div>
</div>

 <div class="ribbon-section">
  <img style="float:left;" src="<?php echo $this->Url->build("/webroot/images/ribbon.png"); ?>">
  <div class="ribbon-black" style="padding-top:0px !important;">
      <ul class="nav nav-tabs nav-justified">
        <li></li>  
      </ul>
  </div>
</div>
<br style="clear:both;" />  
<div class="row">   
  <div class="col-lg-12">
    <section class="panel panel-primary pos-rlt clearfix">        
        <div class="panel-body clearfix">          
          <?= $this->Form->create($shipment,['class' => 'form-horizontal']) ?>
                <fieldset>        
                    <?php          
                      
                        echo "
                        <div class='form-group'>
                            <label for='item_description' class='col-sm-2 control-label'>" . __('Item Description') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Input the Item Description' ></i></span> 
                            <div class='col-sm-6'>";
                            echo $this->Form->input('item_description', ['class' => 'form-control', 'id' => 'item_description', 'label' => false]);                
                        echo " </div></div>";    
                        
                                  echo "
                        <div class='form-group'>
                            <label for='additional_information' class='col-sm-2 control-label'>" . __('Additional Information') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Input the Addition Information ' ></i></span>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('additional_information', ['class' => 'form-control', 'id' => 'additional_information', 'label' => false]);                
                        echo " </div></div>";  

                                    echo "
                        <div class='form-group'>
                            <label for='quantity' class='col-sm-2 control-label'>" . __('Quantity') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Input the quantity of the items' ></i></span>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('quantity', ['type' => 'text', 'class' => 'form-control', 'id' => 'quantity', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='boxes' class='col-sm-2 control-label'>" . __('Boxes') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Input the quantity of boxes included' ></i></span>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('boxes', ['type' => 'text', 'class' => 'form-control', 'id' => 'boxes', 'label' => false]);                
                        echo " </div></div>"; 

                          echo "
                        <div class='form-group'>
                            <label for='comments' class='col-sm-2 control-label'>" . __('Combine in a pack') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Click check box to show breakdown of item in the pack' ></i></span>
                            <div class='col-sm-6'>";
                            
                            ?>
                            <table class="widht:100%" >
                                   <tr>
                                        <td style="padding: 8px 10px;"><label><input type="checkbox" id="combine_in_pack" name="combine_in_pack" onclick="javascript:shipmentCombineOptions();" class="shipping-combine" value="yes"> Combine in pack </label></td>
                                        <td style="padding: 8px 10px;"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="padding: 8px 10px;"><label class="option-shipping-combine hidden"> Quantity per pack </label> <input type="text" class="option-shipping-combine form-control hidden" id="quantity_per_pack" name="quantity_per_pack" value="">  </td>
                                        
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="padding: 8px 10px;"> <label class="option-shipping-combine hidden">  Packs per shipment</label> <input type="text" class="option-shipping-combine form-control hidden" id="packs_per_shipment" name="packs_per_shipment" value="">  </td>
                                        
                                    </tr>
                            </table>


                            <?php 


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
                        <div class='form-group '>
                            <label for='boxes' class='col-sm-2 control-label'>" . __('Price') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Input the Price' ></i></span>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('price', ['readonly' => 'true', 'type' => 'text', 'class' => 'form-control', 'id' => 'price', 'label' => false]);                
                        echo "<span id='price_text' ></span> </div></div>";

                         echo "
                        <div class='form-group'>
                            <label for='upload_label' class='col-sm-2 control-label'>" . __('Upload label') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Upload label' ></i></span>
                            <div class='col-sm-6'>";
                             echo $this->Form->input('shipment_label', ['type' => 'text', 'class' => 'form-control has-ck-finder', 'id' => '', 'label' => false]); 
                                            
                        echo " </div></div>";

                                    echo "
                        <div class='form-group'>
                            <label for='shipping_carrier_id' class='col-sm-2 control-label'>" . __('Shipping Carrier') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Select Shipping Carrier on the list' ></i></span>
                            <div class='col-sm-6'>";
                             echo $this->Form->input('shipping_carrier_id', ['class' => 'form-control', 'id' => 'shipping_carrier_id', 'label' => false, 'options' => $shippingCarriers]);                 
                        echo " </div></div>";    
                                    echo "
                        <div class='form-group hidden other-shipping-carrier'>
                            <label for='other_shipping_carrier' class='col-sm-2 control-label'>" . __('Other Shipping Carrier') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Select Other Shipping Carrier on the list' ></i></span>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('other_shipping_carrier', ['type' => 'text', 'class' => 'form-control', 'id' => 'other_shipping_carrier', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='shipping_service_id' class='col-sm-2 control-label'>" . __('Shipping Service') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Select Shipping Service on the list' ></i></span>
                            <div class='col-sm-6'>";
                             echo $this->Form->input('shipping_service_id', ['class' => 'form-control', 'id' => 'shipping_service_id', 'label' => false, 'options' => $shippingServices]);                 
                        echo " </div></div>";    
                                    echo "
                        <div class='form-group hidden other-shipping-service'>
                            <label for='other_shipping_service' class='col-sm-2 control-label'>" . __('Other Shipping Service') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Select Other Shipping Service on the list' ></i></span>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('other_shipping_service', ['type' => 'text' , 'class' => 'form-control', 'id' => 'other_shipping_service', 'label' => false]);                
                        echo " </div></div>";    
                        echo "
                        <div class='form-group'> 
                            <label for='shipping_purpose_id' class='col-sm-2 control-label'>" . __('Shipping Purpose') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Select Shipping purpose on the list' ></i></span>
                            <div class='col-sm-6'> ";
                             echo $this->Form->input('shipping_purpose_id', ['class' => 'form-control', 'id' => 'shipping_purpose_id', 'label' => false, 'options' => $shippingPurposes]);                 
                        echo "    </div></div>";

                             echo "
                        <div class='form-group amazon-shipment-date hidden'>
                            <label for='amazon_shipment_date_client' class='col-sm-2 control-label'>" . __('Amazon Shipment Date') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Amazon Shipment Date' ></i></span>
                            <div class='col-sm-6'>";
                             echo $this->Form->input('amazon_shipment_date', ['type' => 'text', 'class' => 'form-control dt-default', 'id' => 'amazon_shipment_date', 'label' => false]); 
                                      
                        echo " </div></div>";


                         echo "
                        <div class='form-group amazon-shipment-date hidden'>
                            <label for='amazon_shipment_date_client' class='col-sm-2 control-label'>" . __('Amazon Shipment Notes') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Amazon Shipment Notes' ></i></span>
                            <div class='col-sm-6'>";
                             echo $this->Form->input('amazon_shipment_note', ['type' => 'text', 'class' => 'form-control', 'id' => 'amazon_shipment_note', 'label' => false]); 
                                      
                        echo " </div></div>";

                         echo "
                        <div class='form-group amazon-shipment-date hidden'>
                            <label for='fba_shipment_id' class='col-sm-2 control-label'>" . __('FBA Shipment ID') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='FBA Shipment ID' ></i></span>
                            <div class='col-sm-6'>";
                           echo $this->Form->input('fba_shipment_id', ['type' => 'text', 'class' => 'form-control', 'id' => 'fba_shipment_id', 'label' => false]); 
                                      
                        echo " </div></div>";

                        echo "
                        <div class='form-group send-amazon-only-group hidden'>
                            <label for='send_amazon_qty' class='col-sm-2 control-label'>" . __('add FNSKU labels') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Upload FNSKU labels' ></i></span>
                            <div class='col-sm-6'>";
                             echo $this->Form->input('fnsku_label', ['type' => 'text', 'class' => 'form-control has-ck-finder', 'id' => '', 'label' => false]); 
                                      
                        echo " </div></div>";

//                        echo "
//                        <div class='form-group send-amazon-group hidden'>
//                            <label for='send_amazon_qty' class='col-sm-2 control-label'>" . __('add FNSKU labels') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Upload FNSKU labels' ></i></span>
//                            <div class='col-sm-6'>";
//                             echo $this->Form->input('fnsku_label', ['type' => 'text', 'class' => 'form-control has-ck-finder', 'id' => '', 'label' => false]);
//
//                        echo " </div></div>";

                         echo "
                        <div class='form-group send-amazon-group hidden'>
                            <label for='amazon_shipment_date_client' class='col-sm-2 control-label'>" . __('Amazon Shipment Date') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Amazon Shipment Date' ></i></span>
                            <div class='col-sm-6'>";
                             echo $this->Form->input('amazon_shipment_date1', ['type' => 'text', 'class' => 'form-control dt-default', 'id' => 'amazon_shipment_date', 'label' => false]); 
                                      
                        echo " </div></div>";

                          echo "
                        <div class='form-group send-amazon-group hidden'>
                            <label for='fba_shipment_id' class='col-sm-2 control-label'>" . __('FBA Shipment ID') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='FBA Shipment ID' ></i></span>
                            <div class='col-sm-6'>";
                           echo $this->Form->input('fba_shipment_id1', ['type' => 'text', 'class' => 'form-control', 'id' => 'fba_shipment_id', 'label' => false]); 
                                      
                        echo " </div></div>";

                        echo "
                        <div class='form-group send-amazon-group hidden'>
                            <label for='send_amazon_qty' class='col-sm-2 control-label'>" . __('add FNSKU labels') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Upload FNSKU labels' ></i></span>
                            <div class='col-sm-6'>";
                             echo $this->Form->input('fnsku_label', ['type' => 'text', 'class' => 'form-control has-ck-finder', 'id' => '', 'label' => false]); 
                                      
                        echo " </div></div>";

                        echo "
                        <div class='form-group send-amazon-group hidden'>
                            <label for='send_amazon_qty' class='col-sm-2 control-label'>" . __('How many?') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Input the Quantity of items you want to send to amazon' ></i></span>
                            <div class='col-sm-6'>";
                             echo $this->Form->input('send_amazon_qty', ['type' => 'text', 'class' => 'form-control', 'id' => 'send_amazon_qty', 'label' => false]);                 
                        echo " </div></div>";

                        echo "
                        <div class='form-group combine-with-group hidden'>
                            <label for='combine_with_id' class='col-sm-2 control-label'>" . __('Client Shipments') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Select Shipments on the list' ></i></span>
                            <div class='col-sm-6'>";
                             echo $this->Form->input('combine_with_id', ['class' => 'combine_with_id form-control', 'id' => 'combine_with_id', 'label' => false, 'options' => $optionPendingShipments]);                 
                        echo " </div></div>";

                        echo "
                        <div class='form-group combine-with-group hidden'>
                            <label for='combine_comment' class='col-sm-2 control-label'>" . __('Remarks') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Input the remarks' ></i></span>
                            <div class='col-sm-6'>";
                             echo $this->Form->input('combine_comment', ['type' => 'text', 'class' => 'form-control', 'id' => 'combine_comment', 'label' => false]);                 
                        echo " </div></div>";
                            


                        echo "
                        <div class='form-group'>
                            <label for='comments' class='col-sm-2 control-label'>" . __('Shipping Instruction') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Check the shipping instruction' ></i></span>
                            <div class='col-sm-6'>";
                            
                            ?>
                            <table class="widht:100%" >
                                    <tr>
                                        <td style="padding: 8px 10px;"><label><input type="checkbox"  id="shipping_instruction" name="shipping_instruction[]" class="" value="Bubble Wrap"> Bubble Wrap </label></td>
                                        <td style="padding: 8px 10px;"><label><input type="checkbox" id="shipping_instruction" name="shipping_instruction[]" class="" value="Shrink Wrap"> Shrink Wrap </label></td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 8px 10px;"><label><input type="checkbox" id="shipping_instruction" name="shipping_instruction[]" class="" value="Poly Bags"> Poly Bags </label></td>
                                        <td style="padding: 8px 10px;"><label><input type="checkbox" id="shipping_instruction" name="shipping_instruction[]" class="" value="Staples"> Staples </label></td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 8px 10px;"><label><input type="checkbox" id="shipping_instruction" name="shipping_instruction[]" onclick="javascript:otherShipmentOptions();" class="shipping-instruction" value="Others"> Others </label></td>
                                        <td style="padding: 8px 10px;"><label><input type="checkbox" id="shipping_instruction" name="shipping_instruction[]" class="" value="Paper Wrap"> Paper Wrap </label></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="padding: 8px 10px;"><input type="text" class="option-shipping-others form-control hidden" id="shipping_others" name="shipping_others" value="">  </td>
                                        
                                    </tr>
                            </table>


                            <?php 


                        echo " </div></div>";

                        echo "
                        <div class='form-group'>
                            <label for='comments' class='col-sm-2 control-label'>" . __('Detailed Shipment Instruction') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Input the comments' ></i></span>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('comments', ['type' => 'text', 'class' => 'form-control', 'id' => 'comments', 'label' => false]);                
                        echo " </div></div>";    

                          echo "
                        <div class='form-group'>
                            <label for='boxes' class='col-sm-2 control-label'>" . __('Shipment ID') . "</label><span style='padding: 25px;'><i class='glyphicon glyphicon-info-sign' data-toggle='tooltip' data-placement='right' title='Input Shipment ID' ></i></span>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('s_id', ['type' => 'text', 'class' => 'form-control', 'id' => 's_id', 'label' => false, 'value' => $shipment_id]);                
                        echo " </div></div>";
                        
                                ?>
                </fieldset>
                <div class="form-group" style="margin-top: 80px;">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="action-fixed-bottom">
                            <?= $this->Form->button('<i class="fa fa-save"></i> ' . __('Submit Shipment'),['name' => 'save', 'value' => 'save', 'class' => 'btn btn-success', 'escape' => false]) ?>                            
                            <?= $this->Html->link('<i class="fa fa-angle-left"> </i> ' . __('Back To list'), ['action' => 'client'],['class' => 'btn btn-warning', 'escape' => false]) ?>
                        </div>
                    </div>
                </div>    
                <?= $this->Form->end() ?>          
        </div>
    </section>
  </div>
</div>