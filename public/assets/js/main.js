(function($) {
    "use strict";
    jQuery(document).ready(function($) {
        // wow animation initialization
        new WOW().init();

        // slicknav activate for home 1
        activateSlickNav('#mainMenu', '#mobileMenu');

        // slicknav activate for home 2
        activateSlickNav('#mainMenuHome2', '#mobileMenuHome2');

        // slicknav activate for home 3
        activateSlickNav('#mainMenuHome3', '#mobileMenuHome3');

        // slicknav activate function
        function activateSlickNav(selector, mobileMenu) {
            $(selector).slicknav({
                prependTo: mobileMenu
            });
        }

        // search popup show
        $("li.search-icon a").on('click', function(e) {
            e.preventDefault();
            $(".search-popup").addClass('popup');
        });

        // search popup remove
        $("#searchCloseBtn, .search-popup-overlay").on('click', function() {
            $(".search-popup").removeClass('popup');
        });

        // language dropdown toggle on clicking button
        $('.language a.dropdown-btn').on('click', function(event) {
            event.preventDefault();
            $(this).next('.language-dropdown').toggleClass('open');
        });

        // hero carousel
        $('.hero-carousel').owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 6000,
            autoplaySpeed: 2000,
            dots: true,
            nav: false,
            mouseDrag: true,
            smartSpeed: 2000,
            animateOut: 'fadeOut'
        });

        // service carousel
        $('.service-carousel').owlCarousel({
            items: 3,
            loop: true,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplaySpeed: 1000,
            dots: false,
            nav: true,
            navText: ["<i class='flaticon-left-arrow'></i>", "<i class='flaticon-right-arrow'></i>"],
            margin: 30,
            mouseDrag: true,
            smartSpeed: 1000,
            responsive: {
                // breakpoint from 0 up
                0: {
                    items: 1,
                    nav: false
                },
                576: {
                    items: 1,
                    nav: true
                },
                // breakpoint from 480 up
                768: {
                    items: 2
                },
                // breakpoint from 768 up
                992: {
                    items: 3
                }
            }
        });

        // testimonial carousel
        $('.testimonial-carousel').owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplaySpeed: 1000,
            dots: false,
            nav: false,
            mouseDrag: true,
            smartSpeed: 1000
        });

        // Partner carousel
        $('.partner-carousel').owlCarousel({
            loop: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplaySpeed: 500,
            autoplayHoverPause: true,
            dots: false,
            margin: 30,
            responsive: {
                0: {
                    items: 2
                },
                576: {
                    items: 3
                },
                992: {
                    items: 5
                },
            }
        });


        // Home 3 testimonial carousel
        $('.testimonial-carousel-3').owlCarousel({
            items: 2,
            loop: true,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplaySpeed: 1000,
            dots: false,
            nav: false,
            mouseDrag: true,
            smartSpeed: 1000,
            margin: 30,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                }
            }
        });

        // background video initialization for home 7
        if ($("#bgndVideo7").length > 0) {
            $("#bgndVideo7").YTPlayer();
        }

        // background video initialization for home 8
        if ($("#bgndVideo8").length > 0) {
            $("#bgndVideo8").YTPlayer();
        }

        // background video initialization for home 9
        if ($("#bgndVideo9").length > 0) {
            $("#bgndVideo9").YTPlayer();
        }

        // ripple effect initialization for home 13
        if ($("#heroHome13").length > 0) {
            $('#heroHome13').ripples({
                resolution: 500,
                dropRadius: 20,
                perturbance: 0.04
            });
        }

        // ripple effect initialization for home 13
        if ($("#heroHome14").length > 0) {
            $('#heroHome14').ripples({
                resolution: 500,
                dropRadius: 20,
                perturbance: 0.04
            });
        }

        // ripple effect initialization for home 13
        if ($("#heroHome15").length > 0) {
            $('#heroHome15').ripples({
                resolution: 500,
                dropRadius: 20,
                perturbance: 0.04
            });
        }

        // Back to top
        $('.back-to-top').on('click', function() {
            $("html, body").animate({
                scrollTop: 0
            }, 1000);
        });
        
        // quickview product slider with thumbnail
        $('.quickview-slider').owlCarousel({
            autoplay: true,
            autoplayTimeout: 8000,
            smartSpeed: 1500,
            loop: true,
            autoplayHoverPause: true,
            items: 1,
            center: true,
            dots: false,
            thumbs: true,
            thumbImage: false,
            thumbsPrerendered: true,
            thumbContainerClass: 'owl-thumbs',
            thumbItemClass: 'owl-thumb-item',
        });

        // Product thumbnail sliders
        $('.product-thumb-slider').owlCarousel({
            loop: false,
            dots: false,
            nav: true,
            navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
            autoplay: false,
            margin: 5,
            responsive: {
                0: {
                    items: 4
                }
            }
        });

        // product image zoom initialization function
        function initzoom() {
            if ($('.easyzoom').length > 0) {
                var $easyzoom = $('.easyzoom').easyZoom();
            }
        }


        // Product preview
        if ($('.product-details .product-preview').length > 0) {
            let activeSmallSrc = $('.product-details .product-thumb-slider .single-product').eq(0).find('img.small').attr('src');
            let activeBigSrc = $('.product-details .product-thumb-slider .single-product').eq(0).find('img.big').attr('src');
            $('.product-details .product-preview').find('a').attr('href', activeBigSrc);
            $('.product-details .product-preview').find('img').attr('src', activeSmallSrc);

            $('.product-details .product-thumb-slider img.small').on('click', function () {
                let currimg = `<div class="easyzoom easyzoom--overlay">
                                <a href="${$(this).siblings('img.big').attr('src')}">
                                    <img class="single-image" src="${$(this).attr('src')}" alt=""/>
                                </a>
                              </div>`;
                $('.product-details .product-preview').html(currimg);
                initzoom();
            });
        }

        // initialize product image zoom 
        initzoom();        

        // Project details carousel
        $('.project-carousel').owlCarousel({
            loop: true,
            dots: false,
            nav: true,
            navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
            autoplay: false,
            items: 1
        });  
        
        // show shipping address form if not same as billing address
        if ($('input#sameStatus').length > 0) {
            $('input#sameStatus').on('change', function () {
                if ($('input#sameStatus').prop('checked') == false) {
                    $("#shippingAddress").addClass('d-block');
                } else {
                    $("#shippingAddress").removeClass('d-block');
                }
            });
        }        
        
    });


    $(window).on('scroll', function() {
        // sticky menu activation
        if ($(window).scrollTop() > 180) {
            $('.header-area').addClass('sticky-navbar');
        } else {
            $('.header-area').removeClass('sticky-navbar');
        }
        // back to top button fade in / fade out
        if ($(window).scrollTop() > 1000) {
            $('.back-to-top').addClass('show');
        } else {
            $('.back-to-top').removeClass('show');
        }
    });


    jQuery(window).on('load', function() {
        // preloader fadeout onload
        $(".loader-container").addClass('loader-fadeout');

        // isotope initialize
        $('.grid').isotope({
            // set itemSelector so .grid-sizer is not used in layout
            itemSelector: '.single-pic',
            percentPosition: true,
            masonry: {
                // set to the element
                columnWidth: '.grid-sizer'
            }
        })
    });

}(jQuery));