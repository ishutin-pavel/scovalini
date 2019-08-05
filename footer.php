<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Scovalini
 */

?>

  </div><!-- #content -->

  <footer class="site-footer">

    <div class="container">

      <div class="fcontacts">
        <div class="row">
          <div class="col-sm-6">

            <div class="row">
              <div class="col-sm-6">
                <div id="yandex-map"></div>
              </div>
              <div class="col-sm-6">
                <div class="sep"></div>
                <div class="fcontacts__title"><?php pll_e( 'footer_contacts_title' ); ?></div>
                <div class="fcontacts__term"><?php pll_e( 'footer_contacts_address' ); ?></div>
                <div class="fcontacts__def"><?php pll_e( 'address' ); ?></div>
                <div class="fcontacts__term"><?php pll_e( 'footer_contacts_phone' ); ?></div>
                <div class="fcontacts__def"><?php pll_e( 'phone_1' ); ?></div>
                <div class="fcontacts__term"><?php pll_e( 'footer_contacts_support' ); ?></div>
                <div class="fcontacts__def"><?php pll_e( 'email' ); ?></div>
              </div>
            </div>

          </div><!-- .col -->
          <div class="col-sm-6">
            <div class="fcontacts__title" style="margin-top: 62px;"><?php pll_e( 'f_title' ); ?></div>
            <p><?php pll_e( 'f_desc' ); ?></p>

              <form id="f-form" class="form" action="javascript();">
                  <input type="text" name="name" placeholder="<?php pll_e( 'f_name' ); ?>">
                  <input type="text" name="surname" placeholder="<?php pll_e( 'f_surname' ); ?>">
                  <textarea name="comment" placeholder="<?php pll_e( 'f_text' ); ?>"></textarea>
                  <input type="submit" value="<?php pll_e( 'f_btn' ); ?>">
                <div class="message"></div>
              </form>

          </div><!-- .col -->
        </div><!-- .row -->
      </div><!-- .fcontacts -->

      <div class="footer-bottom">

        <div class="site-branding">
          <?php the_custom_logo(); ?>
        </div><!-- .site-branding -->

        <nav class="footer-navigation">
          <?php
          wp_nav_menu( array(
            'theme_location' => 'menu-2',
            'menu_id'        => 'footer-menu',
          ) );
          ?>
        </nav><!-- #site-navigation -->

      </div><!-- .footer-nav -->

    </div><!-- .container -->

  </footer>
</div><!-- #page -->

<?php wp_footer(); ?>
<script>
  jQuery(document).ready(function() {

  //Yandex map
    ymaps.ready(init);
    var myMap;

    function init(){
      myMap = new ymaps.Map("yandex-map", {
          center: [<?php pll_e( 'coordinates' ); ?>],
          zoom: 16,
          behaviors: [ 'multiTouch', 'drag' ],//подключаем только перетаскивание и мультикасания для телефона
          controls: ['zoomControl']
      });

      myPlacemark = new ymaps.Placemark([<?php pll_e( 'coordinates' ); ?>], {
        hintContent: '',
        balloonContent: ''
        },
        {
          // Опции.
          // Необходимо указать данный тип макета.
          iconLayout: 'default#image',
          // Своё изображение иконки метки.
          iconImageHref: '/wp-content/themes/scovalini/images/map-point.png',
          // Размеры метки.
          iconImageSize: [30, 39]
      });

      myMap.geoObjects.add(myPlacemark);

    }//init

  });//ready
</script>

</body>
</html>
