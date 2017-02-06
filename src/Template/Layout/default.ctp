<!DOCTYPE html>
<html lang="en" class="app">
<head>
    <?= $this->Html->charset() ?>    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        <?= (isset($website_title) ? $website_title : 'Comfort Packaging') ?> : <?= (isset($page_title) ? $page_title : $this->fetch('title')) ?>
    </title>
    <?php
        echo $this->Html->meta('icon');
    
        echo $this->Html->css('theme_forest/bootstrap.css');
        echo $this->Html->css('theme_forest/animate.css');
        echo $this->Html->css('theme_forest/font-awesome.min.css');
        echo $this->Html->css('theme_forest/icon.css');
        echo $this->Html->css('theme_forest/font.css');
        echo $this->Html->css('theme_forest/app.css');        
        echo $this->Html->css('theme_forest/datepicker/datepicker.css');
        echo $this->Html->css('colorbox/colorbox.css');
 
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>

    <script>
        var base_url = '<?= $this->Url->build("/") ?>';
    </script>
</head>

<body>
<?php 
  if( $hdr_user_data->photo != '' ){
      $user_photo = $this->Url->build("/webroot/upload/users/" . $hdr_user_data->id . "/" . $hdr_user_data->photo);            
  }else{
      $user_photo = $this->Url->build("/webroot/images/default_user.png");
  }
?>
<section class="vbox">
    <header class="bg-primary header header-md navbar navbar-fixed-top-xs box-shadow">
    <div id="ribbon">
            <span class="content">Beta Testing Mode</span>
    </div>

      <div class="navbar-header aside-md dk">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
          <i class="fa fa-bars"></i>
        </a>
        <a class="navbar-brand" href="<?php echo $this->Url->build("/main/index"); ?>"><span class="hidden-nav-xs"><img style="" src="<?php echo $this->Url->build("/webroot/images/logo.png"); ?>"/></span></a>        
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">
          <i class="fa fa-cog" style="color: orange;"></i>
        </a>
      </div>            
      <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">                
        <li class="dropdown" style="height:100%;width: 100%;">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="height:100%; width: 100%;">
            <span class="thumb-sm avatar pull-left">              
              <img class="profile-picture" style="height:70px;" src="<?php echo $user_photo; ?>" alt="Member Photo">
            </span>
            <div class="profile-name" style="margin-top: 20px;margin-left: 90px;">
              <span style="font-size: 16px;"><?php echo $hdr_user_data->firstname; ?></span> <b class="caret"></b>
            </div>
          </a>
          <ul class="dropdown-menu animated fadeInRight" style="width: 321px;">                        
            <li>
              <?= $this->Html->link('<i class="fa fa-fw fa-user"></i> ' . __('Profile'),["controller" => "profile", "action" => "index"],['escape' => false]); ?>                 
            </li>            
            <!-- <li>
              <a href="docs.html">Help</a>
            </li> -->
            <li class="divider"></li>
            <li>
              <?= $this->Html->link('<i class="i i-logout"></i> ' . __('Logout'),["controller" => "users", "action" => "logout"],["escape" => false]); ?>                    
            </li>
          </ul>
        </li>
      </ul>      
    </header>
    <section>
      <section class="hbox stretch">
        <!-- .aside -->
        <aside class="bg-black aside-md hidden-print hidden-xs" id="nav">          
          <section class="vbox">
            <section class="w-f scrollable">
              <div class="slim-scroll" style="padding-top: 40px;" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
                <div class="clearfix wrapper dk nav-user hidden-xs" style="display:none;">
                  <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <span class="thumb avatar pull-left m-r">                        
                        <img style="height:50px;" src="<?php echo $user_photo; ?>" class="dker" alt="...">
                      </span>
                      <span class="hidden-nav-xs clear">
                        <span class="block m-t-xs">
                          <strong class="font-bold text-lt"><?php echo $hdr_user_data->firstname; ?></strong> 
                          <b class="caret"></b>
                        </span>
                        <span class="text-muted text-xs block"><?php echo $hdr_user_data->email; ?></span>
                      </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">                                            
                      <li>
                        <?= $this->Html->link('<i class="fa fa-fw fa-user"></i> ' . __('Profile'),["controller" => "profile", "action" => "index"],['escape' => false]); ?>     
                      </li>                      
                      <li class="divider"></li>
                      <li>
                        <?= $this->Html->link('<i class="i i-logout"></i> ' . __('Logout'),["controller" => "users", "action" => "logout"],["escape" => false]); ?>
                      </li>
                    </ul>
                  </div>
                </div>                
                <?php include("admin_nav.ctp"); ?>
              </div>
            </section>
            
            <footer class="footer hidden-xs no-padder text-center-nav-xs">              
              <a href="#nav" data-toggle="class:nav-xs" class="btn btn-icon icon-muted btn-inactive m-l-xs m-r-xs">
                <i class="i i-circleright text-active"></i>
              </a>
            </footer>
          </section>
        </aside>
        <!-- /.aside -->
        <section id="content">
          <section class="hbox stretch">          
              <section class="vbox">         
                <section class="scrollable wrapper">                       
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
                </section>
              </section>            
            <?php //include("admin_side_content.ctp"); ?>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
        </section>
      </section>
    </section>
  </section>
  <?php include("admin_footer.ctp"); ?>
</body>
</html>
