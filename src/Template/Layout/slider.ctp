<!-- start slider -->
<div class="row row-slider" style="background-color:#50626d;height:600px;background: #50626d url(img/background-slider.png) no-repeat center !important;">
  <div class="container twoside slider-container" style="padding-top: 110px;">
    <div id="slider-start">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div id="owl-carousel" class="owl-carousel">
              <?php foreach( $banner_slides as $s ){ ?>
                <div class="item">
                  <div class="col-md-6 left banner-mobile">
                    <?php echo $s->caption; ?>
                  </div>
                  <div class="col-md-6 left banner-mobile banner-image">
                    <img src="<?php echo $s->thumbnail; ?>" alt="<?php echo $s->title; ?> "/>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>  
   </div>
  </div>
</div>
<!-- end slider -->