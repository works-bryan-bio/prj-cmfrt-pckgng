<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('View Inventory') ?></h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> <?= __('Inventory') ?>
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
            <td><?= __('Shipment') ?></th>
            <td><?= $inventory->has('shipment') ? $this->Html->link($inventory->shipment->id, ['controller' => 'Shipments', 'action' => 'view', $inventory->shipment->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Last Sent Order Date') ?></th>
            <td><?= h($inventory->last_sent_order_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Sent Destination') ?></th>
            <td><?= h($inventory->last_sent_destination) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($inventory->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Sent Quantity') ?></th>
            <td><?= $this->Number->format($inventory->sent_quantity) ?></td>
        </tr>
        <tr>
            <th><?= __('Remaining Quantity') ?></th>
            <td><?= $this->Number->format($inventory->remaining_quantity) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Sent Order Quantity') ?></th>
            <td><?= $this->Number->format($inventory->last_sent_order_quantity) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($inventory->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($inventory->modified) ?></td>
        </tr>
    </tbody>
    </table>

    <div class="form-group" style="margin-top: 80px;">
    <div class="col-sm-offset-2 col-sm-10">
        <div class="action-fixed-bottom">        
        <?php 
            if( $group_id == 1 ){
                echo $this->Html->link('<i class="fa fa-angle-left"> </i> Back To list', ['action' => 'index'],['class' => 'btn btn-warning', 'escape' => false]);
            }else{
                echo $this->Html->link('<i class="fa fa-angle-left"> </i> Back To list', ['action' => 'employee'],['class' => 'btn btn-warning', 'escape' => false]);
            }
        ?>        
        </div>
    </div>
    </div>
</section>
