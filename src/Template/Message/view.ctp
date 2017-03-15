<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('View Message') ?></h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> <?= __('Message') ?>
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
            <td><?= __('Client') ?></th>
            <td><?= $message->has('client') ? $this->Html->link($message->client->id, ['controller' => 'Clients', 'action' => 'view', $message->client->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($message->id) ?></td>
        </tr>
    <tr>
        <th><?= __('Message Subject') ?></th>
        <td><?= $this->Text->autoParagraph(h($message->message_subject)); ?></td>        
    </tr>
        <tr>
            <th><?= __('Date Created') ?></th>
            <td><?= h($message->date_created) ?></td>
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
    <div class="related">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= __('Related Message Details') ?></h3>
            </div>
        </div>        
        <?php if (!empty($message->message_details)): ?>
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Message Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('User Group') ?></th>
                <th><?= __('Message Details') ?></th>
                <th><?= __('Date Created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($message->message_details as $messageDetails): ?>
            <tr>
                <td><?= h($messageDetails->id) ?></td>
                <td><?= h($messageDetails->message_id) ?></td>
                <td><?= h($messageDetails->user_id) ?></td>
                <td><?= h($messageDetails->user_group) ?></td>
                <td><?= h($messageDetails->message_details) ?></td>
                <td><?= h($messageDetails->date_created) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'MessageDetails', 'action' => 'view', $messageDetails->id], ['class' => 'btn btn-info', 'escape' => false]) ?>
                    <?= $this->Html->link('<i class="fa fa-pencil"></i>', ['controller' => 'MessageDetails', 'action' => 'edit', $messageDetails->id], ['class' => 'btn btn-success', 'escape' => false]) ?>
                    <?= $this->Form->postLink('<i class="fa fa-trash"></i>', ['controller' => 'MessageDetails', 'action' => 'delete', $messageDetails->id], ['class' => 'btn btn-danger', 'escape' => false], ['confirm' => __('Are you sure you want to delete # {0}?', $messageDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>      
            </tbody>      
        </table>
    <?php endif; ?>
    </div>
</section>
