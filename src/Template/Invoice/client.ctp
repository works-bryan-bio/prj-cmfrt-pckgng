<?php
use Cake\ORM\TableRegistry;
$this->Shipments = TableRegistry::get('Shipments');
?>
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
.table-actions .btn{
  width:159px;
}
hr{
  margin-top:5px;
  margin-bottom: 5px;
}
</style>
<div class="row">
    <div class="col-lg-12 mt-80" style="">        
        <h1 class="page-header"><?= __('Invoice') ?></h1>
    </div>
</div>
 <div class="ribbon-section">
      <div class="ribbon-black" style="padding-top:0px !important;">
          <ul class="nav nav-tabs nav-justified">
            <li class="active"><a href="#pending" data-toggle="tab" class="ribbon-li">Pending Invoice</a></li>
            <li><a href="#completed" data-toggle="tab" class="ribbon-li">Completed Invoice</a></li>      
          </ul>
      </div>
    </div>
    <br style="clear:both;" />  
<section class="panel panel-default">
  <div class="panel-body">
    <div class="tab-content">
      <div class="tab-pane active" id="pending">
          <div class="table-responsive data-content">    
            <table class="zero-config-datatable display">
                <thead>
                    <tr class="heading">
                      <th style="text-align:center;">Actions</th>
                      <th class="data-id" style="width:140px;">Shipment</th>                      
                      <th class="" style="width:140px;">Client</th>
                      <th class="" style="width:140px;">Terms</th>
                      <th class="date-time" style="width:140px;">Invoice Date</th>
                      <th class="date-time" style="width:140px;">Invoice Due Date</th>
                      <th class="" style="width:140px;">Description</th>
                      <th class="" style="width:140px;">Total Balance</th>
                      <th class="" style="width:140px;">Status</th>                      
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pendingInvoice as $invoice):    
                      // debug($invoice);
                      // exit;
                    ?>
                    <tr>
                        <td class="no-border-right table-actions">
                            <div class="dropdown">
                              <button class="btn btn-primary dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                                  Action <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">        
                                  <li role="presentation"><?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('View'), ['action' => 'view_client', $invoice->id],['title' => 'View', 'escape' => false]) ?></li>
                                  <li role="presentation"><?= $this->Html->link('<i class="fa fa-money"></i> ' . __('Payments'), '#modal-'. $invoice->id,['title' => 'Payments', 'data-toggle' => 'modal','escape' => false]) ?></li>                                
                              </ul>
                            </div>                            

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
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>        
      </div>
      <div class="tab-pane" id="completed">
        <div class="table-responsive data-content">    
            <table class="zero-config-datatable display">
                <thead>
                    <tr class="heading">
                      <th style="text-align:center;">Actions</th>
                      <th class="data-id" style="width:140px;">Shipment</th>                      
                      <th class="" style="width:140px;">Client</th>
                      <th class="" style="width:140px;">Terms</th>
                      <th class="date-time" style="width:140px;">Invoice Date</th>
                      <th class="date-time" style="width:140px;">Invoice Due Date</th>
                      <th class="" style="width:140px;">Description</th>
                      <th class="" style="width:140px;">Total Balance</th>
                      <th class="" style="width:140px;">Status</th>                      
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($completedInvoice as $invoice):    
                      // debug($invoice);
                      // exit;
                    ?>
                    <tr>
                        <td class="no-border-right table-actions">
                            <div class="dropdown">
                              <button class="btn btn-primary dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                                  Action <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">        
                                  <li role="presentation"><?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('View'), ['action' => 'view_client', $invoice->id],['title' => 'View', 'escape' => false]) ?></li>                                  
                              </ul>
                            </div>
                        </td>
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
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>        
      </div>    
    </div>
  </div>
</section>