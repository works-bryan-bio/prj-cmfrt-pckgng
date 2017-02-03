<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('Edit Invoice Detail') ?></h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> <?= __('Invoice Details') ?>
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
          <?= $this->Form->create($invoiceDetail,['class' => 'form-horizontal']) ?>
                <fieldset>        
                    <?php
                                    echo "
                        <div class='form-group'>
                            <label for='invoice_id' class='col-sm-2 control-label'>" . __('Invoice Id') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('invoice_id', ['class' => 'form-control', 'id' => 'invoice_id', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='product_service' class='col-sm-2 control-label'>" . __('Product Service') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('product_service', ['class' => 'form-control', 'id' => 'product_service', 'label' => false]);                
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
                            <label for='amount' class='col-sm-2 control-label'>" . __('Amount') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('amount', ['class' => 'form-control', 'id' => 'amount', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='date_created' class='col-sm-2 control-label'>" . __('Date Created') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('date_created', ['class' => 'form-control', 'id' => 'date_created', 'label' => false]);                
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