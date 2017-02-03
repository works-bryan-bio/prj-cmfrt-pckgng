<!DOCTYPE html>
<html lang="en">
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>
            <?= (isset($website_title) ? $website_title : 'BroProWeb') ?> : <?= (isset($page_title) ? $page_title : $this->fetch('title')) ?>
        </title>
        <meta name="keywords" content="<?php if(isset($mk_for_layout)) { echo $mk_for_layout; } ?>">
        <meta name="description" content="<?php if(isset($md_for_layout)) { echo $md_for_layout; } ?>">
       
        <!-- Bootstrap -->
        <?php
            echo $this->Html->meta('icon');
            echo $this->Html->css('theme_forest/front/bootstrap.min.css');
            echo $this->Html->css('theme_forest/front_custom.css');
            echo $this->Html->css('theme_forest/front/ie10-viewport-bug-workaround.css');
            echo $this->Html->css('theme_forest/front/owl/bootstrapTheme.css');
            echo $this->Html->css('theme_forest/front/owl/custom.css');
            echo $this->Html->css('theme_forest/front/owl/owl.carousel.css');
            echo $this->Html->css('theme_forest/front/owl/owl.theme.css');
            echo $this->Html->css('theme_forest/front/owl/overlay.css');
            echo $this->Html->css('colorbox/colorbox.css');
            echo $this->Html->css('font-awesome.min.css');
            echo $this->Html->css('slick/slick.css');
            echo $this->Html->css('slick/slick-theme.css');

            echo $this->fetch('meta');
            echo $this->fetch('css');
            echo $this->fetch('script');
        ?>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
        <![endif]-->
        <link rel="shortcut icon" href="<?= $this->Url->build("/webroot/ico/") ?>favicon.ico">        
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= $this->Url->build("/webroot/ico/") ?>apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= $this->Url->build("/webroot/ico/") ?>apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= $this->Url->build("/webroot/ico/") ?>apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?= $this->Url->build("/webroot/ico/") ?>apple-touch-icon-57-precomposed.png">
    </head>
    <body>
    <!--
    <div class="pop-up overlay" style="width:100%;height:100%;">
           <div class="col-md-6 center-absolute" style="margin:0 auto !important;float:none !important;padding-top:40px;">
                <img style="padding:20px;" src="<?php echo $this->Url->build("/webroot/img/overlay/overlay-menu.png"); ?>"/>
           </div>
            <div class="col-md-6 hyper-link" style="padding-top:65px;float:none !important;margin:0 auto;height:655px;">
                <a class="overlay-link scroll-to-aboutus" href="javascript:void(0);"><div style="height:50%;width: 45%;" class="col-md-6 cont-link left"></div></a>
                <a class="overlay-link scroll-to-service" href="javascript:void(0);"><div style="height:50%;width: 45%;" class="col-md-6 cont-link left"></div></a>
                <a class="overlay-link scroll-to-projects" href="javascript:void(0);"><div style="height:50%;width: 45%;" class="col-md-6 cont-link left"></div></a>
                <a class="overlay-link scroll-to-contactus" href="javascript:void(0);"><div style="height:50%;width: 45%;" class="col-md-6 cont-link left"></div></a>
            </div>
    </div>
    -->
        
        