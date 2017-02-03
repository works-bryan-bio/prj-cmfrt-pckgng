<!DOCTYPE html>
<html lang="en-us">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        Comfort Packaging :
        <?= $page_title; ?>
    </title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,500,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <?php
        echo $this->Html->meta('icon');
        //echo $this->Html->css('backend.css'); 
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        echo $this->Html->css('frontend/main.min.css');
    ?>

    <link rel="shortcut icon" href="ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:600,400,300" />
</head>
<body class="themed dark">
    <section id="content" class="m-t-lg wrapper-md animated fadeInUp">    
        <?= $this->fetch('content') ?>               
    </section>
    <br/><br/><br/><br/><br/><br/>
    <!-- footer -->
    <footer id="footer">
        <div class="text-center padder">
            <p>
                <small>&copy; Copyright ©  2016 Comfort Packaging. All Rights Reserved.</small>
            </p>
        </div>
    </footer>
  <!-- / footer -->
    <?php
        echo $this->Html->script('theme_forest/jquery.min.js');
        echo $this->Html->script('theme_forest/bootstrap.js');
        echo $this->Html->script('theme_forest/app.js');
        echo $this->Html->script('theme_forest/slimscroll/jquery.slimscroll.min.js');
        echo $this->Html->script('theme_forest/app.plugin.js');
    ?>
</body>
</html>
