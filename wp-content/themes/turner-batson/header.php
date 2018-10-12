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

$post_type = get_post_type();
$culture = is_page( 'culture' ) ? ' culture' : '';
$connect = is_page( 'connect' ) ? ' connect' : '';

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="Content-Language" content="en">
		<meta name="google" content="notranslate">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">

		<?php if ( is_page( 'connect' ) ) {
			gravity_form_enqueue_scripts( 1, false );
		} ?>
		<?php wp_head(); ?>
	</head>

<body <?php body_class('font-sans text-black' . $culture . $connect ); ?>>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', THEME_NAME ); ?></a>

	<header id="masthead" class="w-full flex justify-between items-center fixed pl-6 py-6 z-50" role="banner">
		<h1 class="branding relative z-50">
			<a class="flex items-center">
				<?php echo do_shortcode( '[logo classname="w-8 h-auto"]' ); ?>
				<span class="page-name ml-2 text-base md:text-md uppercase font-medium"><?php echo get_page_name( $post_type ); ?></span>
			</a>
		</h1>

		<nav class="nav" role="navigation">
			<button class="menu-toggle z-40 w-6 relative cursor-pointer" aria-expanded="false">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</button>
		
			<div class="menu-wrapper flex flex-col justify-end items-center fixed pin z-30 bg-black p-6 overflow-hidden w-screen">
				<?php wp_nav_menu( array( 'theme_location' => 'menu-main', 'menu_id' => 'primary-menu', 'menu_class' => 'list-reset flex flex-col justify-end items-between flex-wrap menu-item-list w-full p-8 m-0', 'container' => false ) ); ?>
				<div class="menu-aside flex justify-between items-center w-full text-white p-8 m-0">
					<p class="menu-tagline uppercase fixed lg:static font-medium leading-none">People. Passion. Purpose</p>
					<p class="leading-none font-medium hidden lg:block"><?php the_field('tb_company_address', 'options' ); ?></p>
					<?php if ( is_active_sidebar( 'social-widget-area' ) ) {
						dynamic_sidebar( 'social-widget-area' );
					} ?>
				</div>
			</div>

		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
