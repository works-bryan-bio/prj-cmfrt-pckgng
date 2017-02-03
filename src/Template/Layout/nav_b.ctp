<?php use Cake\Utility\Inflector; ?>
<!-- mobile view navigation -->
<nav class="navbar navbar-default nav-collapse" style="display:none;margin-bottom: 0px;" role="navigation">
   <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Broproweb</a>
   </div>
   <div class="collapse navbar-collapse" id = "example-navbar-collapse">
      <ul class="nav navbar-nav">
         <li class="active"><a href="<?php echo $this->Url->build(['controller' => 'about-us']); ?>">About Us</a></li>
         <li><a href="<?php echo $this->Url->build(['controller' => 'services', 'action' => 'all']); ?>">Services</a></li>
         <li><a href="<?php echo $this->Url->build(['controller' => 'projects', 'action' => 'all']); ?>">Our Project</a></li>
         <li><a href="<?php echo $this->Url->build(['controller' => 'contact_us']); ?>">Contact Us</a></li>
         <!-- dropdown layout
         <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Java<b class="caret"></b></a>
            <ul class="dropdown-menu">
               <li><a href="#">jmeter</a></li>
               <li><a href="#">EJB</a></li>
               <li><a href="#">Jasper Report</a></li>
               <li class="divider"></li>
               <li><a href="#">Separated link</a></li>
               <li class="divider"></li>
               <li><a href="#">One more separated link</a></li>
            </ul>
         </li>
         end of dropdown layout -->
      </ul>
   </div> 
</nav>
<!-- end of mobile view navigation -->
<!-- desktop view navigation -->
<div class="row nav-desktop" style="background: url(<?php echo $this->Url->build("/webroot/img/background2.jpg"); ?>) repeat-y center !important;">
    <div class="container twoside">
       <div class="col-md-12">
          <div class="col-md-2" style="background-color:#495c68;">
            <img src="<?php echo $this->Url->build("/webroot/img/menu-about.png"); ?>"/>
          </div>
          <div class="col-md-2" style="background-color:#f5ba47;">
            <img src="<?php echo $this->Url->build("/webroot/img/menu-service.png"); ?>"/>
          </div>
          <div class="col-md-4" style="background-color:#fff;">
            <a href="<?php echo $this->Url->build("/"); ?>">
              <img src="<?php echo $this->Url->build("/webroot/img/logo-nav.png"); ?>" style="position:absolute;width: 390px;left:0px;" />
            </a>
          </div>
          <div class="col-md-2" style="background-color:#4aa3b5;">
            <img src="<?php echo $this->Url->build("/webroot/img/menu-project.png"); ?>"/>
          </div>
          <div class="col-md-2" style="background-color:#4573ec;">
            <img src="<?php echo $this->Url->build("/webroot/img/menu-contact.png"); ?>"/>
          </div>
       </div>
    </div>
</div>
<div class="row nav-desktop-space" style="background-color:#f1f2f4;height:20px;"></div>
<div class="row nav-desktop-text" style="background-color:#f1f2f4;">
  <div class="container twoside">
    <div class="col-md-12">
       <div class="col-md-2 center about-nav padding-nav">
          <a class="link-nav link-about" href="<?php echo $this->Url->build(['controller' => 'about-us']); ?>">ABOUT US</a>
        </div>
        <div class="col-md-2 service-nav center padding-nav">
          <a class="link-nav link-service" href="<?php echo $this->Url->build(['controller' => 'services', 'action' => 'all']); ?>">SERVICES</a>
        </div>
        <div class="col-md-4 padding-nav"></div>
        <div class="col-md-2 project-nav center padding-nav">
          <a class="link-nav link-project" href="<?php echo $this->Url->build(['controller' => 'projects', 'action' => 'all']); ?>">OUR PROJECTS</a>
        </div>
        <div class="col-md-2 contact-nav center padding-nav">
         <a class="link-nav link-contact" href="<?php echo $this->Url->build(['controller' => 'contact_us']); ?>">CONTACT US</a>
        </div>
    </div>
  </div>
</div>
<!-- end of desktop view navigation -->