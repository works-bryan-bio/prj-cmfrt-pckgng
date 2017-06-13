<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('View Invoice') ?></h1>           
    </div>
</div>

<section class="content">   
    <div class="ribbon-section">
      <img style="float:left;" src="<?php echo $this->Url->build("/webroot/images/ribbon.png"); ?>">
      <div class="ribbon-black" style=""><h3 style="margin-left: 65px;color: white;">Invoice Details</h3></div>
    </div>
    <br style="clear:both;" />
    <div class="panel panel-primary">
        <div class="table-responsive data-content">    
            <table class="table table-striped b-t b-light">
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
                        <td><?= $this->Number->format($invoice->rate) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Balance Due') ?></th>
                        <td><?= $this->Number->format($invoice->balance_due) ?></td>
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
                <?php  echo $this->Html->link('<i class="fa fa-angle-left"> </i> Back To list', ['controller' => 'invoice'],['class' => 'btn btn-warning', 'escape' => false]); ?>
                <?php if($invoice->status <> 2){ ?>
                 <?= $this->Html->link('<i class="fa fa-money"></i> ' . __('Payments'), '#modal-'. $invoice->id,['title' => 'Payments', 'class' => 'btn btn-danger','data-toggle' => 'modal','escape' => false]) ?>
                    <?php } ?>
            </div>



        </div>        
    </div>   
</section>
