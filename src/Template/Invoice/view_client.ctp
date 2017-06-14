<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('View Invoice') ?></h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> <?= __('Invoice') ?>
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
            <td><?= $invoice->has('shipment') ? $this->Html->link($invoice->shipment->id, ['controller' => 'Shipments', 'action' => 'view', $invoice->shipment->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Client') ?></th>
            <td><?= $invoice->has('client') ? $this->Html->link($invoice->client->id, ['controller' => 'Clients', 'action' => 'view', $invoice->client->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Terms') ?></th>
            <td><?= h($invoice->terms) ?></td>
        </tr>
        <tr>
            <th><?= __('Product Services') ?></th>
            <td><?= h($invoice->product_services) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($invoice->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($invoice->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($invoice->quantity) ?></td>
        </tr>
        <tr>
            <th><?= __('Rate') ?></th>
             <?php $currency = "USD"; ?>
            <td><?= $this->Number->currency($invoice->rate, $currency) ?></td>
        </tr>
        <tr>
            <th><?= __('Balance Due') ?></th>
            <td><?= $this->Number->currency($invoice->balance_due,$currency) ?></td>
        </tr>
    <tr>
        <th><?= __('Billing Address') ?></th>
        <td><?= $this->Text->autoParagraph(h($invoice->billing_address)); ?></td>        
    </tr>
        <tr>
            <th><?= __('Invoice Date') ?></th>
            <td><?= h($invoice->invoice_date) ?></td>
        </tr>
         <tr>
            <th><?= __('Invoice Status') ?></th>
            <td>
                <?php 
                    if( $invoice->status == 1 ){
                        echo "<span class='label label-warning'>Pending</span>";
                    }else{
                        echo "<span class='label label-success'>Paid</span>";
                    }
                ?>
            </td>
        </tr>
        <?php if( $invoice->status == 2 ){ ?>
            <tr>
                <th><?= __('Date Paid') ?></th>
                <td><?= $invoice->date_completed->format("Y-m-d") ?></td>
            </tr>
        <?php } ?>
        <tr>
            <th><?= __('Due Date') ?></th>
            <td><?= h($invoice->due_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Date Created') ?></th>
            <td><?= h($invoice->date_created) ?></td>
        </tr>
    </tbody>
    </table>

    <div id="modal-<?=$invoice->id?>" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Payment Confirmation</h4>
          </div>
          <div class="modal-body wrapper-lg">
              <p><?= __('Are you sure you want to pay selected entry?') ?></p>
          </div>
          <div class="modal-footer">
              <button type="button" data-dismiss="modal" class="btn btn-default">No</button>
              <?= $this->Form->postLink(
                      'Yes',
                      ['action' => 'payment', $invoice->id],
                      ['class' => 'btn btn-danger', 'escape' => false]
                  )
              ?>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-offset-2 col-sm-10" style="padding-top: 30px;">
        <?php  
            echo $this->Html->link('<i class="fa fa-angle-left"> </i> Back To list', ['action' => 'client'],['class' => 'btn btn-warning', 'escape' => false]); 
        ?>
        <?php if($invoice->status <> 2){ ?>
         <?= $this->Html->link('<i class="fa fa-money"></i> ' . __('Payments'), '#modal-'. $invoice->id,['title' => 'Payments', 'class' => 'btn btn-danger','data-toggle' => 'modal','escape' => false]) ?>
            <?php } ?>
    </div>
    <br style="clear: both;" />

    <div class="form-group" style="margin-top: 60px;">
    <div class="col-sm-offset-2 col-sm-10">
        <div class="action-fixed-bottom">        
        <?= $this->Html->link('<i class="fa fa-angle-left"> </i> Back To list', ['action' => 'client'],['class' => 'btn btn-warning', 'escape' => false]) ?>
        </div>
    </div>
    </div>
    <div class="related">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= __('Related Invoice Details') ?></h3>
            </div>
        </div>        
        <?php if (!empty($invoice->invoice_details)): ?>
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Invoice Id') ?></th>
                <th><?= __('Product Service') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Quantity') ?></th>
                <th><?= __('Rate') ?></th>
                <th><?= __('Amount') ?></th>
                <th><?= __('Date Created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($invoice->invoice_details as $invoiceDetails): ?>
            <tr>
                <td><?= h($invoiceDetails->id) ?></td>
                <td><?= h($invoiceDetails->invoice_id) ?></td>
                <td><?= h($invoiceDetails->product_service) ?></td>
                <td><?= h($invoiceDetails->description) ?></td>
                <td><?= h($invoiceDetails->quantity) ?></td>
                <td><?= h($invoiceDetails->rate) ?></td>
                <td><?= h($invoiceDetails->amount) ?></td>
                <td><?= h($invoiceDetails->date_created) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'InvoiceDetails', 'action' => 'view', $invoiceDetails->id], ['class' => 'btn btn-info', 'escape' => false]) ?>
                    <?= $this->Html->link('<i class="fa fa-pencil"></i>', ['controller' => 'InvoiceDetails', 'action' => 'edit', $invoiceDetails->id], ['class' => 'btn btn-success', 'escape' => false]) ?>
                    <?= $this->Form->postLink('<i class="fa fa-trash"></i>', ['controller' => 'InvoiceDetails', 'action' => 'delete', $invoiceDetails->id], ['class' => 'btn btn-danger', 'escape' => false], ['confirm' => __('Are you sure you want to delete # {0}?', $invoiceDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>      
            </tbody>      
        </table>
    <?php endif; ?>
    </div>
</section>
