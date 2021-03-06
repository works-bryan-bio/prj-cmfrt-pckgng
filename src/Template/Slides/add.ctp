<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('Add Slide') ?></h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> <?= __('Slides') ?>
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
          <?= $this->Form->create($slide,['class' => 'form-horizontal']) ?>
                <fieldset>        
                    <?php
                                    echo "
                        <div class='form-group'>
                            <label for='title' class='col-sm-2 control-label'>" . __('Title') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('title', ['class' => 'form-control', 'id' => 'title', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='caption' class='col-sm-2 control-label'>" . __('Caption') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('caption', ['class' => 'form-control ckeditor', 'id' => 'caption', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='link' class='col-sm-2 control-label'>" . __('Link') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('link', ['class' => 'form-control', 'id' => 'link', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='thumbnail' class='col-sm-2 control-label'>" . __('Thumbnail') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('thumbnail', ['class' => 'form-control has-ck-finder', 'id' => 'thumbnail', 'readonly' => 'readonly', 'label' => false]);                
                        echo " </div></div>";                         
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