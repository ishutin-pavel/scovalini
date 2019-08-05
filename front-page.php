<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Scovalini
 */

get_header();
?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main">

      <div class="container">

        <div class="home-slider">
          <div class="home-slide home-slide_1">
            <div class="row">
              <div class="offset-sm-5 col-sm-7 offset-md-5 offset-lg-6">
                <div class="home-slide__title"><?php pll_e( 'hs_title_1' ); ?></div>
                <div class="home-slide__desc"><?php pll_e( 'hs_desc_1' ); ?></div>
                <a href="#" class="home-slide__bnt"><?php pll_e( 'hs_btn_1' ); ?></a>
              </div>
            </div>
          </div><!-- .slide -->
          <div class="home-slide home-slide_2">
            <div class="row">
              <div class="col-sm-6">
                <div class="home-slide__title"><?php pll_e( 'hs_title_2' ); ?></div>
                <div class="home-slide__desc"><?php pll_e( 'hs_desc_2' ); ?></div>
                <a href="#" class="home-slide__bnt"><?php pll_e( 'hs_btn_2' ); ?></a>
              </div>
            </div>
          </div><!-- .slide -->
        </div><!-- .home-slider -->

        <section class="home-products">

          <div class="home-products__header">
            <h2 class="home-products__title"><?php pll_e( 'home_products_title' ); ?></h2>
            <img class="home-products__icon" src="/wp-content/themes/scovalini/images/coffee_machine_icon.png" alt="coffee machine icon">
            <div class="home-products__nav"></div>
          </div>
          <div class="home-products__slider">
          <?php
          //Определяем категорию товаров на основе текучего языка
          $product_cat = '';
          if( pll_current_language() == 'ru' ) $product_cat = 25;
          if( pll_current_language() == 'en' ) $product_cat = 27;
          if( pll_current_language() == 'de' ) $product_cat = 33;
          if( pll_current_language() == 'it' ) $product_cat = 29;
          if( pll_current_language() == 'fr' ) $product_cat = 31;

          // задаем нужные нам критерии выборки данных из БД
          $args = array(
            'posts_per_page' => 5,
            'cat' => $product_cat
          );

          $query = new WP_Query( $args );

          // Цикл
          if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
              $query->the_post();
              ?>

                <div class="home-products__slide">
                  <div class=" home-product">
                    <div class="home-product__img">
                      <?php the_post_thumbnail(); ?>
                    </div>
                    <div class="home-product__name">
                      <?php the_title(); ?>
                    </div>
                    <div class="home-product__features">
                      <?php if( $product_features = get_field("features") ){ echo $product_features; } ?>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="sc_button home-product__btn"><?php pll_e( 'more_btn' ); ?></a>
                  </div><!-- .home-product -->
                </div>

              <?php
            }
          } else {
            // Постов не найдено
            echo 'Товаров не найдено';
          }
          // Возвращаем оригинальные данные поста. Сбрасываем $post.
          wp_reset_postdata();
          ?>
          </div><!-- .home-products__slider -->
        </section>

      </div><!-- .container -->


    <?php
    //Вывод содержимого
    while ( have_posts() ) :
      the_post();
      ?>

      <div class="container">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

          <div class="entry-content">
            <?php
            the_content();
            ?>
          </div><!-- .entry-content -->

        </article><!-- #post-<?php the_ID(); ?> -->
      </div><!-- .container -->

    <?php
    endwhile; // End of the loop.
    ?>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();
