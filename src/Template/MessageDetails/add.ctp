<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('Add Message Detail') ?></h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> <?= __('Message Details') ?>
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
          <?= $this->Form->create($messageDetail,['class' => 'form-horizontal']) ?>
                <fieldset>        
                    <?php
                                    echo "
                        <div class='form-group'>
                            <label for='message_id' class='col-sm-2 control-label'>" . __('Message Id') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('message_id', ['class' => 'form-control', 'id' => 'message_id', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='user_id' class='col-sm-2 control-label'>" . __('User Id') . "</label>
                            <div class='col-sm-6'>";
                             echo $this->Form->input('user_id', ['class' => 'form-control', 'id' => 'user_id', 'label' => false, 'options' => $users]);                 
                        echo " </div></div>";    
                                    echo "
                        <div class='form-group'>
                            <label for='user_group' class='col-sm-2 control-label'>" . __('User Group') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('user_group', ['class' => 'form-control', 'id' => 'user_group', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='message_details' class='col-sm-2 control-label'>" . __('Message Details') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('message_details', ['class' => 'form-control', 'id' => 'message_details', 'label' => false]);                
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