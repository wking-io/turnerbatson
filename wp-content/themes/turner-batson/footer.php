<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package turner-batson
 */

?>

	<footer id="colophon" class="footer flex items-center" role="contentinfo">
		<?php if ( is_active_sidebar( 'social-widget-area' ) ) : ?>
			<div class="footer__social social-links flex">
				<?php dynamic_sidebar( 'social-widget-area' ); ?>
			</div>
		<?php endif; ?>
		
		<?php wp_nav_menu( array( 'theme_location' => 'menu-footer', 'menu_id' => 'primary-menu', 'menu_class' => 'list-reset nav__menu__wrapper', 'container_class' => 'nav__menu' ) ); ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
