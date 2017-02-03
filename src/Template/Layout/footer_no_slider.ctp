<?php use Cake\Utility\Inflector; ?>
	<!-- start footer -->
    <section class="footer">
      <div class="row" style="padding-top:30px;padding-bottom:30px;background-color:#f1f2f4;">
          <div class="container twoside" style="">
            <div class="col-md-6 left" style="padding-right: 55px;">
              <img src="<?php echo $this->Url->build("/webroot/img/footer/logo-icon-footer.png"); ?>" alt="Lorem Banner">
              <br class="clear"/>
              <p class="standard" style="">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod por incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo onsequat. Duis aute irure dolor in reprehenderit in voluptate.</p>
              <div class="col-md-12" style="margin-top:5px;"> 
                <a href="#"><img style="left" src="<?php echo $this->Url->build("/webroot/img/footer/twitter-icon.png"); ?>" alt="twitter"></a>
                <a href="#"><img style="left" src="<?php echo $this->Url->build("/webroot/img/footer/instagram-icon.png"); ?>" alt="instagram"></a>
                <a href="#"><img style="left" src="<?php echo $this->Url->build("/webroot/img/footer/google-icon.png"); ?>" alt="google"></a>
                <a href="#"><img style="left" src="<?php echo $this->Url->build("/webroot/img/footer/facebook-icon.png"); ?>" alt="facebook"></a>
                <a href="#"><img style="left" src="<?php echo $this->Url->build("/webroot/img/footer/youtube-icon.png"); ?>" alt="youtube"></a>
              </div>
            </div>
            <div class="col-md-6 left" style="margin-top: 30px;">
              <h3 style="font-size: 30px;color: #565656;">Service Provided</h3>
              <br/>
              <div class="col-md-12">
                <div class="col-md-6 left">
                  <ul class="footer-ul left" style="margin-left: 0px !important;">
                    <li>Web design and Development</li>
                    <li>Social Media Management </li>
                    <li>Search Engine Optimazation</li>
                    <li>Email Marketing</li>
                    <li>Pay per click management</li>
                  </ul>
                </div>
                <div class="col-md-6 left">
                  <ul class="footer-ul left" style="margin-left: 0px !important;">
                    <li>Digital Brand Consulting</li>
                    <li>Web design and Development</li>
                    <li>Social Media Management</li>
                    <li>Search Engine Optimazation</li>
                  </ul>
                </div>
              </div>
            </div>            
          </div>
      </div>
      <div class="row" style="padding-top:5px;padding-bottom:0px;background-color:white;">
        <div class="container twoside" style="text-align:center;"> 
          <h3 style="color:#a3a3a3;font-size: 20px;">broproweb.com @ Copyright 2016</h3>
        </div>
      </div>
    </section>
    <!-- end footer -->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->	
	<!-- Include all compiled plugins (below), or include individual files as needed -->
    <?php 
    	echo $this->Html->script('front/jquery-2.1.4.min.js');    
    	echo $this->Html->script('front/bootstrap.js');    
    	echo $this->Html->script('front/owl.carousel.min.js');    
    	echo $this->Html->script('front/owl.carousel.min.js');   
      echo $this->Html->script('colorbox/jquery.colorbox-min.js');       
    ?>
    <script>
    var base_url = "<?php echo $base_url; ?>";
    $(function(){
      $("#owl-carousel").owlCarousel({
        navigation : false,
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem : true
        // "singleItem:true" is a shortcut for:
        // items : 1, 
        // itemsDesktop : false,
        // itemsDesktopSmall : false,
        // itemsTablet: false,
        // itemsMobile : false
      });
      $("#client-carousel").owlCarousel({
        navigation : false,
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem : true
        // "singleItem:true" is a shortcut for:
        // items : 1, 
        // itemsDesktop : false,
        // itemsDesktopSmall : false,
        // itemsTablet: false,
        // itemsMobile : false
      });
      <?php 
        if( isset($enable_colorbox) ){ 
            echo $image_script;
        }
      ?>
      $("#main-contact-us-form").submit(function(e){
        var url = base_url + "pages/ajax_email_inquiry";
        $.ajax({
           type: "POST",
           dataType: "json",
           url: url,               
           data: $(this).serialize(), 
           beforeSend: function() {            
            $(".main-btn-send-inquiry").text("Sending...");
            $(".main-btn-send-inquiry").attr('disabled', true);             
          },
          success: function(o)
           {
              $(".main-btn-send-inquiry").removeAttr('disabled');                
              $(".main-btn-send-inquiry").text("Submit");  

              if( o.is_success ){
                $(".contact-textbox").val("");                
                $("#main-contact-us-form").html(o.message);
              }else{
                $(".msg-contact-form").html(o.message);           
              }              
          }
        }); 
        e.preventDefault();
      });

      $("#main-newsletter-form").submit(function(e){
        var url = base_url + "pages/ajax_email_newsletter";
        $.ajax({
           type: "POST",
           dataType: "json",
           url: url,               
           data: $(this).serialize(), 
           beforeSend: function() {            
            $(".main-btn-send-newsletter").text("Sending...");
            $(".main-btn-send-newsletter").attr('disabled', true);             
          },
          success: function(o)
           {
              $(".main-btn-send-newsletter").removeAttr('disabled');                
              $(".main-btn-send-newsletter").text("SUBMIT");              

              if( o.is_success ){
                $(".news-textbox").val("");
              }

              $(".msg-newsletter-form").html(o.message);            
          }
        }); 
        e.preventDefault();
      });

      $("div.about-nav").hover(function() {
          $("a.link-about").addClass("white");
      });
      $("div.about-nav").mouseout(function() {
          $("a.link-about").removeClass("white");
      });

      $("div.service-nav").hover(function() {
          $("a.link-service").addClass("white");
      });
      $("div.service-nav").mouseout(function() {
          $("a.link-service").removeClass("white");
      });

      $("div.project-nav").hover(function() {
          $("a.link-project").addClass("white");
      });
      $("div.project-nav").mouseout(function() {
          $("a.link-project").removeClass("white");
      });

      $("div.contact-nav").hover(function() {
          $("a.link-contact").addClass("white");
      });
      $("div.contact-nav").mouseout(function() {
          $("a.link-contact").removeClass("white");
      });


      $("div.contact-nav").click(function() {
          $("a.link-contact").addClass("white-click");
          $("div.contact-nav").addClass("blue");

          $("a.link-project").removeClass("white-click");
          $("div.project-nav").removeClass("teal");

          $("a.link-service").removeClass("white-click");
          $("div.service-nav").removeClass("yellow");

          $("a.link-about").removeClass("white-click");
          $("div.about-nav").removeClass("marine");
      });

      $("div.project-nav").click(function() {
          $("a.link-project").addClass("white-click");
          $("div.project-nav").addClass("teal");

          $("a.link-service").removeClass("white-click");
          $("div.service-nav").removeClass("yellow");

          $("a.link-about").removeClass("white-click");
          $("div.about-nav").removeClass("marine");

          $("a.link-contact").removeClass("white-click");
          $("div.contact-nav").removeClass("blue");
      });

      $("div.service-nav").click(function() {
          $("a.link-service").addClass("white-click");
          $("div.service-nav").addClass("yellow");
          
          $("a.link-project").removeClass("white-click");
          $("div.project-nav").removeClass("teal");

          $("a.link-about").removeClass("white-click");
          $("div.about-nav").removeClass("marine");

          $("a.link-contact").removeClass("white-click");
          $("div.contact-nav").removeClass("blue");
      });

      $("div.about-nav").click(function() {
          $("a.link-about").addClass("white-click");
          $("div.about-nav").addClass("marine");

          $("a.link-service").removeClass("white-click");
          $("div.service-nav").removeClass("yellow");
          
          $("a.link-project").removeClass("white-click");
          $("div.project-nav").removeClass("teal");

          $("a.link-contact").removeClass("white-click");
          $("div.contact-nav").removeClass("blue");
      });

      //$("body").addClass("no-scroll");
      $("a.overlay-link").click(function() {
         $("body").removeClass("no-scroll");
         $(".pop-up.overlay").hide();
      });

      $(".scroll-to-aboutus").click(function(){
        $('html, body').animate({
            scrollTop: $("#about-container").offset().top
        }, 1500);
      });

      $(".scroll-to-service").click(function(){
        $('html, body').animate({
            scrollTop: $("#services-container").offset().top
        }, 1500);
      });

      $(".scroll-to-projects").click(function(){
        $('html, body').animate({
            scrollTop: $("#project-container").offset().top
        }, 1500);
      });

      $(".scroll-to-contactus").click(function(){
        $('html, body').animate({
            scrollTop: $("#contact-container").offset().top
        }, 1500);
      });
      //$("sample").click(function() {
        $(".pop-up").addClass("hide");
        $(".pop-up").removeClass("show");
        $("body").removeClass("no-scroll");
        $(this).scrollTop(0);
      //});

    });
    </script>
</body>
</html>