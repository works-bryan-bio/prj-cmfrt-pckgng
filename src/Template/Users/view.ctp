<section class="content-header">
    <h1><?= h($user->username) ?></h1>
</section>

<section class="content">
    <table class="table table-striped table-bordered table-hover">
        <tbody>
            <tr>
                <td width="140"><h6 class="subheader"><?= __('Username') ?></h6></td>
                <td><h6><?= h($user->username) ?></h6></td>
            </tr>    
            <tr>
                <td><h6 class="subheader"><?= __('Group') ?></h6></td>
                <td><h6><?= h($user->group->name) ?></h6></td>
            </tr>
            <tr>
                <td><h6 class="subheader"><?= __('Created') ?></h6></td>
                <td><h6><?= date("Y-m-d H:i:s",strtotime($user->created)) ?></h6></td>
            </tr>
            <tr>
                <td><h6 class="subheader"><?= __('Modified') ?></h6></td>
                <td><h6><?= date("Y-m-d H:i:s",strtotime($user->modified)) ?></h6></td>
            </tr>                                        
        </tbody>
    </table>
</section>

<div class="form-group" style="margin-top: 80px;">
    <div class="col-sm-offset-2 col-sm-10">
        <div class="action-fixed-bottom">        
        <?= $this->Html->link('<i class="fa fa-angle-left"> </i> Back To list', ['action' => 'index'],['class' => 'btn btn-warning', 'escape' => false]) ?>
        </div>
    </div>
</div>