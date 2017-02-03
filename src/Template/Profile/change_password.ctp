<section class="content-header">
    <h1><?= __('Change Password') ?></h1>
    <ol class="breadcrumb">
        <li><?= $this->Html->link("<i class='fa fa-dashboard'></i>" . __("Home"), ['controller' => 'users', 'action' => 'dashboard'],['escape' => false]) ?></li>        
        <li class="active"><?= __('Change Password') ?></li>
    </ol>
</section>

<section class="content" style="background-color:#ffffff;">
    <!-- Main Row -->
    <div class="row">
        <section class="col-lg-12 ">
            <div class="box " >
                <div class="box-header">

                </div>
                <div class="box-body" style="margin-top:10px;">                    
                    <?= $this->Form->create(null,['id' => 'frm-default-add', 'data-toggle' => 'validator', 'role' => 'form','class' => 'form-horizontal']) ?>                    
                    <fieldset>                                                 
                        <?php
                                    echo "
                                    <div class='form-group'>
                                        <label for='start_date' class='col-sm-2 control-label'>" . __('Your email') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('email_address', ['value' => $user_data->email, 'readonly' => 'readonly', 'disabled' => 'disabled', 'class' => 'form-control', 'id' => 'email_address', 'required' => 'required', 'type' => 'email', 'label' => false]);                
                                    echo " </div></div>";
                                                           
                                                            echo "
                                    <div class='form-group'>
                                        <label for='password' class='col-sm-2 control-label'>" . __('New Password') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('password', ['value' => "", 'class' => 'form-control', 'id' => 'password', 'required' => 'required', 'label' => false]);                
                                    echo " </div></div>";    
                                    
                                                            echo "
                                    <div class='form-group'>
                                        <label for='repassword' class='col-sm-2 control-label'>" . __('Confirm Password') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('repassword', ['type' => 'password', 'value' => "", 'class' => 'form-control', 'id' => 'repassword', 'required' => 'required', 'label' => false]);                
                                    echo " </div></div>";
                        ?>
                    </fieldset>
                    <div class="form-group" style="margin-top: 80px;">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="action-fixed-bottom">
                                <?= $this->Form->button('<i class="fa fa-save"></i> ' . __('Update'),['name' => 'save', 'value' => 'save', 'class' => 'btn btn-success', 'escape' => false]) ?>                                
                                <?= $this->Html->link('<i class="fa fa-angle-left"> </i> ' . __('Back to profile'), ['controller' => 'profile', 'action' => 'index'],['class' => 'btn btn-warning', 'escape' => false]) ?>
                            </div>
                        </div>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </section>
    </div>
</section>