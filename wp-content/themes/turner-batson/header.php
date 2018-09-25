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
			</a></h1>
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
