<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Scovalini
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('sc_product'); ?>>

      <?php
        the_content();
      ?>

  <div class="sc_product__sep"></div>

</article><!-- #post-<?php the_ID(); ?> -->
