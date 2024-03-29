<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Scovalini
 */

get_header();
?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main">
      <div class="container">

        <?php
        while ( have_posts() ) :
          the_post();

          if ( in_category( array(25,27,29,31,33) ) ) {
            get_template_part( 'template-parts/content', 'product' );
          } else {
            get_template_part( 'template-parts/content', get_post_type() );
          }

        endwhile; // End of the loop.
        ?>

      </div><!-- .container -->
    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();
