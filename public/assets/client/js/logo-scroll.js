/* ---------------------------------------------
logo scroll
 --------------------------------------------- */
"use strict";

    $('.owlCarousel-logo').owlCarousel ({
        loop: true,
        margin: 0,
        responsiveClass: true,
        responsive: {
            0: {
                items:2,
                nav: false,
                loop: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 1000,
                margin: 0,
            },


            414: {
                items:3,
                nav: false,
                loop: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 1000,
                margin: 20,
            },
            480: {
                items: 4,
                nav: false,
                loop: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 1000,
                margin: 10,
            },
            600: {
                items: 4,
                nav: false,
                loop: true,
                dots: true,
                autoplay: false,
                autoplayTimeout: 1000,
                margin: 10,
            },

            768: {
                items: 5,
                nav: false,
                loop: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 1000,
                margin: 10,
            },


            1200: {
                items: 5,
                nav: false,
                loop: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 1000,
                margin: 20,
            }




        }
    })
            