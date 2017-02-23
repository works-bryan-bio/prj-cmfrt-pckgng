<div class="row">
    <div class="col-lg-12 mt-80">
        <div class="dropdown pull-right" style="margin:0px 14px 0 0;">
            <button class="btn btn-primary dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                Action <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">        
                <li role="presentation"><?= $this->Html->link('<i class="fa fa-plus"></i> ' . __('New Shipping Carrier'), ['action' => 'add'], ['escape' => false]) ?></li>
                        <li role="presentation"><?= $this->Html->link('<i class="fa fa-list-alt"></i> ' . __('List Shipments'), ['controller' => 'Shipments', 'action' => 'index'], ['escape' => false]) ?></li>
                <li role="presentation"><?= $this->Html->link('<i class="fa fa-plus"></i> ' . __('New Shipment'), ['controller' => 'Shipments', 'action' => 'add'], ['escape' => false]) ?></li>
                    </ul>
        </div>
        <h1 class="page-header" style="padding-bottom: 25px !important;"><?= __('Shipping Carriers') ?></h1>
    </div>
</div>
<section class="content">
    <div class="ribbon-section" style="padding-top:0px !important;">
      <div class="ribbon-black" style=""><h3 class="ribbon-h3">Shipping Carriers List</h3></div>
    </div>

         <br style="clear:both;" />
    <div class="panel panel-primary">
    

        <div class="table-responsive data-content">    
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr class="heading">
                                                        <th class="data-id"><?= $this->Paginator->sort('id') ?></th>
                                                        <th class=""><?= $this->Paginator->sort('name') ?></th>
                                                        <th class="date-time"><?= $this->Paginator->sort('created') ?></th>
                                                        <th class="date-time"><?= $this->Paginator->sort('modified') ?></th>
                                <th class="actions no-border-right"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($shippingCarriers as $shippingCarrier): ?>
                    <tr>
                                <td><?= $this->Number->format($shippingCarrier->id) ?></td>
                                <td><?= h($shippingCarrier->name) ?></td>
                                <td><?= h($shippingCarrier->created) ?></td>
                                <td><?= h($shippingCarrier->modified) ?></td>
                                <td class="actions" style="">
                            <?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('View'), ['action' => 'view', $shippingCarrier->id],['title' => 'View', 'class' => 'btn btn-sm btn-info', 'escape' => false]) ?>
                            <?= $this->Html->link('<i class="fa fa-pencil"></i> ' . __('Edit'), ['action' => 'edit', $shippingCarrier->id],['title' => 'Edit', 'class' => 'btn btn-sm btn-info','escape' => false]) ?>                            
                            <?= $this->Html->link('<i class="fa fa-trash-o"></i> ' . __('Delete'), '#modal-'. $shippingCarrier->id,['title' => 'Delete', 'class' => 'btn btn-sm btn-danger','data-toggle' => 'modal','escape' => false]) ?>
                            <!-- Delete Modal -->
                            <div id="modal-<?=$shippingCarrier->id?>" class="modal fade">
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
                                              ['action' => 'delete', $shippingCarrier->id],
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
