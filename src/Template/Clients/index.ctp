<div class="row">
    <div class="col-lg-12 mt-80">
        <div class="dropdown pull-right" style="position: relative;right: 26px;">
            <button class="btn btn-primary dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                Action <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">        
                <li role="presentation"><?= $this->Html->link('<i class="fa fa-plus"></i> ' . __('New Client'), ['action' => 'add'], ['escape' => false]) ?></li>             
            </ul>
        </div>
        <h1 class="page-header" style="position: relative;"><?= __('Clients') ?></h1>
    </div>
</div>
<section class="content">
    <div class="ribbon-section" style="padding-top:0px !important;">
      <div class="ribbon-black" style=""><h3 class="ribbon-h3">Client List</h3></div>
    </div>
    <br style="clear:both;" />
    <div class="panel panel-primary">
        <div class="table-responsive data-content">    
            <table class="zero-config-datatable display">
                <thead>
                    <tr class="heading">
                      <th class="data-id">ID</th>                      
                      <th class="">Firstname</th>
                      <th class="">Middlename</th>
                      <th class="">Lastname</th>
                      <th class="">Email</th>
                      <th class="">Contact Number</th>
                      <th class="actions no-border-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clients as $client): ?>
                    <tr>
                          <td><?= $this->Number->format($client->id) ?></td>                          
                          <td><?= h($client->firstname) ?></td>
                          <td><?= h($client->middlename) ?></td>
                          <td><?= h($client->lastname) ?></td>
                          <td><?= h($client->email) ?></td>
                          <td><?= h($client->contact_no) ?></td>
                          <td class="actions">
                            <?= $this->Html->link('<i class="fa fa-list"></i> ' . __('History'), ['action' => 'history', $client->id],['title' => 'History', 'class' => 'btn btn-sm btn-info', 'escape' => false]) ?>
                            <?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('View'), ['action' => 'view', $client->id],['title' => 'View', 'class' => 'btn btn-sm btn-info', 'escape' => false]) ?>
                            <?= $this->Html->link('<i class="fa fa-pencil"></i> ' . __('Edit'), ['action' => 'edit', $client->id],['title' => 'Edit', 'class' => 'btn btn-sm btn-info','escape' => false]) ?>                            
                            <?= $this->Html->link('<i class="fa fa-trash-o"></i> ' . __('Delete'), '#modal-'. $client->id,['title' => 'Delete', 'class' => 'btn btn-sm btn-danger','data-toggle' => 'modal','escape' => false]) ?>
                            <!-- Delete Modal -->
                            <div id="modal-<?=$client->id?>" class="modal fade">
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
                                              ['action' => 'delete', $client->id],
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
