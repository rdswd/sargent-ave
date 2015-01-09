<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Sargent Ave
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'sargent' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="wrapper">
			<div class="site-branding">
				<div>
					<h1 class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<?php if(get_theme_mod('sargent_banner_image_heading')) : ?>
								<img src="<?php echo esc_url(get_theme_mod('sargent_banner_image_heading')) ?>" />
							<?php else : echo get_bloginfo('name'); endif; ?>
						</a>
					</h1>
					<?php if ( bloginfo( 'description') ) : ?>
						<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
					<?php endif; ?>
				</div>
			</div>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle"><?php _e( 'Menu', 'sargent' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #site-navigation -->
		</div><!-- .wrapper -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
