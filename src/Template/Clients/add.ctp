<style>
h4{
    padding:10px;
    background-color: #337AB7;
    color:#ffffff;
}
</style>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('Add Client') ?></h1>
        <ol class="breadcrumb">
            <li>
                <i class="glyphicon glyphicon-user"></i> <?= __('Clients') ?>
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
          <?= $this->Form->create($client,['class' => 'form-horizontal', 'id' => 'frm-add-client', 'data-toggle' =>"validator"]) ?>
                <fieldset>        
                    <?php

                         echo "
                        <h4>User Information</h4>
                        <div class='form-group'>
                            <label for='firstname' class='col-sm-2 control-label'>" . __('Company Name<span style="color:red">*</span>') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('company_name', ['class' => 'form-control', 'id' => 'company_name', 'label' => false]);                
                        echo "<div class='help-block with-errors'></div>
                         </div></div>";    

                        echo "
                        <div class='form-group'>
                            <label for='firstname' class='col-sm-2 control-label'>" . __('First Name<span style="color:red">*</span>') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('firstname', ['class' => 'form-control', 'id' => 'firstname', 'label' => false]);                
                        echo "<div class='help-block with-errors'></div>
                         </div></div>";    

                        echo "
                        <div class='form-group'>
                            <label for='lastname' class='col-sm-2 control-label'>" . __('Last Name<span style="color:red">*</span>') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('lastname', ['class' => 'form-control', 'id' => 'lastname', 'label' => false]);                
                        echo "<div class='help-block with-errors'></div>
                         </div></div>";    

                        echo "
                        <div class='form-group'>
                            <label for='middlename' class='col-sm-2 control-label'>" . __('Middle Name') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('middlename', ['class' => 'form-control', 'id' => 'middlename', 'label' => false]);                
                        echo "<div class='help-block with-errors'></div>
                         </div></div>";   

                        echo "
                        <div class='form-group'>
                            <label for='email' class='col-sm-2 control-label'>" . __('Email Address<span style="color:red">*</span>') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('email', ['type' => 'email', 'class' => 'form-control', 'id' => 'email', 'label' => false]);                
                        echo "<div class='help-block with-errors'></div>
                         </div></div>";   

                        echo "
                        <div class='form-group'>
                            <label for='contact_no' class='col-sm-2 control-label'>" . __('Contact No.') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('contact_no', ['class' => 'form-control', 'id' => 'contact_no', 'label' => false, 'maxLength' => 10]);                
                        echo "<div class='help-block with-errors'></div>
                         </div></div>";

                         echo "
                        <div class='form-group'>
                            <label for='address' class='col-sm-2 control-label'>" . __('Address') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('address', ['type' => 'textarea', 'class' => 'form-control', 'id' => 'address', 'label' => false]);                
                        echo "<div class='help-block with-errors'></div>
                         </div></div>";   

                         echo "
                        <div class='form-group'>
                            <label for='city' class='col-sm-2 control-label'>" . __('City') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('city', ['class' => 'form-control', 'id' => 'city', 'label' => false]);                
                        echo "<div class='help-block with-errors'></div>
                         </div></div>";

                         echo "
                        <div class='form-group'>
                            <label for='state' class='col-sm-2 control-label'>" . __('State') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('state', ['class' => 'form-control', 'id' => 'state', 'label' => false]);                
                        echo "<div class='help-block with-errors'></div>
                         </div></div>";

                         echo "
                        <div class='form-group'>
                            <label for='zip_code' class='col-sm-2 control-label'>" . __('Zip') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('zip_code', ['class' => 'form-control', 'id' => 'zip_code', 'label' => false]);                
                        echo "<div class='help-block with-errors'></div>
                         </div></div>";

                        echo "
                        <h4>Account Details</h4>
                        <div class='form-group'>
                            <label for='username' class='col-sm-2 control-label'>" . __('Username<span style="color:red">*</span>') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('username', ['class' => 'form-control', 'id' => 'username', 'label' => false]);                
                        echo "<div class='help-block with-errors'></div>
                         </div></div>";   
                        
                        echo "
                        <div class='form-group'>
                            <label for='password' class='col-sm-2 control-label'>" . __('Password<span style="color:red">*</span>') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('password', ['type' => 'password',  'class' => 'form-control', 'id' => 'password', 'label' => false]);                
                        echo "<div class='help-block with-errors'></div>
                         </div></div>";   

                        echo "
                        <div class='form-group'>
                            <label for='confirm_password' class='col-sm-2 control-label'>" . __('Confirm Password<span style="color:red">*</span>') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('confirm_password', ['type' => 'password', 'data-match-error' => "Password does not match.", 'data-match' => "#password", 'class' => 'form-control', 'id' => 'confirm_password', 'label' => false]);                
                        echo "<div class='help-block with-errors'></div>
                         </div></div>";  
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