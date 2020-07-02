$(document).ready(function() {
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 0,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: false,
                loop: true,
                autoplay: true,
                autoplayTimeout: 1500,
                margin: 0,
            },
            414: {
                items: 1,
                nav: false,
                loop: true,
                autoplay: true,
                autoplayTimeout: 1500,
                margin: 10,
            },
            480: {
                items: 1,
                nav: false,
                loop: true,
                autoplay: true,
                autoplayTimeout: 1500,
                margin: 10,
            },
         

          600: {
                items: 2,
                nav: false,
                loop: true,
                autoplay: true,
                autoplayTimeout: 1500,
                margin: 15,
            },
            
            
           1024: {
                items: 3,
                nav: false,
                loop: true,
                autoplay: true,
                autoplayTimeout: 1500,
                margin: 15,
            },
            
            
            1200: {
                items: 3,
                nav: false,
                loop: true,
                autoplay: true,
                autoplayTimeout: 3000,
                margin: 15,
            }
        }
    })
});