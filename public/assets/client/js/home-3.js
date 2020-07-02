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


jQuery(document).ready(function () {

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
    owl-carousel
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
                autoplay: true,
                autoplayTimeout: 1500,
                margin: 0,
            },


            414: {
                items: 1,
                nav: false,
                loop: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 1500,
                margin: 20,
            },
            480: {
                items: 2,
                nav: false,
                loop: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 1500,
                margin: 10,
            },
            600: {
                items: 2,
                nav: false,
                loop: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 1500,
                margin: 10,
            },

            768: {
                items: 3,
                nav: false,
                loop: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 1500,
                margin: 10,
            },


            1200: {
                items: 3,
                nav: false,
                loop: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 1500,
                margin: 20,
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

//Leaflet google map


var cities = L.layerGroup();

L.marker([39.61, -105.02]).bindPopup('<div class="listing-window-image-wrapper"><a href="location-category.html"><div class="listing-window-image" style="background-image: url(assets/images/home/gallery1.jpg);"></div><div class="listing-window-content"><div class="info"><h2>Real House Luxury Villa</h2><p>Est St, 77 - Central Park South, NYC</p><h3>$ 230,000</h3></div></div></a></div>').addTo(cities),

L.marker([39.74, -104.99]).bindPopup('<div class="listing-window-image-wrapper"><a href="location-category.html"><div class="listing-window-image" style="background-image: url(assets/images/home/gallery2.jpg);"></div><div class="listing-window-content"><div class="info"><h2>Real House Luxury Villa</h2><p>Est St, 77 - Central Park South, NYC</p><h3>$ 230,000</h3></div></div></a></div>').addTo(cities),
    L.marker([39.73, -104.8]).bindPopup('<div class="listing-window-image-wrapper"><a href="location-category.html"><div class="listing-window-image" style="background-image: url(assets/images/home/gallery3.jpg);"></div><div class="listing-window-content"><div class="info"><h2>Real House Luxury Villa</h2><p>Est St, 77 - Central Park South, NYC</p><h3>$ 230,000</h3></div></div></a></div>').addTo(
        cities),
    L.marker([39.45, -105.35]).bindPopup('<div class="listing-window-image-wrapper"><a href="location-category.html"><div class="listing-window-image" style="background-image: url(assets/images/home/gallery4.jpg);"></div><div class="listing-window-content"><div class="info"><h2>Real House Luxury Villa</h2><p>Est St, 77 - Central Park South, NYC</p><h3>$ 230,000</h3></div></div></a></div>').addTo(cities),
    L.marker([39.65, -105.55]).bindPopup('<div class="listing-window-image-wrapper"><a href="location-category.html"><div class="listing-window-image" style="background-image: url(assets/images/home/gallery4.jpg);"></div><div class="listing-window-content"><div class="info"><h2>Real House Luxury Villa</h2><p>Est St, 77 - Central Park South, NYC</p><h3>$ 230,000</h3></div></div></a></div>').addTo(cities),

    L.marker([39.65, -104.65]).bindPopup('<div class="listing-window-image-wrapper"><a href="location-category.html"><div class="listing-window-image" style="background-image: url(assets/images/home/gallery4.jpg);"></div><div class="listing-window-content"><div class="info"><h2>Real House Luxury Villa</h2><p>Est St, 77 - Central Park South, NYC</p><h3>$ 230,000</h3></div></div></a></div>').addTo(cities),



    L.marker([39.47, -105.16]).bindPopup('<div class="listing-window-image-wrapper"><a href="location-category.html"><div class="listing-window-image" style="background-image: url(assets/images/home/gallery4.jpg);"></div><div class="listing-window-content"><div class="info"><h2>Real House Luxury Villa</h2><p>Est St, 77 - Central Park South, NYC</p><h3>$ 230,000</h3></div></div></a></div>').addTo(cities),

    L.marker([39.85, -104.55]).bindPopup('<div class="listing-window-image-wrapper"><a href="location-category.html"><div class="listing-window-image" style="background-image: url(assets/images/home/gallery4.jpg);"></div><div class="listing-window-content"><div class="info"><h2>Real House Luxury Villa</h2><p>Est St, 77 - Central Park South, NYC</p><h3>$ 230,000</h3></div></div></a></div>').addTo(cities),


    L.marker([34.77, -105.23]).bindPopup('<div class="listing-window-image-wrapper"><a href="location-category.html"><div class="listing-window-image" style="background-image: url(assets/images/home/gallery4.jpg);"></div><div class="listing-window-content"><div class="info"><h2>Real House Luxury Villa</h2><p>Est St, 77 - Central Park South, NYC</p><h3>$ 230,000</h3></div></div></a></div>').addTo(cities);



var mbAttr = '	' +
    ' ' +
    '',
    mbUrl = 'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';

var grayscale = L.tileLayer(mbUrl, {
        id: 'mapbox.light',
        attribution: mbAttr
    }),
    streets = L.tileLayer(mbUrl, {
        id: 'mapbox.streets',
        attribution: mbAttr
    });

var map = L.map('map', {
    center: [39.66, -104.80],
    zoom: 8.5,
    layers: [streets, cities]
});

var baseLayers = {
    "Grayscale": grayscale,
    "Streets": streets
};

var overlays = {
    "Cities": cities
};

map.scrollWheelZoom.disable()
L.control.layers(baseLayers, overlays).addTo(map);



$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
 
 
 
 
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
                autoplayTimeout: 1500,
                margin: 0,
            },


            414: {
                items:3,
                nav: false,
                loop: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 1500,
                margin: 20,
            },
            480: {
                items: 4,
                nav: false,
                loop: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 1500,
                margin: 10,
            },
            600: {
                items: 4,
                nav: false,
                loop: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 1500,
                margin: 10,
            },

            768: {
                items: 5,
                nav: false,
                loop: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 1500,
                margin: 10,
            },


            1200: {
                items: 5,
                nav: false,
                loop: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 1500,
                margin: 20,
            }




        }
    })
	
	