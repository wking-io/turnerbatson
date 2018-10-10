<?php
/**
 * Add all assets for theme
 *
 * @package turner-batson
 */

if ( ! function_exists( 'turnerbatson_scripts' ) ) :

	function turnerbatson_scripts() {

		wp_register_script( 'polyfill', get_template_directory_uri() . '/assets/js/polyfill.js', array(), '1.0.0', true );
		wp_enqueue_script( 'polyfill' );
		
	    wp_register_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true );
		wp_enqueue_script( 'main' );
		
		if ( is_front_page() ) :
			wp_register_script( 'home', get_template_directory_uri() . '/assets/js/home.js', array(), '1.0.0', true );
			wp_enqueue_script( 'home' );
		endif;

		if ( is_post_type_archive( 'portfolio' ) || is_tax( 'project-type' ) ) :
			wp_register_script( 'portfolio', get_template_directory_uri() . '/assets/js/portfolio.js', array(), '1.0.0', true );
			wp_enqueue_script( 'portfolio' );
		endif;
		
		if ( is_singular( 'portfolio' ) ) :
			wp_register_script( 'portfolio-single', get_template_directory_uri() . '/assets/js/portfolio-single.js', array(), '1.0.0', true );
			wp_enqueue_script( 'portfolio-single' );
		endif;

		if ( is_post_type_archive( 'team' ) ) :
			wp_register_script( 'team', get_template_directory_uri() . '/assets/js/team.js', array(), '1.0.0', true );
			wp_enqueue_script( 'team' );
		endif;

	}

endif;

add_action('wp_enqueue_scripts', 'turnerbatson_scripts');

if ( ! function_exists( 'turnerbatson_styles' ) ) :

	function turnerbatson_styles() {

	    wp_register_style( 'main', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0', false );
	    wp_enqueue_style( 'main' );

	}

endif;

add_action('wp_enqueue_scripts', 'turnerbatson_styles');

/**
* Dequeue jQuery Migrate script in WordPress.
*/
function turnerbatson_remove_jquery( &$scripts) {
    if ( ! is_admin() ) {
        $scripts->remove( 'jquery');
        // $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.12.4' );
    }
}

add_filter( 'wp_default_scripts', 'turnerbatson_remove_jquery' );
