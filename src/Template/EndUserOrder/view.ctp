<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('View End User Order') ?></h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> <?= __('End User Order') ?>
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
            <td><?= $endUserOrder->has('client') ? $this->Html->link($endUserOrder->client->id, ['controller' => 'Clients', 'action' => 'view', $endUserOrder->client->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($endUserOrder->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= h($endUserOrder->address) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($endUserOrder->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Shipping Service Id') ?></th>
            <td><?= $this->Number->format($endUserOrder->shipping_service_id) ?></td>
        </tr>
    <tr>
        <th><?= __('Comments') ?></th>
        <td><?= $this->Text->autoParagraph(h($endUserOrder->comments)); ?></td>        
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
