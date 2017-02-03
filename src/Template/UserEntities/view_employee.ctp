<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('View Employee') ?></h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-user"></i> <?= __('Employees') ?>
            </li>
            <li class="active">
                <i class="fa fa-eye"></i> <?= __('View') ?>
            </li>
        </ol>       
    </div>
</div>

<section class="content">   
    <table class="table table-striped table-bordered table-hover">
    <tbody>
        <tr>
            <td><?= __('User') ?></th>
            <td><?= $userEntity->has('user') ? $this->Html->link($userEntity->user->id, ['controller' => 'Users', 'action' => 'view', $userEntity->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Firstname') ?></th>
            <td><?= h($userEntity->firstname) ?></td>
        </tr>
        <tr>
            <th><?= __('Middlename') ?></th>
            <td><?= h($userEntity->middlename) ?></td>
        </tr>
        <tr>
            <th><?= __('Lastname') ?></th>
            <td><?= h($userEntity->lastname) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($userEntity->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Contact No') ?></th>
            <td><?= h($userEntity->contact_no) ?></td>
        </tr>                 
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($userEntity->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($userEntity->modified) ?></td>
        </tr>
    </tbody>
    </table>

    <div class="form-group" style="margin-top: 80px;">
    <div class="col-sm-offset-2 col-sm-10">
        <div class="action-fixed-bottom">        
        <?= $this->Html->link('<i class="fa fa-angle-left"> </i> Back To list', ['action' => 'employees'],['class' => 'btn btn-warning', 'escape' => false]) ?>
        </div>
    </div>
    </div>
</section>
