<div class="row">
    <div class="col-lg-12 mt-80">
        <div class="dropdown pull-right" style="position: relative;right: 26px;">
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
            </ul>
        </div>
        <h1 class="page-header" style="padding-left: 20px;"><?= __('Invoice') ?></h1>
    </div>
</div>
<section class="content">
     <div class="ribbon-section" style="padding-top:0px !important;">
      <div class="ribbon-black" style=""><h3 class="ribbon-h3">Invoice List</h3></div>
    </div>
    <br style="clear:both;" />
    <div class="panel panel-primary">
        <div class="table-responsive data-content">    
            <table class="zero-config-datatable display">
                <thead>
                    <tr class="heading">
                      <th class="data-id">ID<?= $this->Paginator->sort('id') ?></th>
                      <th class="">Shipment ID</th>
                      <th class="">Client ID</th>
                      <th class="">Terms</th>
                      <th class="">Status</th>
                      <th class="">Invoice Date</th>
                      <th class="">Due Date</th>
                      <th class="">Product Services</th>
                      <th class="actions">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($invoice as $invoice): ?>
                    <tr>
                        <td><?= $this->Number->format($invoice->id) ?></td>
                        <td><?= $invoice->has('shipment') ? $this->Html->link($invoice->shipment->id ." - ". $invoice->description, ['controller' => 'Shipments', 'action' => 'view', $invoice->shipment->id]) : '' ?></td>
                        <td><?= $invoice->has('client') ? $this->Html->link($invoice->client->firstname ." ". $invoice->client->lastname , ['controller' => 'Clients', 'action' => 'view', $invoice->client->id]) : '' ?></td>
                        <td><?= h($invoice->terms) ?></td>
                        <td><?php  if($invoice->status == 1) { echo "Pending"; }else{ echo "Completed"; } ?></td>
                        <td><?= h($invoice->invoice_date) ?></td>
                        <td><?= h($invoice->due_date) ?></td>
                        <td><?= h($invoice->product_services) ?></td>
                        <td class="actions">
                            <?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('View'), ['action' => 'view', $invoice->id],['title' => 'View', 'class' => 'btn btn-sm btn-info', 'escape' => false]) ?>
                            <?= $this->Html->link('<i class="fa fa-pencil"></i> ' . __('Edit'), ['action' => 'edit', $invoice->id],['title' => 'Edit', 'class' => 'btn btn-sm btn-info','escape' => false]) ?>                            
                            <?= $this->Html->link('<i class="fa fa-trash-o"></i> ' . __('Delete'), '#modal-'. $invoice->id,['title' => 'Delete', 'class' => 'btn btn-sm btn-danger','data-toggle' => 'modal','escape' => false]) ?>
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
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>            
        </div>        
    </div>    
</section>
