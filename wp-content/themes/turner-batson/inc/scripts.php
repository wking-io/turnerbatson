<?php

if ( ! function_exists( 'turnerbatson_scripts' ) ) :

	function turnerbatson_scripts() {

	    wp_register_script( 'common', get_stylesheet_directory_uri() . '/assets/js/common.js', array(), '1.0.0', true );
	    wp_enqueue_script( 'common' );

	}

endif;

add_action('wp_enqueue_scripts', 'turnerbatson_scripts');

if ( ! function_exists( 'turnerbatson_styles' ) ) :

	function turnerbatson_styles() {

	    wp_register_style( 'common', get_stylesheet_directory_uri() . '/assets/css/common.css', array(), '1.0.0', true );
	    wp_enqueue_style( 'common' );

	}

endif;

add_action('wp_enqueue_styles', 'turnerbatson_styles');

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