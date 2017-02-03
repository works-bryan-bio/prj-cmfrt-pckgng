<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('Edit Inventory') ?></h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> <?= __('Inventory') ?>
            </li>
            <li class="active">
                <i class="fa fa-pencil"></i> <?= __('Edit') ?>
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
        <?= __('Edit form') ?>
        </header>      
        <div class="panel-body clearfix">          
          <?= $this->Form->create($inventory,['class' => 'form-horizontal']) ?>
                <fieldset>        
                    <?php
                                    echo "
                        <div class='form-group'>
                            <label for='shipment_id' class='col-sm-2 control-label'>" . __('Shipment Id') . "</label>
                            <div class='col-sm-6'>";
                             echo $this->Form->input('shipment_id', ['class' => 'form-control', 'id' => 'shipment_id', 'label' => false, 'options' => $shipments]);                 
                        echo " </div></div>";    
                                    echo "
                        <div class='form-group'>
                            <label for='sent_quantity' class='col-sm-2 control-label'>" . __('Sent Quantity') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('sent_quantity', ['class' => 'form-control', 'id' => 'sent_quantity', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='remaining_quantity' class='col-sm-2 control-label'>" . __('Remaining Quantity') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('remaining_quantity', ['class' => 'form-control', 'id' => 'remaining_quantity', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='last_sent_order_date' class='col-sm-2 control-label'>" . __('Last Sent Order Date') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('last_sent_order_date', ['class' => 'form-control', 'id' => 'last_sent_order_date', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='last_sent_order_quantity' class='col-sm-2 control-label'>" . __('Last Sent Order Quantity') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('last_sent_order_quantity', ['class' => 'form-control', 'id' => 'last_sent_order_quantity', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='last_sent_destination' class='col-sm-2 control-label'>" . __('Last Sent Destination') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('last_sent_destination', ['class' => 'form-control', 'id' => 'last_sent_destination', 'label' => false]);                
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