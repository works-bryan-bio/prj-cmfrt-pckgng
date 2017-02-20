<div class="row">
    <div class="col-lg-12 mt-80">
        <div class="dropdown pull-right" style="margin:0px 14px 0 0;position: relative;right: 13px;">
            <button class="btn btn-primary dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                Action <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">        
                <li role="presentation"><?= $this->Html->link('<i class="fa fa-plus"></i> ' . __('Add New'), ['action' => 'add'], ['escape' => false]) ?></li>
                    </ul>
        </div>
        <h1 class="page-header" style="position: relative;left: 17px;"><?= __('Groups') ?></h1>
    </div>
</div>
<section class="content">
    <div class="ribbon-section">
      <img style="float:left;" src="<?php echo $this->Url->build("/webroot/images/ribbon.png"); ?>">
      <div class="ribbon-black" style=""><h3 style="margin-left: 65px;color: white;">Groups List</h3></div>
    </div>
    <br style="clear:both;" />
    <div class="panel panel-primary">
        <div class="table-responsive data-content">    
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr class="heading">
                        <th><?= $this->Paginator->sort('id') ?></th>
                        <th><?= $this->Paginator->sort('name') ?></th>
                        <th><?= $this->Paginator->sort('created') ?></th>
                        <th><?= $this->Paginator->sort('modified') ?></th>
                        <th class="actions no-border-right"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($groups as $group): ?>
                    <tr>
                        <td><?= $this->Number->format($group->id) ?></td>
                        <td><?= h($group->name) ?></td>                        
                        <td><?= date("Y-m-d H:i:s",strtotime($group->created)) ?></td>
                        <td><?= date("Y-m-d H:i:s",strtotime($group->modified)) ?></td>
                        <td class="actions">
                            <?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('View'), ['action' => 'view', $group->id],['class' => 'btn btn-sm btn-info','escape' => false]) ?>
                            <?= $this->Html->link('<i class="fa fa-pencil"></i> ' . __('Edit'), ['action' => 'edit', $group->id],['class' => 'btn btn-sm btn-info', 'escape' => false]) ?>
                            <?= $this->Html->link('<i class="fa fa-trash-o"></i> ' . __('Delete'), '#modal-'.$group->id,['data-toggle' => 'modal', 'class' => 'btn btn-sm btn-danger', 'escape' => false]) ?>
                            <!-- Delete Modal -->
                            <div id="modal-<?=$group->id?>" class="modal fade">
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
                                              ['action' => 'delete', $group->id],
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
