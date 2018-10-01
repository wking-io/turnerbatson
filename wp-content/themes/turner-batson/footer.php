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
	<footer id="footer" class="footer py-8 bg-black" role="contentinfo">
		<div class="wrapper flex flex-col md:flex-row md:items-center justify-between py-4">
			<div class="flex flex-col lg:flex-row md:w-2/3">
				<div class="branding flex flex-col items-start justify-start lg:w-1/2 pb-3 lg:pb-0">
					<?php echo do_shortcode( '[logo classname="w-12 mb-4 h-auto"]' ); ?>
					<?php echo do_shortcode( '[name classname="h-4" in-color="false" ]' ); ?>
					<p class="text-white pt-4"><?php echo tb_copyright(); ?> TurnerBatson Architects, P.C.</p>
				</div>
				<div class="lg:w-1/2 py-8 lg:py-0">
					<p class="text-white pb-6 leading-normal max-w-3xl"><?php the_field( 'tb_company_address', 'options' ) ?></p>
					<?php if ( is_active_sidebar( 'social-widget-area' ) ) : ?>
							<?php dynamic_sidebar( 'social-widget-area' ); ?>
					<?php endif; ?>
				</div>
			</div>
			
			<?php wp_nav_menu( array( 'theme_location' => 'menu-footer', 'menu_id' => 'primary-menu', 'menu_class' => 'list-reset menu-item-list flex flex-col flex-wrap', 'container_class' => 'md:w-1/2 lg:w-1/3 pt-3 lg:pt-0' ) ); ?>
	</div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
