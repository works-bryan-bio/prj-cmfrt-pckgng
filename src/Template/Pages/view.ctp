<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('View Page') ?></h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> <?= __('Pages') ?>
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
            <th><?= __('Title') ?></th>
            <td><?= h($page->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($page->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Publish') ?></th>
            <td><?= $this->Number->format($page->is_publish) ?></td>
        </tr>
        <tr>
            <th><?= __('Sorting') ?></th>
            <td><?= $this->Number->format($page->sorting) ?></td>
        </tr>
    <tr>
        <th><?= __('Body') ?></th>
        <td><?= $this->Text->autoParagraph(h($page->body)); ?></td>        
    </tr>
    <tr>
        <th><?= __('Meta Title') ?></th>
        <td><?= $this->Text->autoParagraph(h($page->meta_title)); ?></td>        
    </tr>
    <tr>
        <th><?= __('Meta Keyword') ?></th>
        <td><?= $this->Text->autoParagraph(h($page->meta_keyword)); ?></td>        
    </tr>
    <tr>
        <th><?= __('Meta Description') ?></th>
        <td><?= $this->Text->autoParagraph(h($page->meta_description)); ?></td>        
    </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($page->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($page->modified) ?></td>
        </tr>
    </tbody>
    </table>

    <div class="form-group" style="margin-top: 80px;">
    <div class="col-sm-offset-2 col-sm-10">
        <div class="action-fixed-bottom">        
        <?= $this->Html->link('<i class="fa fa-angle-left"> </i> Back To list', ['action' => 'index'],['class' => 'btn btn-warning', 'escape' => false]) ?>
        </div>
    </div>
    </div>
</section>
