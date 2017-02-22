<div class="row">
    <div class="col-lg-12 mt-80">
        <div class="dropdown pull-right" style="position: relative;right: 26px;">
            <button class="btn btn-primary dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                Action <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">        
                <li role="presentation"><?= $this->Html->link('<i class="fa fa-plus"></i> ' . __('New Employee'), ['action' => 'add_employee'], ['escape' => false]) ?></li>             
            </ul>
        </div>
        <h1 class="page-header" style="padding-left: 20px;"><?= __('Employees') ?></h1>
    </div>
</div>
<section class="content">
     <div class="ribbon-section" style="padding-top:0px !important;">
      <div class="ribbon-black" style=""><h3 class="ribbon-h3">Employee List</h3></div>
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
                      <th class="actions">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($userEntities as $userEntity): ?>
                    <tr>
                          <td><?= $this->Number->format($userEntity->id) ?></td>                          
                          <td><?= h($userEntity->firstname) ?></td>
                          <td><?= h($userEntity->middlename) ?></td>
                          <td><?= h($userEntity->lastname) ?></td>
                          <td><?= h($userEntity->email) ?></td>
                          <td><?= h($userEntity->contact_no) ?></td>
                          <td class="actions">
                            <?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('View'), ['action' => 'view_employee', $userEntity->id],['title' => 'View', 'class' => 'btn btn-sm btn-info', 'escape' => false]) ?>
                            <?= $this->Html->link('<i class="fa fa-pencil"></i> ' . __('Edit'), ['action' => 'edit_employee', $userEntity->id],['title' => 'Edit', 'class' => 'btn btn-sm btn-info','escape' => false]) ?>                            
                            <?= $this->Html->link('<i class="fa fa-trash-o"></i> ' . __('Delete'), '#modal-'. $userEntity->id,['title' => 'Delete', 'class' => 'btn btn-sm btn-danger','data-toggle' => 'modal','escape' => false]) ?>
                            <!-- Delete Modal -->
                            <div id="modal-<?=$userEntity->id?>" class="modal fade">
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
                                              ['action' => 'delete', $userEntity->id],
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
