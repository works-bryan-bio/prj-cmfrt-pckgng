<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('Add User Entity') ?></h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> <?= __('User Entities') ?>
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
          <?= $this->Form->create($userEntity,['class' => 'form-horizontal']) ?>
                <fieldset>        
                    <?php
                                    echo "
                        <div class='form-group'>
                            <label for='user_id' class='col-sm-2 control-label'>" . __('User Id') . "</label>
                            <div class='col-sm-6'>";
                             echo $this->Form->input('user_id', ['class' => 'form-control', 'id' => 'user_id', 'label' => false, 'options' => $users]);                 
                        echo " </div></div>";    
                                    echo "
                        <div class='form-group'>
                            <label for='firstname' class='col-sm-2 control-label'>" . __('Firstname') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('firstname', ['class' => 'form-control', 'id' => 'firstname', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='middlename' class='col-sm-2 control-label'>" . __('Middlename') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('middlename', ['class' => 'form-control', 'id' => 'middlename', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='lastname' class='col-sm-2 control-label'>" . __('Lastname') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('lastname', ['class' => 'form-control', 'id' => 'lastname', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='email' class='col-sm-2 control-label'>" . __('Email') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('email', ['class' => 'form-control', 'id' => 'email', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='contact_no' class='col-sm-2 control-label'>" . __('Contact No') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('contact_no', ['class' => 'form-control', 'id' => 'contact_no', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='photo' class='col-sm-2 control-label'>" . __('Photo') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('photo', ['class' => 'form-control', 'id' => 'photo', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='is_active' class='col-sm-2 control-label'>" . __('Is Active') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('is_active', ['class' => 'form-control', 'id' => 'is_active', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='is_password_changed' class='col-sm-2 control-label'>" . __('Is Password Changed') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('is_password_changed', ['class' => 'form-control', 'id' => 'is_password_changed', 'label' => false]);                
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