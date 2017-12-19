jQuery(document).ready(function($) {

    jQuery('.nav li.dropdown').find('.mobile-eve').each(function() {
        jQuery(this).on('click', function() {
            if (jQuery(window).width() < 768) {
                var nav = $(this).parent().parent();
                if (nav.hasClass('open')) {
                    nav.removeClass('open');
                } else {
                    nav.addClass('open');
                }
            }
            return false;
        });
    });

    jQuery(".search-toggle").click(function(e) {
        jQuery(".search-form-container").toggle();
    });
    jQuery(".back-to-top").click(function(e) {
        var body = jQuery("html, body");
        body.stop().animate({ scrollTop: 0 }, "500", "swing", function() {});
    });

    jQuery(document).scroll(function(e) {
        var scrollHeight = jQuery(document).scrollTop();

        if (scrollHeight >= 350 && !jQuery("#header").hasClass("header-post-scroll")) {
            if (jQuery(window).width() > 767) {
                jQuery("#header").hide();
                $('body > .wrapper').css('padding-top', jQuery("#header").height() + 'px');
                jQuery("#header").addClass("header-post-scroll");
                jQuery("#header").slideDown();
            }
        }
        if (scrollHeight <= 10 && jQuery("#header").hasClass("header-post-scroll")) {
            if (jQuery(window).width() > 767) {
                jQuery("#header").removeClass("header-post-scroll");
                $('body > .wrapper').css('padding-top', 0);
            }
        }

        if (scrollHeight >= 400) {
            jQuery(".back-to-top").show();
        }
        if (scrollHeight <= 100) {
            jQuery(".back-to-top").hide();
        }

    });

    jQuery(".cart-button").click(function() {
        var $cart = jQuery(this).siblings(".cart-data-container").children(".cart-item-container");
        if (!$cart.hasClass("bounceInLeft")) {
            $cart.removeClass("bounceOutLeft");
            $cart.addClass("bounceInLeft");
            $cart.show();
        } else {
            $cart.removeClass("bounceInLeft");
            $cart.addClass("bounceOutLeft");
            setTimeout(function() {
                $cart.hide();
            }, 1E3);
        }
    });

    jQuery(".search-button").click(function() {
        var $search = jQuery(this).siblings(".bottom-search-form-container").children(".search-form-incont");
        if (!$search.hasClass("lightSpeedIn")) {
            jQuery(this).removeClass("fa-search");
            jQuery(this).addClass("fa-times");
            $search.removeClass("lightSpeedOut");
            $search.addClass("lightSpeedIn");
            $search.show();
        } else {
            $search.removeClass("lightSpeedIn");
            $search.addClass("lightSpeedOut");
            jQuery(this).removeClass("fa-times");
            jQuery(this).addClass("fa-search");
            setTimeout(function() {
                $search.hide();
            }, 1E3);
        }
    });



    /* slider */
    var slider = new Swiper('.home-slider', {
        nextButton: '.home-next',
        prevButton: '.home-prev',
        pagination: '.home-pagination',
        paginationClickable: true,
        preventClicks: false,
        effect: 'slide',
        grabCursor: true,
        autoplay: 4000,
        loop: true
    });
    /* slider */

    /* Clients */
    var swiper = new Swiper('.home-clients', {
        nextButton: '.client-next',
        prevButton: '.client-prev',
        slidesPerView: 4,
        spaceBetween: 10,
        autoplay: 3000,
        breakpoints: {
            1024: {
                slidesPerView: 3,
                spaceBetween: 10
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 10
            },
            640: {
                slidesPerView: 2,
                spaceBetween: 10
            },
            480: {
                slidesPerView: 2,
                spaceBetween: 10
            }
        }
    });
    /* Clients */

    /* Clients */
    var swiper = new Swiper('.home-blog', {
        nextButton: '.blog-next',
        prevButton: '.blog-prev',
        slidesPerView: 3,
        spaceBetween: 10,
        autoplay: 2500,
        speed:1500,
        breakpoints: {
            1024: {
                slidesPerView: 3,
                spaceBetween: 10
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 10
            },
            640: {
                slidesPerView: 2,
                spaceBetween: 10
            },
            480: {
                slidesPerView: 2,
                spaceBetween: 10
            }
        }
    });
    /* Clients */
    if($('.masonry-posts').length){
        var msnry = new Masonry( '.masonry-posts', {
          itemSelector: '.blog-post',
        });
    }

    new WOW().init();
    var lightbox = $('.home-works .lightbox_a').simpleLightbox();
});
