<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
/**
 * The template for displaying archive pages
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
        <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
            <?php if(function_exists('bcn_display'))
            {
                bcn_display();
            }?>
        </div>

      <?php if ( have_posts() ) : ?>

        <?php
        /* Start the Loop */
        while ( have_posts() ) :
          the_post();

          /*
           * Include the Post-Type-specific template for the content.
           * If you want to override this in a child theme, then include a file
           * called content-___.php (where ___ is the Post Type name) and that will be used instead.
           */
          if( is_category( array(25,27,29,31,33) ) ) {
            get_template_part( 'template-parts/content', 'product' );
          } else {
            get_template_part( 'template-parts/content', get_post_type() );
          }


        endwhile;

        //the_posts_navigation();
        //Загрузчить ещё
         if (  $wp_query->max_num_pages > 1 ) : ?>
          <script>
          var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
          var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
          var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
          var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
          </script>
          <div id="true_loadmore">Загрузить ещё</div>
        <?php endif;
        //end

      else :

        get_template_part( 'template-parts/content', 'none' );

      endif;
      ?>
      </div><!-- .container -->
    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();
