<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('Add End User Order') ?></h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> <?= __('End User Order') ?>
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
          <?= $this->Form->create($endUserOrder,['class' => 'form-horizontal']) ?>
                <fieldset>        
                    <?php

                        
                                    echo "
                        <div class='form-group' style='visibility:hidden;' >
                            <label for='client_id' class='col-sm-2 control-label'>" . __('Client Id') . "</label>
                            <div class='col-sm-6'>";
                             echo $this->Form->input('client_id', ['class' => 'form-control', 'id' => 'client_id', 'label' => false, 'options' => $clients , 'value' => $client_id  ]);                 
                        echo " </div></div>";    
                   

                                    echo "
                        <div class='form-group'>
                            <label for='name' class='col-sm-2 control-label'>" . __('Name') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('name', ['class' => 'form-control', 'id' => 'name', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='address' class='col-sm-2 control-label'>" . __('Address') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('address', ['class' => 'form-control', 'id' => 'address', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='shipping_service_id' class='col-sm-2 control-label'>" . __('Shipping Service Id') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('shipping_service_id', ['class' => 'form-control', 'id' => 'shipping_service_id', 'label' => false]);                
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