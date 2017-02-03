<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('View Shipping Carrier') ?></h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> <?= __('Shipping Carriers') ?>
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
            <th><?= __('Name') ?></th>
            <td><?= h($shippingCarrier->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($shippingCarrier->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($shippingCarrier->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($shippingCarrier->modified) ?></td>
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
                <h3 class="panel-title"><?= __('Related Shipments') ?></h3>
            </div>
        </div>        
        <?php if (!empty($shippingCarrier->shipments)): ?>
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Item Description') ?></th>
                <th><?= __('Quantity') ?></th>
                <th><?= __('Boxes') ?></th>
                <th><?= __('Shipping Carrier Id') ?></th>
                <th><?= __('Shipping Service Id') ?></th>
                <th><?= __('Comments') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($shippingCarrier->shipments as $shipments): ?>
            <tr>
                <td><?= h($shipments->id) ?></td>
                <td><?= h($shipments->item_description) ?></td>
                <td><?= h($shipments->quantity) ?></td>
                <td><?= h($shipments->boxes) ?></td>
                <td><?= h($shipments->shipping_carrier_id) ?></td>
                <td><?= h($shipments->shipping_service_id) ?></td>
                <td><?= h($shipments->comments) ?></td>
                <td><?= h($shipments->created) ?></td>
                <td><?= h($shipments->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Shipments', 'action' => 'view', $shipments->id], ['class' => 'btn btn-info', 'escape' => false]) ?>
                    <?= $this->Html->link('<i class="fa fa-pencil"></i>', ['controller' => 'Shipments', 'action' => 'edit', $shipments->id], ['class' => 'btn btn-success', 'escape' => false]) ?>
                    <?= $this->Form->postLink('<i class="fa fa-trash"></i>', ['controller' => 'Shipments', 'action' => 'delete', $shipments->id], ['class' => 'btn btn-danger', 'escape' => false], ['confirm' => __('Are you sure you want to delete # {0}?', $shipments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>      
            </tbody>      
        </table>
    <?php endif; ?>
    </div>
</section>
