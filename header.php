<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Bassic
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>
><div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'bassic' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
	<div class="row">
		<div class="site-branding">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			    <img id="site-logo" src="<?php bloginfo('template_directory'); ?>/images/logo-header.png" alt="Your Image Description Here" />
			    <h1>Von Arden Productions</h1>
			</a>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php _e( 'Primary Menu', 'bassic' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
