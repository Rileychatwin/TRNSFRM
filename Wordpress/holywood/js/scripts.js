(function($) {
    "use strict";

    $(document).ready(function (){
        'use strict';

        var top_bar = $('.bootsnav');

        if (top_bar.length > 0) {
            var header_h = top_bar.outerHeight();
            $(".navbar-sticky.navbar-mobile .navbar-collapse").css("top",header_h - 1);

            if ($('.bootsnav.navbar-sidebar').length > 0) {
                var header_h = 0;
            }
        } else {
            var header_h = 0;
        }


        if (top_bar.length > 0) {
            $(window).scroll(function() {
                var scroll = $(window).scrollTop();
                var header_h = $('.bootsnav').outerHeight();
                if (scroll >= 10) {
                    $(".bootsnav.navbar-fixed,.bootsnav.navbar-sticky,.bootsnav.navbar-scrollspy").addClass("scrolled");
                } else {
                    $(".bootsnav.navbar-fixed,.bootsnav.navbar-sticky,.bootsnav.navbar-scrollspy").removeClass("scrolled");
                }
            });
        }

        $( "#main-header" ).scroll(function() {
            var y = $( "#main-header" ).scrollTop();
            if (y > 150) {
                $(".cd-menu-icon").css("background-color","#777");
            } else {
                $(".cd-menu-icon").css("background-color","#222222");
            }
        });

        var menu = $('#cd-menu-trigger');

        if (menu.length > 0) {
            $(window).scroll(function () {
                var y = $(this).scrollTop();
                var z = $('#cd-menu-trigger').offset().top;

                if (y >= 133) {
                    menu.removeClass('menu').addClass('light-menu');
                }
                else{
                    menu.removeClass('light-menu').addClass('menu');
                }
            });
        }

        $(function() {
            $('header a[href*="#"]:not([href="#"])').click(function() {
                if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                    if (target.length) {
                        $('html,body').animate({
                            scrollTop: target.offset().top - header_h
                        }, 1000);
                        return false;
                    }
                }
            });
        });

        // Slick initializer function
        $(".lj-carousel").slick({
            autoplay: true,
            autoplaySpeed: 5000,
            dots: true,
            arrows: false
        });
        $(".lj-clients-carousel").slick({
            autoplay: true,
            autoplaySpeed: 5000,
            dots: true,
            arrows: false,
            infinite: true,
            slidesToShow: 1,
            centerMode: true,
        });

        $(window).stellar();
        $('.parallax-sections').stellar();


        // Featherlight
        $('.lj-projects-item a').featherlight({
            targetAttr:   'href',
            closeOnClick: 'anywhere'
        });

        // WOW initalization
        new WOW().init();

        // block scroll mouse button
        $(function() {
            $('body').mousedown(function(e){if(e.button==1)return false});
        });

        // hiding other team members on hover
        $(".lj-team-person").on({
            mouseenter: function () {
                $('.lj-team-person').not($(this)).css("opacity", "0.25");
            },
            mouseleave: function () {
                $('.lj-team-person').not($(this)).css("opacity", "1");
            }
        });


    });

    // Preloader
    // Change delay and fadeOut speed (in miliseconds)
    jQuery(window).load(function() {
        jQuery(".lj-preloader").delay(100).fadeOut(500);
        jQuery('#preloader').fadeOut('slow', function () {
            //jQuery(this).remove();
        });
    });

})(jQuery);
