<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package turner-batson
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="Content-Language" content="en">
		<meta name="google" content="notranslate">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">

		<?php // gravity_form_enqueue_scripts( 1, true ); ?>
		<?php wp_head(); ?>
	</head>

<body <?php body_class('font-sans'); ?>>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', THEME_NAME ); ?></a>

	<header id="masthead" class="w-full flex justify-between items-center fixed pl-6 py-6" role="banner" data-menu-style="dark">
		<h1>
			<a class="flex items-center">
				<?php echo do_shortcode( '[logo classname="w-8 h-auto"]' ); ?>
				<span class="page-name ml-2 text-base md:text-md uppercase font-medium"><?php echo get_page_name( get_post_type() ); ?></span>
			</a>
		</h1>

		<nav class="nav" role="navigation">
			<button class="menu-toggle z-50 w-6 relative cursor-pointer" aria-expanded="false">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</button>

			<?php wp_nav_menu( array( 'theme_location' => 'menu-main', 'menu_id' => 'primary-menu', 'menu_class' => 'flex', 'container_class' => 'fixed pin z-40' ) ); ?>

		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
