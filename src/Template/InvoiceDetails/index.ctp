<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('Invoice Details') ?></h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> <?= __('Invoice Details') ?>
            </li>
        </ol>
        <div class="dropdown pull-right" style="margin:-117px 14px 0 0">
            <button class="btn btn-primary dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                Action <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">        
                <li role="presentation"><?= $this->Html->link('<i class="fa fa-plus"></i> ' . __('New Invoice Detail'), ['action' => 'add'], ['escape' => false]) ?></li>
                    </ul>
        </div>
    </div>
</div>
<section class="content">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?= __('Invoice Details List') ?><a class="pull-right btn btn-info btn-xs collapse-table" href="javascript:void(0);"><i class="glyphicon glyphicon glyphicon-minus"></i></a></h3>
        </div>
        <div class="table-responsive data-content">    
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr class="heading">
                                                        <th class="data-id"><?= $this->Paginator->sort('id') ?></th>
                                                        <th class=""><?= $this->Paginator->sort('invoice_id') ?></th>
                                                        <th class=""><?= $this->Paginator->sort('product_service') ?></th>
                                                        <th class=""><?= $this->Paginator->sort('description') ?></th>
                                                        <th class=""><?= $this->Paginator->sort('quantity') ?></th>
                                                        <th class=""><?= $this->Paginator->sort('rate') ?></th>
                                                        <th class=""><?= $this->Paginator->sort('amount') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($invoiceDetails as $invoiceDetail): ?>
                    <tr>
                                <td><?= $this->Number->format($invoiceDetail->id) ?></td>
                                <td><?= $this->Number->format($invoiceDetail->invoice_id) ?></td>
                                <td><?= h($invoiceDetail->product_service) ?></td>
                                <td><?= h($invoiceDetail->description) ?></td>
                                <td><?= $this->Number->format($invoiceDetail->quantity) ?></td>
                                <td><?= $this->Number->format($invoiceDetail->rate) ?></td>
                                <td><?= $this->Number->format($invoiceDetail->amount) ?></td>
                                <td class="actions">
                            <?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('View'), ['action' => 'view', $invoiceDetail->id],['title' => 'View', 'class' => 'btn btn-sm btn-info', 'escape' => false]) ?>
                            <?= $this->Html->link('<i class="fa fa-pencil"></i> ' . __('Edit'), ['action' => 'edit', $invoiceDetail->id],['title' => 'Edit', 'class' => 'btn btn-sm btn-info','escape' => false]) ?>                            
                            <?= $this->Html->link('<i class="fa fa-trash-o"></i> ' . __('Delete'), '#modal-'. $invoiceDetail->id,['title' => 'Delete', 'class' => 'btn btn-sm btn-danger','data-toggle' => 'modal','escape' => false]) ?>
                            <!-- Delete Modal -->
                            <div id="modal-<?=$invoiceDetail->id?>" class="modal fade">
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
                                              ['action' => 'delete', $invoiceDetail->id],
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
    </div>    
</section>
