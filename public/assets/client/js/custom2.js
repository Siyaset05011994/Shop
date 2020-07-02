/* ---------------------------------------------
Preloader - Home page
 --------------------------------------------- */
"use strict";
jQuery(window).on('load', function() {
    // will first fade out the loading animation
    jQuery("#status").fadeOut();
    // will fade out the whole DIV that covers the website.
    jQuery("#preloader").delay(500).fadeOut("slow");

})

// Carousel - Top banner
$('#myCarousel').carousel({
    interval: 6000,
    pause: "false"
});

/* ---------------------------------------------
Portfolio mixItUp
--------------------------------------------- */

$(function() {
    var filterList = {
        init: function() {
            // MixItUp plugin
            // http://mixitup.io
            $('#portfoliolist').mixItUp({
                selectors: {
                    target: '.portfolio',
                    filter: '.filter'
                },
                load: {
                    filter: '.property, .business , .rent, .purchase, .sale'
                }
            });
        }
    };
    // Run the show!
    filterList.init();
});

$(document).ready(function() {
    /* ---------------------------------------------
    owl-carousel2 - Blog popup Slider
    --------------------------------------------- */

    $('.owl-carousel2').owlCarousel({
        loop: true,
        margin: 0,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: false,
                dots: true
            },
        }
    })
    /* ---------------------------------------------
    owl-carousel - Header Logo Slider
    --------------------------------------------- */
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 0,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,

                nav: true,
                loop: true,
                autoplay: false,
                autoplayTimeout: 1500,
                margin: 0,
            },
            414: {
                items: 1,
                nav: true,
                loop: true,
                autoplay: false,
                autoplayTimeout: 1500,
                margin: 20,
            },
            480: {
                items: 2,
                nav: true,
                loop: true,
                autoplay: false,
                autoplayTimeout: 1500,
                margin: 10,
            },
            600: {
                items: 3,
                nav: true,
                loop: true,
                autoplay: false,
                autoplayTimeout: 1500,
                margin: 10,
            },
            1200: {
                items: 3,
                nav: true,
                loop: true,
                autoplay: false,
                autoplayTimeout: 1500,
                margin: 10,
            }
        }
    })
});
$('.owl-carouse2').owlCarousel({
    loop: true,
    margin: 0,
    responsiveClass: true,
    responsive: {
        0: {
            items: 1,
            nav: false,
            loop: true,
            autoplay: false,
            dots: true,
            autoplayTimeout: 1500,
            margin: 0,
        },
        414: {
            items: 1,
            nav: false,
            loop: true,
            autoplay: false,
            dots: true,
            autoplayTimeout: 1500,
            margin: 20,
        },
        480: {
            items: 2,
            nav: false,
            loop: true,
            autoplay: false,
            dots: true,
            autoplayTimeout: 1500,
            margin: 10,
        },
        600: {
            items: 2,
            nav: false,
            loop: true,
            autoplay: false,
            dots: true,
            autoplayTimeout: 1500,
            margin: 10,
        },
        1200: {
            items: 2,
            nav: false, 
            loop: true,
            autoplay: false,
            dots: true,
            autoplayTimeout: 1500,
            margin: 20,
        }
    }
})