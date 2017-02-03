<?php use Cake\Utility\Inflector; ?>
<style>
.filter-container{
    display: inline-block;
    width:70%;
}
div.input{
    margin-left:18px;
    display: inline-block;
}
</style>
<section class="content container">
    <div class="row" style="margin-top: 23px;min-height:250px;">
        <div class="row">
            <div class="filter-container">
                <?php
                    echo $this->Form->create(null, [
                        'action' => 'filter',
                        'type' => 'get',
                        'class' => 'form-horizontal'

                    ]);
                ?>
                <fieldset>
                    <div class="form-group">                        
                        <div class="col-sm-6">
                            <?= $this->Form->input('module_type',['class' => 'form-control', 'id' => 'name', 'label' => false, 'options' => $modules,'default' => 'all', 'type' => 'select']) ?>
                            <?= $this->Form->button('Filter',['class' => 'btn btn-success']); ?>
                        </div>
                    </div>        
                </fieldset> 
                <?php echo $this->Form->end();?>                
            </div>
        </div>
        <table class="table table-bordered">
            <tr class="info">
                <td><b>Version</b></td>
                <td><b>Module Name</b></td>
                <td><b>Module Type</b></td>
                <td><b>Description</b></td>
            </tr>
            <?php foreach($versions as $version){ ?>
            <tr>
                <td><?php echo $version->version;  ?></td>
                <td><?php echo $version->name;  ?></td>
                <td><?php echo $version->module_type->name;  ?></td>
                <td><?php echo $version->description;  ?></td>
            </tr>
            <?php } ?>
        </table>           
    </div>          
</section>