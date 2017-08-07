<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('Add Invoice') ?></h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> <?= __('Invoice') ?>
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
          <?= $this->Form->create($invoice,['class' => 'form-horizontal']) ?>
                <fieldset>
                    <?php
                    echo "
                        <div class='form-group'>
                            <label for='clients_id' class='col-sm-2 control-label'>" . __('Bill to') . "</label>
                            <div class='col-sm-6'>";
                    echo $this->Form->input('clients_id', ['class' => 'form-control', 'id' => 'clients_id', 'label' => false, 'options' => $optionClients]);
                    echo " </div></div>";

                    echo "
                        <div class='form-group'>
                            <label for='shipment_order' class='col-sm-2 control-label'>" . __('Bill Inventory Order?') . "</label>
                            <div class='col-sm-6'>";
                    echo $this->Form->input('shipment_order', ['type' => 'checkbox', 'style' => 'margin-left:100px;', 'id' => 'shipment_order', 'label' => false]);
                    echo " </div></div>";

                    echo "
                        <div class='form-group shipmentsContainer'>
                            <label for='shipments_id' class='col-sm-2 control-label'>" . __('Shipments') . "</label>
                            <div class='col-sm-6'>";
                             echo $this->Form->input('shipments_id', ['class' => 'form-control', 'id' => 'shipments_id', 'label' => false, 'options' => $optionShipments]);
                        echo " </div></div>";

                    echo "
                        <div class='form-group ordersContainer'>
                            <label for='shipments_id' class='col-sm-2 control-label'>" . __('Inventory Orders') . "</label>
                            <div class='col-sm-6'>";
                    echo $this->Form->input('inventory_order_id', ['class' => 'form-control', 'id' => 'inventory_order_id', 'label' => false, 'options' => $optionOrders]);
                    echo " </div></div>";

                    echo "
                        <div class='form-group'>
                            <label for='check_off' class='col-sm-2 control-label'>" . __('Invoiced') . "</label>
                            <div class='col-sm-6'>";
                    echo $this->Form->input('check_off', ['type' => 'checkbox', 'style' => 'margin-left:100px;', 'id' => 'check_off', 'label' => false]);
                    echo " </div></div>";

                    echo "<div class='invoice-container'>";
                                    echo "
                        <div class='form-group'>
                            <label for='billing_address' class='col-sm-2 control-label'>" . __('Billing Address') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('billing_address', ['class' => 'form-control', 'id' => 'billing_address', 'label' => false]);
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='terms' class='col-sm-2 control-label'>" . __('Terms') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('terms', ['class' => 'form-control', 'id' => 'terms', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='invoice_date' class='col-sm-2 control-label'>" . __('Invoice Date') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('invoice_date', ['type' => 'text', 'class' => 'form-control dt-default', 'id' => 'invoice_date', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='due_date' class='col-sm-2 control-label'>" . __('Due Date') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('due_date', ['type' => 'text', 'class' => 'form-control dt-default', 'id' => 'due_date', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='product_services' class='col-sm-2 control-label'>" . __('Product Services') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('product_services', ['class' => 'form-control', 'id' => 'product_services', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='description' class='col-sm-2 control-label'>" . __('Description') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('description', ['class' => 'form-control', 'id' => 'description', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='quantity' class='col-sm-2 control-label'>" . __('Quantity') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('quantity', ['class' => 'form-control', 'id' => 'quantity', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='rate' class='col-sm-2 control-label'>" . __('Rate') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('rate', ['class' => 'form-control', 'id' => 'rate', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='balance_due' class='col-sm-2 control-label'>" . __('Balance Due') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('balance_due', ['class' => 'form-control', 'id' => 'balance_due', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group' style='display: none;'>
                            <label for='date_created'  class='col-sm-2 control-label'>" . __('date created') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('date_created', ['class' => 'form-control', 'id' => 'date_created', 'label' => false]);                
                        echo " </div></div>";

                        echo "</div>";


                    echo "
                        <div class='form-group invoiceDocument'>
                            <label for='invoice_doc' class='col-sm-2 control-label'>" . __('Invoice Document') . "</label>
                            <div class='col-sm-6'>";
                    echo $this->Form->input('invoice_doc', ['type' => 'text', 'class' => 'form-control has-ck-finder', 'id' => 'invoice_doc', 'label' => false]);

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

<script>

    $(document).ready(function () {
        $('#check_off').trigger('change');
        $('#shipment_order').trigger('change');
    });

    $('#check_off').change(function () {
        if($(this).is(":checked")){
            $('.invoice-container').hide();
            $('.invoiceDocument').show();
//            $('#clients_id').attr('required', false);
            $('#billing_address').attr('required', false);
            $('#terms').attr('required', false);
            $('#invoice_date').attr('required', false);
            $('#due_date').attr('required', false);
            $('#product_services').attr('required', false);
            $('#description').attr('required', false);
            $('#quantity').attr('required', false);
            $('#rate').attr('required', false);
            $('#balance_due').attr('required', false);

        }else{
            $('.invoice-container').show();
            $('.invoiceDocument').hide();
        }
    });

    $('#shipment_order').change(function () {
        if(!$(this).is(":checked")){
            $('.shipmentsContainer').show();
            $('.ordersContainer').hide();

        }else{
            $('.shipmentsContainer').hide();
            $('.ordersContainer').show();
        }
    });
</script>