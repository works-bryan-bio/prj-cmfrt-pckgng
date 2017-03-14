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
    <div class="col-lg-12 mt-80">
        <div class="dropdown pull-right" style="margin:0px 14px 0 0;position: relative;right: 13px;">
            <button class="btn btn-primary dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                Action <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">        
                <li role="presentation"><?= $this->Html->link('<i class="fa fa-plus"></i> ' . __('New User'), ['action' => 'add'], ['escape' => false]) ?></li>             
            </ul>
        </div>
        <h1 class="page-header"  style="position: relative;left: 17px;"><?= __('Users') ?></h1>
    </div>
</div>
<section class="panel panel-default">
  <div class="panel-body">
    <div class="tab-content">
      <div class="tab-pane active" id="pending_orders">
          <div class="table-responsive data-content">    
            <table class="zero-config-datatable display">
                <thead>
                    <tr class="heading">
                      <th style="text-align:center;width:80px;">Actions</th>                      
                      <th class="data-id">ID</th>                      
                      <th class="">Firstname</th>
                      <th class="">Middlename</th>
                      <th class="">Lastname</th>
                      <th class="">Email</th>
                      <th class="">Contact Number</th>                    
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($userEntities as $userEntity): ?>
                    <tr>
                      <td class="no-border-right table-actions">

                            <div class="dropdown">
                              <button class="btn btn-primary dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                                  Action <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">  
                                  <!-- <li role="presentation"><?= $this->Html->link('<i class="fa fa-list"></i> ' . __('History'), ['action' => 'history', $userEntity->id],['title' => 'History', 'escape' => false]) ?></li> -->
                                  <li role="presentation"><?= $this->Html->link('<i class="fa fa-eye"></i> ' . __('View'), ['action' => 'view', $userEntity->id],['title' => 'View', 'escape' => false]) ?></li>
                                  <li role="presentation"><?= $this->Html->link('<i class="fa fa-pencil"></i> ' . __('Edit'), ['action' => 'edit', $userEntity->id],['title' => 'Edit', 'escape' => false]) ?></li>                          
                                  <li role="presentation"><?= $this->Html->link('<i class="fa fa-trash-o"></i> ' . __('Delete'), '#modal-'. $userEntity->id,['title' => 'Delete', 'data-toggle' => 'modal','escape' => false]) ?></li>
                              </ul>
                            </div>
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
                      <td><?= $this->Number->format($userEntity->id) ?></td>                          
                      <td><?= h($userEntity->firstname) ?></td>
                      <td><?= h($userEntity->middlename) ?></td>
                      <td><?= h($userEntity->lastname) ?></td>
                      <td><?= h($userEntity->email) ?></td>
                      <td><?= h($userEntity->contact_no) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>        
      </div>    
    </div>
  </div>
</section>
