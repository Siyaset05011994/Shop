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



$('.representatives').owlCarousel ({
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
autoplayTimeout: 3000,
margin: 0,
},


414: {
items: 1,
nav: false,
loop: true,
dots: true,
autoplay: true,
autoplayTimeout: 3000,
margin: 20,
},
480: {
items: 2,
nav: false,
loop: true,
dots: true,
autoplay: true,
autoplayTimeout: 3000,
margin: 10,
},
600: {
items: 2,
nav: false,
loop: true,
dots: true,
autoplay: true,
autoplayTimeout: 3000,
margin: 10,
},


768: {
items: 2,
nav: false,
loop: true,
dots: true,
autoplay: true,
autoplayTimeout: 3000,
margin: 10,
},



1024: {
items: 3,
nav: false,
loop: true,
dots: true,
autoplay: true,
autoplayTimeout: 3000,
margin: 10,
},


1200: {
items: 3,
nav: false,
loop: true,
dots: true,
autoplay: true,
autoplayTimeout: 3000,
margin: 20,
}




}
})





