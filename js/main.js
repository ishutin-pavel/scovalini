jQuery(document).ready(function() {


  jQuery('.home-slider').slick({
    dots: false,
    arrows: false,
    infinite: true,
    slidesToShow: 1
  });

  jQuery('.home-products__slider').slick({
    dots: false,
    arrows: true,
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 2,
    appendArrows: jQuery('.home-products__nav'),
    responsive: [
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 2
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
  });

});//ready