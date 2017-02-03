CP.Modules.ThemeModule = (function () {
    //Dependencies
    var core = CP.Core;

    //////////////////////
    // Private Methods //
    ////////////////////
    var _preLoader = function () {
        setTimeout(function () {
            $('main').addClass('loaded');

        }, 1000);
    }
    var _privateMethod = function () {
        function newPageDelay(pos, dir, color) {
            //pos LR ,top positive
            var LR = 0, TD = 0;

            if (pos === 'LR') { LR = 100, TD = 0; }
            else if (pos === 'TD') { LR = 0, TD = 100; }

            var w = window.innerWidth;
            var h = window.innerHeight;

            var divPageBlock = document.createElement('div');
            divPageBlock.style.width = w + 'px';
            divPageBlock.style.height = h + 'px';
            divPageBlock.style.zIndex = '5';
            divPageBlock.style.background = color;
            divPageBlock.style.position = 'absolute';
            divPageBlock.style.top = dir * TD + 'vh';
            divPageBlock.style.left = dir * LR + 'vw';

            document.querySelector('main').appendChild(divPageBlock);

            //add animation
            if (pos === 'LR' && dir === 1) { divPageBlock.classList.add('slideInAniDelayToLeft'); }
            else if (pos === 'LR' && dir === -1) { divPageBlock.classList.add('slideInAniDelayToRight'); }

            else if (pos === 'TD' && dir === 1) { divPageBlock.classList.add('slideInAniDelayToTop'); }
            else if (pos === 'TD' && dir === -1) { divPageBlock.classList.add('slideInAniDelayToBottom'); }

        }

        function makePage(pos, dir) {
            //newPageDelay(pos, dir, '#fff');
            setTimeout(function () { newPageDelay(pos, dir, '#232225'); }, 150);
            setTimeout(function () { newPageDelay(pos, dir, '#f69f01'); }, 300);
            //setTimeout(function(){newPage('tomato');},1000);

        }

        window.onload = function () {
            var dir = 1, pos = '';
            document.body.addEventListener('onload', function (event) {
                if (event.target.id === 'arrowRight') { dir = 1; pos = 'LR'; makePage(pos, dir); }
                else if (event.target.id === 'arrowLeft') { dir = -1; pos = "LR"; makePage(pos, dir); }
                else if (event.target.id === 'reveal-home') { dir = 1; pos = "TD"; makePage(pos, dir); }
                else if (event.target.id === 'reveal-contact') { dir = -1; pos = "TD"; makePage(pos, dir); }
                else if (event.target.id === 'reveal-about') { dir = -1; pos = "TD"; makePage(pos, dir); }
                else if (event.target.id === 'reveal-csoft') { dir = -1; pos = "TD"; makePage(pos, dir); }
                else if (event.target.id === 'reveal-logo') { dir = 1; pos = "TD"; makePage(pos, dir); }
                //else if(event.target.id === 'arrowTopRight'){dir = }
            });
        };
    };
    var _bindMenuViewport = function () {
        var menu = $('#navbar ul li').find('a');

        menu.each(function () {

            $(this).click(function () {


           

                var link = $(this).attr("href").substring(1);

                // if (link === $('article').attr("id")) {
                $('article').removeClass('cp-active');
                $('article#' + link).addClass('cp-active');
                //  }

            })
        })

        $('#navbar ul li').each(function () {
            $(this).click(function () {
                $('#navbar ul li').removeClass('active');
                $(this).addClass('active');
            })
        })

    }

    var _galLightbox = function () {

        $('#cp-gallery-list, #video-gallery').lightGallery({
            thumbnail: true,
        });

        //$('#video-gallery').lightGallery({
        //    videojs: true
        //})
    }

    var _niceScroll = function () {
        $("html").niceScroll({
            cursoropacitymin: 0,
            scrollspeed:100,
        });
    }

    var _parallax = function () {
        $('.cp-para, .cp-testimonial').parallax("50%", 0.1);
    }

    var _smoothScroll = function () {
        $(function () {
            $('main a[href*="#"]:not([href="#"])').click(function () {
                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    if (target.length) {
                        $('html, body').animate({
                            scrollTop: target.offset().top
                        }, 1000);
                        return false;
                    }
                }
            });
        });
    }

    /////////////////////
    // Public Methods //
    ///////////////////
    var init = function () {
        //_preLoader();    
        //_privateMethod();
        //_bindMenuViewport();
        _galLightbox();
        _niceScroll();
        _parallax();
        _smoothScroll();
     
    };

    return {
        init: init
    };
})();