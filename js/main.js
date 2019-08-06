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
            slidesToShow: 2,
            slidesToScroll: 2
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

  jQuery('.cool-input__input').on('input', function(){
      var $this = jQuery(this);
      if ($this.val() == '') {
          $this.removeClass('cool-input__input_filled');
      } else {
          $this.addClass('cool-input__input_filled');
      }
  });


  //Отправляем форму
  jQuery(".f-form").submit(function() {
    var form = jQuery(this);
    var message = jQuery(this).find('.message');
      message.html('<span style="color:green;">Отправляем...</span>');
    //yaCounter46416018.reachGoal('FORDER'); // изменить номер счётчика иначе ошибка !!!
      jQuery.ajax({
        type: "POST",
        url: "/wp-content/themes/scovalini/mail.php",
        data: form.serialize(),
        success: function ( serverAnswer ) { message.html(serverAnswer); }
      });
  return false;
  });

});//ready