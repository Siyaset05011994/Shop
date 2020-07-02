$('.responsive').slick({
  dots: true,
  arrow: false,
  infinite: false,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
		 arrow: false,	
        dots: true
      }
    },
    {
      breakpoint: 600,
settings: {
slidesToShow: 2,
slidesToScroll: 2,
arrow: false	
      }
    },
    {
      breakpoint: 480,
settings: {
slidesToShow: 1,
slidesToScroll: 1,
arrow: false	
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
		