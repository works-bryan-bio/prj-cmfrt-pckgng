<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('Edit Profile') ?></h1>
        <ol class="breadcrumb" style="padding-left: 25px;background-color: #f2ece1 !important;">
            <li  style="color: black;"><i class="fa fa-user" style="color: black;"></i> <?= __('Profile') ?></li>
            <li class="active"><i class="fa fa-pencil"  style="color: black;"></i> <?= __('Edit') ?></li>
        </ol>
    </div>
</div>

<div class="row" style="border-top: 4px solid #f39c12 !important;"> 
 <div class="box" >  
      <div class="col-lg-12">
        <section class="panel panel-primary pos-rlt clearfix" style="padding-top: 0px;margin-top: 15px;">
          
            <div class="panel-body clearfix">          
              <?= $this->Form->create($userEntity,['class' => 'form-horizontal']) ?>
                    <fieldset>                                                 
                        <?php
                                echo "
                                <div class='form-group'>
                                    <label for='start_date' class='col-sm-2 control-label'>" . __('Email') . "</label>
                                    <div class='col-sm-6'>";
                                    echo $this->Form->input('email', ['class' => 'form-control', 'id' => 'email_address', 'required' => 'required', 'type' => 'email', 'label' => false]);                
                                echo " </div></div>";
                                                       
                                                        echo "
                                <div class='form-group'>
                                    <label for='firstname' class='col-sm-2 control-label'>" . __('Firstname') . "</label>
                                    <div class='col-sm-6'>";
                                    echo $this->Form->input('firstname', ['class' => 'form-control', 'id' => 'firstname', 'required' => 'required', 'label' => false]);                
                                echo " </div></div>";    
                                
                                                        echo "
                                <div class='form-group'>
                                    <label for='lastname' class='col-sm-2 control-label'>" . __('Lastname') . "</label>
                                    <div class='col-sm-6'>";
                                    echo $this->Form->input('lastname', ['class' => 'form-control', 'id' => 'lastname', 'required' => 'required', 'label' => false]);                
                                echo " </div></div>";    
                                
                                                        echo "
                                <div class='form-group'>
                                    <label for='mi' class='col-sm-2 control-label'>" . __('Middlename') . "</label>
                                    <div class='col-sm-6'>";
                                    echo $this->Form->input('middlename', ['class' => 'form-control', 'id' => 'mi', 'label' => false]);                
                                echo " </div></div>";    
                                
                                                        echo "
                                <div class='form-group'>
                                    <label for='ssn' class='col-sm-2 control-label'>" . __('Contact Number') . "</label>
                                    <div class='col-sm-6'>";
                                    echo $this->Form->input('contact_no', ['class' => 'form-control', 'id' => 'ssn', 'label' => false]);                
                                echo " </div></div>";    
                        ?>
                        </fieldset>
                    <div class="form-group" style="margin-top: 80px;">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="action-fixed-bottom">
                                <?= $this->Form->button('<i class="fa fa-save"></i> ' . __('Save'),['name' => 'save', 'value' => 'save', 'class' => 'btn btn-success', 'escape' => false]) ?>                            
                                <?= $this->Html->link('<i class="fa fa-angle-left"> </i> ' . __('Back'), ['action' => 'index'],['class' => 'btn btn-warning', 'escape' => false]) ?>
                            </div>
                        </div>
                    </div>    
                    <?= $this->Form->end() ?>          
            </div>
        </section>
      </div>
    </div>
</div>