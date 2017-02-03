<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('Add Shipment') ?></h1>          
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
                                    echo "
                        <div class='form-group'>
                            <label for='client_id' class='col-sm-2 control-label'>" . __('Client') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('client_id', ['class' => 'form-control', 'id' => 'client_id', 'label' => false, 'options' => $optionClients]);                
                        echo " </div></div>";   

                        echo "
                        <div class='form-group'>
                            <label for='status' class='col-sm-2 control-label'>" . __('Status') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('status', ['class' => 'form-control', 'id' => 'status', 'label' => false, 'options' => $optionStatus]);                
                        echo " </div></div>";

                                    echo "
                        <div class='form-group'>
                            <label for='item_description' class='col-sm-2 control-label'>" . __('Item Description') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('item_description', ['class' => 'form-control', 'id' => 'item_description', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='quantity' class='col-sm-2 control-label'>" . __('Quantity') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('quantity', ['class' => 'form-control', 'id' => 'quantity', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='boxes' class='col-sm-2 control-label'>" . __('Boxes') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('boxes', ['class' => 'form-control', 'id' => 'boxes', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='shipping_carrier_id' class='col-sm-2 control-label'>" . __('Shipping Carrier') . "</label>
                            <div class='col-sm-6'>";
                             echo $this->Form->input('shipping_carrier_id', ['class' => 'form-control', 'id' => 'shipping_carrier_id', 'label' => false, 'options' => $shippingCarriers]);                 
                        echo " </div></div>";    
                                    echo "
                        <div class='form-group hidden other-shipping-carrier'>
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
                        <div class='form-group hidden other-shipping-service'>
                            <label for='other_shipping_service' class='col-sm-2 control-label'>" . __('Other Shipping Service') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('other_shipping_service', ['class' => 'form-control', 'id' => 'other_shipping_service', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='comments' class='col-sm-2 control-label'>" . __('Comments') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('comments', ['class' => 'form-control', 'id' => 'comments', 'label' => false]);                
                        echo " </div></div>";    
                        
                                ?>
                </fieldset>
                <div class="form-group" style="margin-top: 80px;">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="action-fixed-bottom">
                            <?= $this->Form->button('<i class="fa fa-save"></i> ' . __('Save'),['name' => 'save', 'value' => 'save', 'class' => 'btn btn-success', 'escape' => false]) ?>
                            <?= $this->Form->button('<i class="fa fa-edit"></i> ' . __('Save and Continue adding'),['name' => 'save', 'value' => 'edit', 'class' => 'btn btn-info', 'escape' => false]) ?>
                            <?= $this->Html->link('<i class="fa fa-angle-left"> </i> ' . __('Back To list'), ['action' => 'index'],['class' => 'btn btn-warning', 'escape' => false]) ?>
                        </div>
                    </div>
                </div>    
                <?= $this->Form->end() ?>          
        </div>
    </section>
  </div>
</div>