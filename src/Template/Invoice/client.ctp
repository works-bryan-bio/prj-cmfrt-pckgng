<?php
use Cake\ORM\TableRegistry;
$this->Shipments = TableRegistry::get('Shipments');
?>
<style>
.datepicker { z-index: 10000 !important;}
</style>
<div class="row">
    <div class="col-lg-12 mt-80" style="">        
        <h1 class="page-header"><?= __('Invoice') ?></h1>
    </div>
</div>
 <div class="ribbon-section">
      <img style="float:left;" src="<?php echo $this->Url->build("/webroot/images/ribbon.png"); ?>">
      <div class="ribbon-black" style="padding-top:0px !important;">
          <ul class="nav nav-tabs nav-justified">
            <li class="active"><a href="#pending" data-toggle="tab" style="height: 85px;border: 0px !important;font-size: 22px;color: white;border-radius: 0px;padding:26px;">Pending Invoice</a></li>
            <li><a href="#completed" data-toggle="tab" style="height: 85px;border: 0px !important;font-size: 22px;color: white;border-radius: 0px;padding:26px;">Completed Invoice</a></li>      
          </ul>
      </div>
    </div>
    <br style="clear:both;" />  
<section class="panel panel-default">
  <div class="panel-body">
    <div class="tab-content">
      <div class="tab-pane active" id="pending">
          <div class="table-responsive data-content">    
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr class="heading">
                      <th class="data-id"><?= $this->Paginator->sort('shipments_id' , __('Shipments')) ?></th>                      
                      <th class=""><?= $this->Paginator->sort('client_id' , __('Client')) ?></th>
                      <th class=""><?= $this->Paginator->sort('terms', __('Terms')) ?></th>
                      <th class="date-time"><?= $this->Paginator->sort('invoice_date', __('Invoice Date')) ?></th>
                      <th class="date-time"><?= $this->Paginator->sort('due_date', __('Invoice Due Date')) ?></th>
                      <th class=""><?= $this->Paginator->sort('description') ?></th>
                      <th class=""><?= $this->Paginator->sort( 'balance_due', __('Total Balance'))  ?></th>
                      <th class=""><?= $this->Paginator->sort('status') ?></th>
                      <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pendingInvoice as $invoice):    
                      // debug($invoice);
                      // exit;
                    ?>
                    <tr>
                        <td><?= $invoice->shipments_id . " - " . $invoice['shipment']['item_description'] ?></td>                        
                        <td><?= $invoice['client']['firstname'] ." ".$invoice['client']['lastname'] ?></td>
                        <td><?= $invoice->terms ?></td>
                        <td><?= h($invoice->invoice_date) ?></td>
                        <td><?= h($invoice->due_date) ?></td>
                        <td><?= $invoice->description ?></td>
                        <td><?= $invoice->balance_due ?></td>
                        <td>
                          <?php 
                            if( $invoice->status == 1 ){
                              echo "Pending";
                            }else{
                              echo "Completed";
                            }
                          ?>
                        </td>
                        <td class="actions">
                            <?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('View'), ['action' => 'view_client', $invoice->id],['title' => 'View', 'class' => 'btn btn-sm btn-info', 'escape' => false]) ?>
                            <?= $this->Html->link('<i class="fa fa-money"></i> ' . __('Payments'), '#modal-'. $invoice->id,['title' => 'Payments', 'class' => 'btn btn-sm btn-danger','data-toggle' => 'modal','escape' => false]) ?>
                            <!-- Delete Modal -->
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
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">                            
              <div class="col-sm-12 text-right text-center-xs">                
                <ul class="pagination pagination-sm m-t-none m-b-none">
                  <?= $this->Paginator->prev('«') ?>
                  <?= $this->Paginator->numbers() ?>
                  <?= $this->Paginator->next('»') ?>
                </ul>
              </div>
            </div>
        </footer> 
      </div>
      <div class="tab-pane" id="completed">
        <div class="table-responsive data-content">    
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr class="heading">
                      <th class="data-id"><?= $this->Paginator->sort('shipments_id' , __('Shipments')) ?></th>                      
                      <th class=""><?= $this->Paginator->sort('client_id' , __('Client')) ?></th>
                      <th class=""><?= $this->Paginator->sort('terms', __('Terms')) ?></th>
                      <th class="date-time"><?= $this->Paginator->sort('invoice_date', __('Invoice Date')) ?></th>
                      <th class="date-time"><?= $this->Paginator->sort('due_date', __('Invoice Due Date')) ?></th>
                      <th class=""><?= $this->Paginator->sort('description') ?></th>
                      <th class=""><?= $this->Paginator->sort( 'balance_due', __('Total Balance'))  ?></th>
                      <th class=""><?= $this->Paginator->sort('status') ?></th>
                      <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($completedInvoice as $invoice):    
                      // debug($invoice);
                      // exit;
                    ?>
                    <tr>
                        <td><?= $invoice->shipments_id . " - " . $invoice['shipment']['item_description'] ?></td>                        
                        <td><?= $invoice['client']['firstname'] ." ".$invoice['client']['lastname'] ?></td>
                        <td><?= $invoice->terms ?></td>
                        <td><?= h($invoice->invoice_date) ?></td>
                        <td><?= h($invoice->due_date) ?></td>
                        <td><?= $invoice->description ?></td>
                        <td><?= $invoice->balance_due ?></td>
                        <td>
                          <?php 
                            if( $invoice->status == 1 ){
                              echo "Pending";
                            }else{
                              echo "Completed";
                            }
                          ?>
                        </td>
                        <td class="actions">
                            <?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('View'), ['action' => 'view_client', $invoice->id],['title' => 'View', 'class' => 'btn btn-sm btn-info', 'escape' => false]) ?>
                           
                           
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">                            
              <div class="col-sm-12 text-right text-center-xs">                
                <ul class="pagination pagination-sm m-t-none m-b-none">
                  <?= $this->Paginator->prev('«') ?>
                  <?= $this->Paginator->numbers() ?>
                  <?= $this->Paginator->next('»') ?>
                </ul>
              </div>
            </div>
        </footer> 
      </div>    
    </div>
  </div>
</section>