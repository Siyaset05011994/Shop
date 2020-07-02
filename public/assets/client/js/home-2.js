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


jQuery(document).ready(function() {

    // Select2
    $(".select2").select2();

    $(".select2-limiting").select2({
        maximumSelectionLength: 2
    });


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
                    filter: '.all'
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
        nav: false,
        dots: true,
        margin: 0,
        responsiveClass: true,
        responsive: {
			
			
			
			  0: {
                items: 1,
                nav: false,
                dots: true,
                loop: true,
                margin: 30,
            },
			
			
			
			
			
			  360: {
                items: 1,
                nav: false,
                dots: true,
                loop: true,
                margin: 30,
            },
			

            414: {
                items: 1,
                nav: false,
                dots: true,
                loop: true,
                margin: 30,
            },


            480: {
                items: 1,
                nav: false,
                dots: true,
                loop: true,
                margin: 10,
            },

            767: {
                items: 2,
                nav: false,
                loop: true,
                dots: true,
                autoplay: false,
                autoplayTimeout: 1500,
                margin: 10,
            },
			
			
			980: {
                items: 3,
                nav: false,
                loop: true,
                dots: true,
                autoplay: false,
                autoplayTimeout: 1500,
                margin: 10,
            },
			
			1024: {
                items: 3,
                nav: false,
                loop: true,
                dots: true,
                autoplay: false,
                autoplayTimeout: 1500,
                margin: 30,
            },

            1280: {
                items: 3,
                nav: true,
    
                dots: false,
                autoplay: false,
                autoplayTimeout: 1500,
                margin: 30,
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

                nav: false,
                loop: true,
                dots: true,
                autoplay: false,
                autoplayTimeout: 1500,
                margin: 0,
            },


            414: {
                items: 1,
                nav: false,
                loop: true,
                dots: true,
                autoplay: false,
                autoplayTimeout: 1500,
                margin: 20,
            },
			
			
            480: {
                items: 2,
                nav: false,
                loop: true,
                dots: true,
                autoplay: false,
                autoplayTimeout: 1500,
                margin: 10,
            },
            600: {
                items: 2,
                nav: false,
                loop: true,
                dots: true,
                autoplay: false,
                autoplayTimeout: 1500,
                margin: 10,
            },

            768: {
                items: 2,
                nav: false,
                loop: true,
                dots: true,
                autoplay: false,
                autoplayTimeout: 1500,
                margin: 10,
            },


            1200: {
                items: 3,
                nav: false,
                loop: true,
                dots: true,
                autoplay: false,
                autoplayTimeout: 1500,
                margin: 40,
            }




        }
    })

});


// animation
var wow = new WOW({
    boxClass: 'wow', // animated element css class (default is wow)
    animateClass: 'animated', // animation css class (default is animated)
    offset: 120, // distance to the element when triggering the animation (default is 0)
    mobile: false, // trigger animations on mobile devices (default is true)
    live: true // act on asynchronously loaded content (default is true)
});
wow.init();



$(document).ready(function() {
    /* Example 2 */
    $("#ex2").slider({});
	
	/* Example search */
    $("#ex2-1").slider({});

    /* Example 22 */
    $('#ex22').slider({});
});

$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
});

$(document).ready(function(){
            var submitIcon = $('.searchbox-icon');
            var inputBox = $('.searchbox-input');
            var searchBox = $('.searchbox');
            var isOpen = false;
            submitIcon.on( "click", function(){
                if(isOpen == false){
                    searchBox.addClass('searchbox-open');
                    inputBox.focus();
                    isOpen = true;
                } else {
                    searchBox.removeClass('searchbox-open');
                    inputBox.focusout();
                    isOpen = false;
                }
            });  
             submitIcon.mouseup(function(){
                    return false;
                });
            searchBox.mouseup(function(){
                    return false;
                });
            $(document).mouseup(function(){
                    if(isOpen == true){
                        $('.searchbox-icon').css('display','block');
                        submitIcon.on( "click");
                    }
                });
        });
            function buttonUp(){
                var inputVal = $('.searchbox-input').val();
                inputVal = $.trim(inputVal).length;
                if( inputVal !== 0){
                    $('.searchbox-icon').css('display','none');
                } else {
                    $('.searchbox-input').val('');
                    $('.searchbox-icon').css('display','block');
                }
            }        