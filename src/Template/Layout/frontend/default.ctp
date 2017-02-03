<?php include("header.ctp"); ?>

<!--[if lt IE 9]>
    <div id="browser-notification" class="alert alert-danger">
        <div class="container">
            We are sorry but it looks like your <a href="http://www.whatbrowser.org/intl/en_us/" target=_blank>browser</a> doesn't support our website features. In order to get the full experience please download a new version of <a title="Download Chrome" href="http://www.google.com/chrome/" target=_blank>Chrome</a>, <a title="Download Safari" href="http://www.apple.com/safari/download/" target=_blank>Safari</a>, <a title="Download Firefox" href="http://www.mozilla.com/firefox/" target=_blank>Firefox</a>, or <a title="Download Internet Explorer" href="http://www.microsoft.com/windows/internet-explorer/default.aspx" target=_blank>Internet Explorer</a>.
        </div>
    </div>
<![endif]-->
<!-- nav -->    
<?php 
    $nav_selected = $this->NavigationSelector->selectedMainNavigation($nav_selected[0]);
    if (!empty($sub_nav_selected)) {
        $sub_nav_selected = $this->NavigationSelector->selectedSubNavigation($sub_nav_selected['parent'],$sub_nav_selected['child']);
    }else{
        $sub_nav_selected = array();
    }
    
?>  
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

<main>
  <?= $this->Flash->render() ?>
  <?= $this->fetch('content') ?>
</main>

<?php include("footer.ctp"); ?>
</body>
</html>