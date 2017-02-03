<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand visible-xs visible-sm" href="#">
                <img src="<?php echo $this->Url->build("/webroot/frontend/assets/images/logo-mobile.png"); ?>" alt="" />
            </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="<?= $nav_selected["home"] ?>"><a href="<?= $base_url; ?>">Home</a></li>
                <li class="<?= $nav_selected["about"] ?>"><a href="<?= $base_url; ?>about">About Us</a></li>
                <li class="<?= $nav_selected["contact"] ?>"><a href="<?= $base_url; ?>contact">Contact</a></li>
                <li>
                    <a class="hidden-xs hidden-sm cp-logo-handler" href="index.html">
                        <img class="cp-logo" src="<?php echo $this->Url->build("/webroot/frontend/assets/images/logo.png"); ?>" />
                    </a>
                </li>
                <li class="<?= $nav_selected["custom_software"] ?>"><a href="<?= $base_url; ?>custom_software">Our Custom Software</a></li>
                <li><a href="<?= $base_url; ?>users/login">Customer Login</a></li>
                <li>
                    <form class="cp-search-box" role="search">
                        <div class="input-group">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                            <input type="text" class="form-control" placeholder="Search">
                        </div>

                    </form>

                </li>
            </ul>
        </div> <!--/.nav-collapse -->
    </div>
</nav>

<div class="container aside-xl" style="margin-top: 260px;">
  <a href="<?php echo $this->Url->build("/"); ?>" class="navbar-brand block">Comfort Packaging</a>
  <section class="m-b-lg">    
    <header class="wrapper text-center">
      <strong><?php echo __("Sign in to your account"); ?></strong>
    </header>
    <?= $this->Flash->render() ?>
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create(null,['class' => 'form-horizontal']) ?>    
      <div class="list-group">
        <div class="list-group-item">
          <?= $this->Form->input('username',["autofocus" => "autofocus","class" => 'form-control no-border', "placeholder" => "Username", "label" => false])?>          
        </div>
        <div class="list-group-item">
          <?= $this->Form->input('password',["class" => 'form-control no-border', "placeholder" => "Password", "label" => false]) ?>                                   
        </div>
        <br />        
      </div>
      <button type="submit" style="width: 100% !important;" class="btn btn-lg btn-primary btn-block"><?php echo __("Sign In"); ?></button>
      <div class="text-center m-t m-b"><?= $this->Html->link('<small>' . __('Forgot password?') . '</small>', ['controller' => 'forgot_password', 'action' => 'index'], ['escape' => false]) ?></div>      
      <div class="line line-dashed"></div>          
    <?= $this->Form->end() ?>
  </section>
</div>  