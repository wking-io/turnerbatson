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

$dark_theme = is_page('connect') ? 'theme--dark' : '';

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

<body <?php body_class($dark_theme); ?>>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', THEME_NAME ); ?></a>

	<header id="masthead" class="" role="banner">
			<h1>
				<a>
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
						<path d="M0 0h99.71v99.8H0z" class="logo-back" />
						<path d="M20.44 40.37L0 66.28V40.37h20.44zM28.64 29.97H0V0h52.29L28.64 29.97zM7.45 73.6l26.22-33.23h23c8.54 0 14.73 6.76 14.73 16.08v1.06A16.1 16.1 0 0 1 55.27 73.6z" class="logo-front"/>
						<path d="M100 0v100H0V84h55.27a26.51 26.51 0 0 0 26.47-26.49v-1.06C81.74 41.36 71 30 56.63 30H41.87L65.52 0z" class="logo-front"/>
					</svg>
					<span><?php echo get_page_name( get_post_type() ); ?></span>
				</a>
			</h1>
		</div><!-- .site-branding -->

		<nav class="nav" role="navigation">

			<div class="nav__toggle">
				<button class="menu-toggle" aria-expanded="false">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</button>
			</div>

			<?php wp_nav_menu( array( 'theme_location' => 'menu-main', 'menu_id' => 'primary-menu', 'menu_class' => 'list-reset nav__menu__wrapper', 'container_class' => 'nav__menu' ) ); ?>

		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
