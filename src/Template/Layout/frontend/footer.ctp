<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <span class="cp-copyr">@ Copy Right 2017 Comfort Packaging- All Rights Reserved</span><br/>
                <span class="cp-copyr">Designed and Developed by: <a href="http://broproweb.com">BROPROWEB.COM</a></span>
            </div>
            <div class="col-sm-3">
                <span>Email: <a href="mailto:info@comfortpackaging.com">info@comfortpackaging.com</a></span>
            </div>
            <div class="col-sm-2">
                <div class="cp-social">
                    <ul class="list-unstyled list-inline">
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="cp-logo-foot">
                    <img src="<?php echo $this->Url->build("/webroot/frontend/assets/images/logo.png"); ?>" alt="" />
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<?php
echo $this->Html->script('frontend/vendors/jquery.nicescroll.min.js'); 
echo $this->Html->script('frontend/vendors/jquery.parallax-1.1.3.js'); 
echo $this->Html->script('frontend/vendors/lightgallery.min.js'); 
echo $this->Html->script('frontend/vendors/lg-thumbnail.min.js'); 
echo $this->Html->script('frontend/vendors/lg-video.min.js'); 
echo $this->Html->script('frontend/vendors/bootstrap.min.js');
echo $this->Html->script('frontend/core/base.js');
echo $this->Html->script('frontend/modules/theme-module.js');
echo $this->Html->script('frontend/bootstrapper.js');
?>

<script>
var base_url = "<?php echo $base_url; ?>";
    $(document).ready(function () {
        $('#cp-gallery-list li:lt(8)').fadeIn();
        $('.cf-less').fadeOut();
        var items = 28;
        var shown = 8;
        $('.cf-more').click(function () {
            $('.cf-less').fadeIn();
            shown = $('#cp-gallery-list li:visible').size() + 8;
            if (shown < items) { $('#cp-gallery-list li:lt(' + shown + ')').fadeIn(300); }
            else {
                $('#cp-gallery-list li:lt(' + items + ')').fadeIn(300);
                $('.cf-more').fadeOut();
            }
        });
        $('.cf-less').click(function () {
            $('#cp-gallery-list li').not(':lt(8)').fadeOut(300);
            $('.cf-more').fadeIn();
            $('.cf-less').fadeOut();
        });
        $("#frm-contact-form").submit(function(e) {
            $.ajax({
                 type: "POST",
                 url: base_url + 'contact/ajax_send_inquiry',      
                 dataType: "json",
                 data: $("#frm-contact-form").serialize(), 
                 success: function(o)
                 {
                    if( o.is_success ){
                        $('#frm-contact-form').trigger("reset");
                    }

                    $(".info-message").html(o.message);                              
                 }
            });
            e.preventDefault();
        });
    });
</script>
<!--[if lte IE 9]>
    <script src="javascripts/non-responsive.js"></script>
<![endif]-->
    