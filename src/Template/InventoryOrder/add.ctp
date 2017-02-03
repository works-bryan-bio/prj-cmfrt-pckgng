<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('Add Inventory Order') ?></h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> <?= __('Inventory Order') ?>
            </li>
            <li class="active">
                <i class="fa fa-pencil"></i> <?= __('Add') ?>
            </li>
        </ol>       
    </div>
</div>
<div class="row">   
  <div class="col-lg-12">
    <section class="panel panel-primary pos-rlt clearfix">
        <header class="panel-heading">
            <ul class="nav nav-pills pull-right">
              <li>
                <a href="#" class="panel-toggle text-muted"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
              </li>
            </ul>
            <i class="fa fa-navicon"></i>&nbsp;
        <?= __('Add form') ?>
        </header>      
        <div class="panel-body clearfix">          
          <?= $this->Form->create($inventoryOrder,['class' => 'form-horizontal']) ?>
                <fieldset>        
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
                            echo $this->Form->input('total_remaining', ['class' => 'form-control', 'disabled' , 'id' => 'total_remaining', 'label' => false , 'value' => $remaining_quantity]);                
                        echo " </div></div>";    
                        
                                ?>
                </fieldset>
                <div class="form-group" style="margin-top: 80px;">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="action-fixed-bottom">
                            <?= $this->Form->button('<i class="fa fa-save"></i> ' . __('Save'),['name' => 'save', 'value' => 'save', 'class' => 'btn btn-success', 'escape' => false]) ?>
                            <?= $this->Form->button('<i class="fa fa-edit"></i> ' . __('Save and Continue'),['name' => 'save', 'value' => 'edit', 'class' => 'btn btn-info', 'escape' => false]) ?>
                            <?= $this->Html->link('<i class="fa fa-angle-left"> </i> ' . __('Back To list'), ['action' => 'index'],['class' => 'btn btn-warning', 'escape' => false]) ?>
                        </div>
                    </div>
                </div>    
                <?= $this->Form->end() ?>          
        </div>
    </section>
  </div>
</div>