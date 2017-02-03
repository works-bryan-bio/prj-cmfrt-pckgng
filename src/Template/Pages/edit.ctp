<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('Edit Page') ?></h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> <?= __('Pages') ?>
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
          <?= $this->Form->create($page,['class' => 'form-horizontal']) ?>
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
                            <label for='body' class='col-sm-2 control-label'>" . __('Body') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('body', ['class' => 'form-control ckeditor', 'id' => 'body', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='meta_title' class='col-sm-2 control-label'>" . __('Meta Title') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('meta_title', ['class' => 'form-control', 'id' => 'meta_title', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='meta_keyword' class='col-sm-2 control-label'>" . __('Meta Keyword') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('meta_keyword', ['class' => 'form-control', 'id' => 'meta_keyword', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='meta_description' class='col-sm-2 control-label'>" . __('Meta Description') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->input('meta_description', ['class' => 'form-control', 'id' => 'meta_description', 'label' => false]);                
                        echo " </div></div>";    
                        
                                    echo "
                        <div class='form-group'>
                            <label for='is_publish' class='col-sm-2 control-label'>" . __('Is Publish') . "</label>
                            <div class='col-sm-6'>";
                            echo $this->Form->select('is_publish',["1" => "Yes", "0" => "No"],['default' => $page->is_publish, 'class' => 'form-control', 'id' => 'is_publish', 'label' => false]);
                        echo " </div></div>";    
                        
                                ?>
                </fieldset>
                <div class="form-group" style="margin-top: 80px;">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="action-fixed-bottom">
                            <?= $this->Form->button('<i class="fa fa-save"></i> ' . __('Save'),['name' => 'save', 'value' => 'save', 'class' => 'btn btn-success', 'escape' => false]) ?>
                            <?= $this->Form->button('<i class="fa fa-edit"></i> ' . __('Save and Continue editing'),['name' => 'save', 'value' => 'edit', 'class' => 'btn btn-info', 'escape' => false]) ?>
                            <?= $this->Html->link('<i class="fa fa-angle-left"> </i> ' . __('Back To list'), ['action' => 'index'],['class' => 'btn btn-warning', 'escape' => false]) ?>
                        </div>
                    </div>
                </div>    
                <?= $this->Form->end() ?>          
        </div>
    </section>
  </div>
</div>