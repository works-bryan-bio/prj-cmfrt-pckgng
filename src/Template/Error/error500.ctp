<?php
use Cake\Core\Configure;
use Cake\Error\Debugger;

if (Configure::read('debug')):
    $this->layout = 'dev_error';

    $this->assign('title', $message);
    $this->assign('templateName', 'error500.ctp');

    $this->start('file');
?>
<?php if (!empty($error->queryString)) : ?>
    <p class="notice">
        <strong>SQL Query: </strong>
        <?= h($error->queryString) ?>
    </p>
<?php endif; ?>
<?php if (!empty($error->params)) : ?>
        <strong>SQL Query Params: </strong>
        <?= Debugger::dump($error->params) ?>
<?php endif; ?>
<?php
    echo $this->element('auto_table_warning');

    if (extension_loaded('xdebug')):
        xdebug_print_function_stack();
    endif;

    $this->end();
endif;
?>
<?php if(Configure::read('debug')){ ?>
<?php $this->layout = 'dev_error'; ?>
<h2><?= __d('cake', 'An Internal Error Has Occurred') ?></h2>
<p class="error">
    <strong><?= __d('cake', 'Error') ?>: </strong>
    <?= h($message) ?>
</p>
<?php }else{ ?>
<?php $this->layout = 'error'; ?>
<div class="row m-n">
  <div class="col-sm-4 col-sm-offset-4">
    <div class="text-center m-b-lg">
      <h1 class="h text-white animated fadeInDownBig">500</h1>
      <p>
        <?= sprintf(
            __d('cake', 'The requested address %s was not found on this server.'),
            "<strong>'{$url}'</strong>"
        ) ?>
      </p>
    </div>
    <div class="list-group bg-info auto m-b-sm m-b-lg">
      <a href="<?php echo $this->Url->build("/") ?>" class="list-group-item">
        <i class="fa fa-chevron-right icon-muted"></i>
        <i class="fa fa-fw fa-home icon-muted"></i> Goto homepage
      </a>      
    </div>
  </div>
</div>
<?php } ?>