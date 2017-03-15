<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('View Message Detail') ?></h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> <?= __('Message Details') ?>
            </li>
            <li class="active">
                <i class="fa fa-eye"></i> <?= __('View') ?>
            </li>
        </ol>       
    </div>
</div>

<section class="content">   
    <table class="table table-striped table-bordered table-hover">
    <tbody>
        <tr>
            <td><?= __('User') ?></th>
            <td><?= $messageDetail->has('user') ? $this->Html->link($messageDetail->user->id, ['controller' => 'Users', 'action' => 'view', $messageDetail->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($messageDetail->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Message Id') ?></th>
            <td><?= $this->Number->format($messageDetail->message_id) ?></td>
        </tr>
        <tr>
            <th><?= __('User Group') ?></th>
            <td><?= $this->Number->format($messageDetail->user_group) ?></td>
        </tr>
    <tr>
        <th><?= __('Message Details') ?></th>
        <td><?= $this->Text->autoParagraph(h($messageDetail->message_details)); ?></td>        
    </tr>
        <tr>
            <th><?= __('Date Created') ?></th>
            <td><?= h($messageDetail->date_created) ?></td>
        </tr>
    </tbody>
    </table>

    <div class="form-group" style="margin-top: 80px;">
    <div class="col-sm-offset-2 col-sm-10">
        <div class="action-fixed-bottom">        
        <?= $this->Html->link('<i class="fa fa-angle-left"> </i> Back To list', ['action' => 'index'],['class' => 'btn btn-warning', 'escape' => false]) ?>
        </div>
    </div>
    </div>
</section>
