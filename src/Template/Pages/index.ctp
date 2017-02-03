<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('Pages') ?></h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> <?= __('Pages') ?>
            </li>
        </ol>
        <div class="dropdown pull-right" style="margin:-117px 14px 0 0">
            <button class="btn btn-primary dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                Action <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">        
                <li role="presentation"><?= $this->Html->link('<i class="fa fa-plus"></i> ' . __('New Page'), ['action' => 'add'], ['escape' => false]) ?></li>
                    </ul>
        </div>
    </div>
</div>
<section class="content">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?= __('Pages List') ?><a class="pull-right btn btn-info btn-xs collapse-table" href="javascript:void(0);"><i class="glyphicon glyphicon glyphicon-minus"></i></a></h3>
        </div>
        <div class="table-responsive data-content">    
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr class="heading">
                        <th class="data-id"><?= $this->Paginator->sort('id') ?></th>
                        <th class=""><?= $this->Paginator->sort('title') ?></th>
                        <th class=""><?= $this->Paginator->sort('is_publish') ?></th>                        
                        <th class="date-time"><?= $this->Paginator->sort('created') ?></th>
                        <th class="date-time"><?= $this->Paginator->sort('modified') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pages as $page): ?>
                    <tr>
                        <td><?= $this->Number->format($page->id) ?></td>
                        <td><?= h($page->title) ?></td>
                        <td style="text-align:center;vertical-align:top;">
                            <?php 
                                if( $page->is_publish == 1 ){
                                    echo $this->Html->link('<i title="Set as Unpublish" class="glyphicon glyphicon-check"></i>','javascript:void(0);',['class' => 'btn btn-info btn-publish-update', 'update-id' => $page->id, 'base-url' => $this->Url->build('/pages/updatePublish', true), 'escape' => false]);
                                }else{
                                    echo $this->Html->link('<i title="Set as Publish" class="glyphicon glyphicon-remove"></i>','javascript:void(0);',['class' => 'btn btn-danger btn-publish-update', 'update-id' => $page->id, 'base-url' => $this->Url->build('/pages/updatePublish', true), 'escape' => false]);
                                }
                            ?>                            
                        </td>                        
                        <td><?= h($page->created) ?></td>
                        <td><?= h($page->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('View'), ['action' => 'view', $page->id],['title' => 'View', 'class' => 'btn btn-sm btn-info', 'escape' => false]) ?>
                            <?= $this->Html->link('<i class="fa fa-pencil"></i> ' . __('Edit'), ['action' => 'edit', $page->id],['title' => 'Edit', 'class' => 'btn btn-sm btn-info','escape' => false]) ?>                            
                            <?= $this->Html->link('<i class="fa fa-trash-o"></i> ' . __('Delete'), '#modal-'. $page->id,['title' => 'Delete', 'class' => 'btn btn-sm btn-danger','data-toggle' => 'modal','escape' => false]) ?>
                            <!-- Delete Modal -->
                            <div id="modal-<?=$page->id?>" class="modal fade">
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
                                              ['action' => 'delete', $page->id],
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
    <!-- Popup Modal for updating Publish -->
      <a id="trigger-modal-btn" href="#modal-publish" data-toggle="modal" style="display:none;">#</a>
      <div id="modal-publish" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title">Message</h4>
              </div>
              <div class="modal-body">
                  <div id="message-container"></div>
              </div>
              <div class="modal-footer">
                  <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
              </div>
            </div>
          </div>                              
      </div>
</section>
