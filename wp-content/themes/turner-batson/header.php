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

	<header id="masthead" class="w-full flex justify-between items-center fixed pl-6 py-6 z-50 pointer-events-none" role="banner">
		<h1 class="branding relative z-50">
			<div class="flex items-center">
				<a class="h-8 w-8" href="<?php echo home_url(); ?>"><?php echo do_shortcode( '[logo classname="w-full h-full"]' ); ?></a>
				<button class="page-name ml-2 text-base md:text-md uppercase font-medium name-toggle<?php echo is_front_page() ? ' opacity-0' : ''; ?>" aria-expanded="false" style="pointer-events: <?php echo is_front_page() ? 'none' : 'auto'; ?>"><?php echo get_page_name( $post_type ); ?></button>
			</div>
		</h1>

		<nav class="nav pointer-events-auto" role="navigation">
			<button class="menu-toggle z-40 w-6 relative cursor-pointer" aria-expanded="false">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</button>
		
			<div class="menu-wrapper flex flex-col justify-end items-center fixed pin z-30 bg-black p-6 overflow-hidden w-screen">
				<?php wp_nav_menu( array( 'theme_location' => 'menu-main', 'menu_id' => 'primary-menu', 'menu_class' => 'list-reset flex flex-col justify-end items-between flex-wrap menu-item-list w-full p-8 pb-4 sm:pb-8 m-0', 'container' => false ) ); ?>
				<div class="menu-aside flex items-center w-full text-white py-4 px-8 sm:p-8 m-0">
					<p class="leading-none flex-no-shrink font-medium hidden lg:block lg:w-1/2 mr-2"><?php the_field('tb_company_address', 'options' ); ?></p>
					<p class="menu-tagline uppercase fixed lg:static font-medium leading-none mr-8 flex-1">People. Passion. Purpose</p>
					<?php if ( is_active_sidebar( 'social-widget-area' ) ) {
						dynamic_sidebar( 'social-widget-area' );
					} ?>
				</div>
			</div>

		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
