
 /* ========================================================================
 * Custom: Global v0.1 Bootstrap v3.5.2
 * ======================================================================== */
 
	$(document).ready(function(){
		$("[data-toggle=tooltip]").tooltip({
			html: true,
		});
        
        $(window).scroll(function() {
          if ($(document).scrollTop() > 50) {
            $('.navbar').addClass('shrink');
          } else {
            $('.navbar').removeClass('shrink');
          }
        });
	});
	
/* ========================================================================
 * Custom: backTop v0.1 Jquery v2.1.0
 * ======================================================================== */
 
	$(window).scroll(function() {
		if ($(this).scrollTop()) {
			$('#backTop').fadeIn();
		} else {
			$('#backTop').fadeOut();
		}
	});

	$("#backTop").click(function(e) {
		e.preventDefault();
		$("html, body").animate({scrollTop: 0}, 500);
		return false;
	});
