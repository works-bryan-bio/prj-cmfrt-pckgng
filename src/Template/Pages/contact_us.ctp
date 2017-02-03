<style>
.captcha-container label{
    padding: 6px;
    background-color: #666666;
    color:#ffffff;
    width: 100%;
}
.input label {background-color: #4573EC;color:#ffffff;margin-right:5px;padding:5px;float: left;}
#captcha{width:30%;display: inline-block;height: 34px;padding:5px;}
</style>
<div class="row" style="margin-top:30px;padding-top:60px;padding-bottom:50px;background-color:#ffffff;">
   <div class="row" id="contact-container" style="padding-top:60px;padding-bottom:50px;background-color:#f1f2f4;">
    <div class="container twoside" style="">
      <div class="center"><h2 class="header-title" style="font-size:50px;"><span style="color:#3f3f3f;">CONTACT</span> <span style="color:#72b9d2;">US</span></h2></div>
      <br class="clear"/><br/>
      <div class="col-md-12" style="padding-top: 10px;">
          <div class="col-md-6">
            <img src="<?php echo $this->Url->build("/webroot/img/contact/contact-icon.png"); ?>">
          </div>
          <div class="col-md-6">
            <h2 class="" style="font-size: 25px;font-weight:bold;">Get in Touch</h2>
            <p class="standard" style="padding-top: 0px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim uis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute. </p>
            <br/>            
            <form id="main-contact-us-form">
            <input class="contact-textbox" name="name" required="required" type="text" placeholder="Name"/>
            <input class="contact-textbox" name="email" required="required" type="text" placeholder="Email Address"/>
            <textarea class="contact-textbox" name="msg" placeholder="Message" style="height:200px;"></textarea>  
            <div class="form-group">                        
               <?php echo $this->SimpleCaptcha->input(); ?>
            </div>
            <div class="msg-contact-form"></div>
            <br class="clear" />
              <button class="button-blue-project-left clear white main-btn-send-inquiry" style="font-size: 18px;border-style:none;" type="submit">Submit</button>
            </form>
          </div>
      </div>
       
    </div>
  </div>
</div>
    
