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
	
	
	
	
//Leaflet google map 1
var mymap = L.map('mapid1').setView([51.505, -0.09], 13);
	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox.streets'
	}).addTo(mymap);

	L.marker([51.5, -0.09]).addTo(mymap)
		.bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();

	var popup = L.popup();

	function onMapClick(e) {
		popup
			.setLatLng(e.latlng)
			.setContent("You clicked the map at " + e.latlng.toString())
			.openOn(mymap);
	}

	mymap.on('click', onMapClick);



//Leaflet google map 2
var mymap = L.map('mapid2').setView([51.000, -0.09], 13);
	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox.streets'
	}).addTo(mymap);

	L.marker([51.5, -0.09]).addTo(mymap)
		.bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();

	var popup = L.popup();

	function onMapClick(e) {
		popup
			.setLatLng(e.latlng)
			.setContent("You clicked the map at " + e.latlng.toString())
			.openOn(mymap);
	}

	mymap.on('click', onMapClick);

//Leaflet google map 3
var mymap = L.map('mapid3').setView([51.300, -0.09], 13);
	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox.streets'
	}).addTo(mymap);

	L.marker([51.5, -0.09]).addTo(mymap)
		.bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();

	var popup = L.popup();

	function onMapClick(e) {
		popup
			.setLatLng(e.latlng)
			.setContent("You clicked the map at " + e.latlng.toString())
			.openOn(mymap);
	}

	mymap.on('click', onMapClick);



//Leaflet google map 4
var mymap = L.map('mapid4').setView([51, -0.09], 13);
	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox.streets'
	}).addTo(mymap);

	L.marker([51.5, -0.09]).addTo(mymap)
		.bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();

	var popup = L.popup();

	function onMapClick(e) {
		popup
			.setLatLng(e.latlng)
			.setContent("You clicked the map at " + e.latlng.toString())
			.openOn(mymap);
	}

	mymap.on('click', onMapClick);




//Leaflet google map 0
var mymap = L.map('mapid0').setView([51.111, -0.09], 13);
	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox.streets'
	}).addTo(mymap);

	L.marker([51.5, -0.09]).addTo(mymap)
		.bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();

	var popup = L.popup();

	function onMapClick(e) {
		popup
			.setLatLng(e.latlng)
			.setContent("You clicked the map at " + e.latlng.toString())
			.openOn(mymap);
	}

	mymap.on('click', onMapClick);
