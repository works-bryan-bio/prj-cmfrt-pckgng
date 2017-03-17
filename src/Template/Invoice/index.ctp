<style>
.datepicker { z-index: 10000 !important;}
.list-icon .col-md-1{
  padding: 0px;
}
.list-icon div{
    margin-right:42px;
}
.list-icon .btn-sm{
    padding:5px 0px;
    width:61px !important;
    margin-right: 42px;
    display: block;
}
hr{
  margin-top:5px;
  margin-bottom: 5px;
}
</style>
<div class="row">
    <div class="col-lg-12 mt-80">
        <div class="dropdown pull-right" style="margin:0px 14px 0 0;position: relative;right: 13px;">
            <button class="btn btn-primary dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                Action <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">        
                <li role="presentation"><?= $this->Html->link('<i class="fa fa-plus"></i> ' . __('New Invoice'), ['action' => 'add'], ['escape' => false]) ?></li>
                <li role="presentation"><?= $this->Html->link('<i class="fa fa-list-alt"></i> ' . __('List Shipments'), ['controller' => 'Shipments', 'action' => 'index'], ['escape' => false]) ?></li>
                <li role="presentation"><?= $this->Html->link('<i class="fa fa-plus"></i> ' . __('New Shipment'), ['controller' => 'Shipments', 'action' => 'add'], ['escape' => false]) ?></li>
                <li role="presentation"><?= $this->Html->link('<i class="fa fa-list-alt"></i> ' . __('List Clients'), ['controller' => 'Clients', 'action' => 'index'], ['escape' => false]) ?></li>
                <li role="presentation"><?= $this->Html->link('<i class="fa fa-plus"></i> ' . __('New Client'), ['controller' => 'Clients', 'action' => 'add'], ['escape' => false]) ?></li>
                <li role="presentation"><?= $this->Html->link('<i class="fa fa-list-alt"></i> ' . __('List Invoice Details'), ['controller' => 'InvoiceDetails', 'action' => 'index'], ['escape' => false]) ?></li>
                <li role="presentation"><?= $this->Html->link('<i class="fa fa-plus"></i> ' . __('New Invoice Detail'), ['controller' => 'InvoiceDetails', 'action' => 'add'], ['escape' => false]) ?></li>
                <?php if( $enable_export ){ ?>
                  <li role="presentation"><?= $this->Html->link('<i class="fa fa-file-excel-o"></i> ' . __('Export Data'), ['action' => 'export_to_excel'], ['escape' => false]) ?></li>
                <?php } ?>
            </ul>
        </div>
        <h1 class="page-header" style="padding-bottom: 25px !important;"><?= __('Groups') ?></h1>
    </div>
</div>
<section class="panel panel-default">
  <div class="panel-body">
    <div class="tab-content">
      <div class="tab-pane active" id="pending_orders">
          <div class="table-responsive data-content">    
            <table class="zero-config-datatable display">
                <thead>
                    <tr class="heading">
                      <th style="text-align:center;width:10px;">Actions</th>                      
                      <th class="data-id">ID</th>
                      <th class="">Shipment ID</th>
                      <th class="">Client ID</th>
                      <th class="">Terms</th>
                      <th class="">Status</th>
                      <th class="">Invoice Date</th>
                      <th class="">Due Date</th>
                      <th class="">Product Services</th>                     
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($invoiceList as $invoice): ?>
                    <tr>
                      <td class="no-border-right table-actions">

                            <div class="dropdown">
                              <button class="btn btn-primary dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                                  Action <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">   
                                  <li role="presentation"><?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('View'), ['action' => 'view', $invoice->id],['title' => 'View', 'escape' => false]) ?></li>
                                  <li role="presentation"><?= $this->Html->link('<i class="fa fa-pencil"></i> ' . __('Edit'), ['action' => 'edit', $invoice->id],['title' => 'Edit', 'escape' => false]) ?></li>                         
                                  <li role="presentation"><?= $this->Html->link('<i class="fa fa-trash-o"></i> ' . __('Delete'), '#modal-'. $invoice->id,['title' => 'Delete', 'data-toggle' => 'modal','escape' => false]) ?></li>
                              </ul>
                            </div>                            
                            <!-- Delete Modal -->
                            <div id="modal-<?=$invoice->id?>" class="modal fade">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                      <h4 class="modal-title">Delete Confirmation</h4>
                                  </div>
                                  <div class="modal-body wrapper-lg">
                                      <p><?= __('Are you sure you want to delete selected entry?') ?></p>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" data-dismiss="modal" class="btn btn-default">No</button>
                                      <?= $this->Form->postLink(
                                              'Yes',
                                              ['action' => 'delete', $invoice->id],
                                              ['class' => 'btn btn-danger', 'escape' => false]
                                          )
                                      ?>
                                  </div>
                                </div>
                              </div>
                            </div>
                      </td>                      
                      <td><?= $this->Number->format($invoice->id) ?></td>
                      <td><?= $invoice->has('shipment') ? $this->Html->link($invoice->shipment->id ." - ". $invoice->description, ['controller' => 'Shipments', 'action' => 'view', $invoice->shipment->id]) : '' ?></td>
                      <td><?= $invoice->has('client') ? $this->Html->link($invoice->client->firstname ." ". $invoice->client->lastname , ['controller' => 'Clients', 'action' => 'view', $invoice->client->id]) : '' ?></td>
                      <td><?= h($invoice->terms) ?></td>
                      <td><?php  if($invoice->status == 1) { echo "Pending"; }else{ echo "Completed"; } ?></td>
                      <td><?= h($invoice->invoice_date) ?></td>
                      <td><?= h($invoice->due_date) ?></td>
                      <td><?= h($invoice->product_services) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>        
      </div>    
    </div>
  </div>
</section>
