<section class="content-header">
    <h1><?= __('Users') ?></h1>
</section>

<div class="dropdown pull-right" style="margin:-50px 14px 0 0">
    <button class="btn btn-default dropdown-toggle" type="button" id="drpdwn" data-toggle="dropdown" aria-expanded="true">
        Action <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="drpdwn">
        <li role="presentation"><?= $this->Html->link('<i class="fa fa-plus"></i> ' . __('Add User'),['action' => 'add'], ['escape' => false]) ?></li>
        <li role="presentation"><?= $this->Html->link('<i class="fa fa-list-alt"></i> ' . __('List Group'),['controller' => 'groups', 'action' => 'index'], ['escape' => false]) ?></li>
    </ul>
</div>

<section class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= __('Users List') ?></h3>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="heading">
                        <th><?= $this->Paginator->sort('id') ?></th>
                        <th><?= $this->Paginator->sort('username') ?></th>
                        <th><?= $this->Paginator->sort('Group') ?></th>
                        <th><?= $this->Paginator->sort('created') ?></th>
                        <th><?= $this->Paginator->sort('modified') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $this->Number->format($user->id) ?></td>
                        <td><?= h($user->username) ?></td>
                        <td><?= h($user->group->name) ?></td>
                        <td><?= date("Y-m-d H:i:s",strtotime($user->created)) ?></td>
                        <td><?= date("Y-m-d H:i:s",strtotime($user->modified)) ?></td>
                        <td class="actions">
                            <?= $this->Html->link('<i class="fa fa-eye"></i>', ['action' => 'view', $user->id],['class' => 'btn btn-info','escape' => false]) ?>
                            <?= $this->Html->link('<i class="fa fa-pencil"></i>', ['action' => 'edit', $user->id],['class' => 'btn btn-success', 'escape' => false]) ?>
                            <?= $this->Html->link('<i class="fa fa-trash"></i>', '#modal-'.$user->id,['data-toggle' => 'modal', 'class' => 'btn btn-danger', 'escape' => false]) ?>
                            <!-- Delete Modal -->
                            <div id="modal-<?=$user->id?>" class="modal fade" tabindex="-1" data-width="660" style="display: none; max-height:175px;">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title">Delete Confirmation</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to <b>delete</b> <?=$user->username?>?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn btn-default">No</button>
                                    <?= $this->Form->postLink(
                                            'Yes',
                                            ['action' => 'delete', $user->id],
                                            ['class' => 'btn btn-primary', 'escape' => false]
                                        )
                                    ?>
                                </div>
                            </div>
                        </td>

                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>            
        </div>    
        <div class="paginator" style="text-align:center;">
            <ul class="pagination">
                <?= $this->Paginator->prev('«') ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next('»') ?>
            </ul>
            <p class="hidden"><?= $this->Paginator->counter() ?></p>
        </div>
</section>



