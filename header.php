<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Scovalini
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&display=swap&subset=cyrillic" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'scovalini' ); ?></a>

		<header id="masthead" class="site-header">
			<div class="container">

			<div class="header-contacts">
				<div class="header-contacts__phone">
					<img src="/wp-content/themes/scovalini/images/phone.png" alt="Phone">
					<?php pll_e( 'phone_1' ); ?>
				</div>
				<div class="header-contacts__address">
					<img src="/wp-content/themes/scovalini/images/map.png" alt="Map">
					<?php pll_e( 'address' ); ?>
				</div>
			</div><!-- .header-contacts -->

			<div class="site-branding">
				<?php the_custom_logo(); ?>
			</div><!-- .site-branding -->

			<div class="header-lang">
				<img src="/wp-content/themes/scovalini/images/earth.png" alt="Earth">
				<?php do_action( 'add_my_pll' ); ?>
				<div class="header-support">
					<img src="/wp-content/themes/scovalini/images/mail.png" alt="Mail">
					<div class="header-support__box">
							<div>Техническая поддержка</div>
							<div>
								<a href="mailto:info@miletto-compagnia.com">info@scovalini.com</a>
							</div>
					</div>
				</div>
			</div><!-- .header-lang -->

			</div><!-- .container -->
		</header><!-- #masthead -->

<div class="container">

	<nav id="site-navigation" class="main-navigation">
		<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
			<img src="/wp-content/themes/scovalini/images/menu.svg" alt="menu">
		</button>
		<?php
		wp_nav_menu( array(
			'theme_location' => 'menu-1',
			'menu_id'        => 'primary-menu',
		) );
		?>
	</nav><!-- #site-navigation -->

</div><!-- .container -->


	<div id="content" class="site-content">
