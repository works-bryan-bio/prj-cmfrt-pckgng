
<section class="content-header">
    <h1><?= __('User Profile') ?></h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo $base_url; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?= __('User Profile') ?></li>
    </ol>
</section>

<section class="content" style="background-color:#ffffff;">
    <!-- Main Row -->
    <div class="row">            
        <div class="col-md-2">
            <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile" style="padding:5px;">
              <?php 
                if( $userEntity->photo != '' ){
                    $user_photo = $this->Url->build("/webroot/upload/users/" . $userEntity->id . "/" . $userEntity->photo);            
                }else{
                    $user_photo = $this->Url->build("/webroot/images/default_user.png");
                }
              ?>
              <img style="height:128px;width:128px;margin:0 auto;" src="<?php echo $user_photo; ?>" alt="User Avatar" class="profile-user-img img-responsive img-circle">                
              <br />
              <a href="<?php echo $this->Url->build(['controller' => 'profile', 'action' => 'edit']); ?>" class="btn btn-primary btn-sm btn-block"><b><i class="fa fa-user"></i> Edit Profile</b></a>
              <a href="<?php echo $this->Url->build(['controller' => 'profile', 'action' => 'change_password']); ?>" class="btn btn-primary btn-sm btn-block"><b><i class="fa fa-lock"></i> Change Password</b></a>              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-10">

          <!-- Personal Info Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Personal Information</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Name</strong>
              <p class="text-muted">
                <?php echo $userEntity->firstname . " " . $userEntity->middlename . " " . $userEntity->lastname; ?>
              </p>
              <hr>
              <strong><i class="fa fa-globe margin-r-5"></i> Email</strong>
              <p class="text-muted"><?php echo $userEntity->email; ?></p>              
              <hr>                            
              <strong><i class="fa fa-phone margin-r-5"></i> Contact Information</strong>
              <p class="text-muted"><?php echo $userEntity->contact_no; ?></p>              
            </div>
            <!-- /.box-body -->
            <!-- Other Info Box -->
          
          <!-- /.box -->
        </div>
        </div>
        <div id="modal-change-avatar" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Change Avatar</h4>
                </div>
                <?= $this->Form->create(null,[
                    'url' => ['action' => 'change_profile_photo'],
                    'class' => 'form-horizontal',
                    'type' => 'file',
                    'enctype' => 'multipart/form-data'            
                ]) ?>
                <div class="modal-body">
                    <div class="form-group">                      
                      <div class="col-sm-10">
                        <?php echo $this->Form->input('photo', ['type' => 'file', 'id' => 'photo', 'class' => 'filestyle', 'data-classButton' => 'btn btn-default', 'data-icon' => false, 'data-classInput' => 'form-control inline v-middle input-s', 'label' => false]); ?>                
                      </div>
                    </div>
                </div>
                <div class="modal-footer">            
                    <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
                    <?= $this->Form->button( __('Upload'),['name' => 'save', 'value' => 'save', 'class' => 'btn btn-info', 'escape' => false]) ?>
                </div>
                <?= $this->Form->end() ?>
              </div>
            </div>                              
        </div>       
    </div>
</section>