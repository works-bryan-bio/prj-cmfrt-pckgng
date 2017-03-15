<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('Message') ?></h1> 
        <div class="dropdown pull-right" style="margin:-117px 14px 0 0">
            <button class="btn btn-primary dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
                Action <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">        
                <li role="presentation"><?= $this->Html->link('<i class="fa fa-plus"></i> ' . __('New Message'), ['action' => 'add'], ['escape' => false]) ?></li>
                        <!-- <li role="presentation"><?= $this->Html->link('<i class="fa fa-list-alt"></i> ' . __('List Clients'), ['controller' => 'Clients', 'action' => 'index'], ['escape' => false]) ?></li> -->
               <!--  <li role="presentation"><?= $this->Html->link('<i class="fa fa-plus"></i> ' . __('New Client'), ['controller' => 'Clients', 'action' => 'add'], ['escape' => false]) ?></li>
                        <li role="presentation"><?= $this->Html->link('<i class="fa fa-list-alt"></i> ' . __('List Message Details'), ['controller' => 'MessageDetails', 'action' => 'index'], ['escape' => false]) ?></li>
                <li role="presentation"><?= $this->Html->link('<i class="fa fa-plus"></i> ' . __('New Message Detail'), ['controller' => 'MessageDetails', 'action' => 'add'], ['escape' => false]) ?></li> -->
                    </ul>
        </div>
    </div>
</div>
<section class="content">
    <!-- Main row -->
        <div class="row">
            <section class="col-lg-12 connectedSortable">
                <div class="box box-warning" style="background-color:#fff; padding:10px;">
                    <div class="box-header">
                        <h4 class="box-title" style="display:inline-block;">
                          <i class="fa fa-comments-o"></i> <span id="discussion_name">Inbox</span>
                        </h4>
                        <div class="pull-right" style="margin-right:20px;">
                            <a href="javascript:void(0);" title="Refresh" alt="Refresh" class="btn btn-default btn-refresh-header-message" style="width:50%; display:inline" ><i class="fa fa-refresh"></i></a>
                            <a href="#addMessage" data-toggle="modal" class="btn btn-success"><i class="fa fa-plus"></i> New Message</a>
                        </div>

                    </div>
                    <div id="chat-container" style="margin-top:30px;">
                        <div class="text-center">Inbox is empty.</div>
                    </div>
                    
                </div>
            </section>
        </div>

        <div class="modal fade" id="addMessage" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="addUserModalLabel">Create new discussion</h4>
                    </div>
                    <?= $this->Form->create(null,['url' => '/message/add', 'method' => 'post', 'id' => 'frm-projet-add', 'data-toggle' => 'validator', 'role' => 'form']) ?>
                        <div class="modal-body">
                            <fieldset>
                                <?php if($hdr_user_data->user->group_id == 2) { ?>
                                    <div class='form-group'>
                                        <div class='col-sm-12 form-label'>Client</div> 
                                        <div class='col-sm-12'>
                                            <select class="form-control" name="client_id" required="required">
                                                <?php foreach($clients as $c) { ?>
                                                    <option value="<?= $c->id; ?>"><?= $c->firstname; ?> <?= $c->lastname; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class='form-group'>
                                    <div class='col-sm-12 form-label'>Subject</div> 
                                    <div class='col-sm-12'>
                                        <input type="text" class="form-control" name="message_subject" required="required">
                                    </div>
                                </div>

                            </fieldset>   
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>  
        </div>    
</section>
