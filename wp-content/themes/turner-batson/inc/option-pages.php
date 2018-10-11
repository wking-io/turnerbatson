<?php
/**
 * Add option pages for CPTs
 *
 * @package turner-batson
 */

function add_option_page( $cpt ) {
	if( function_exists( 'acf_add_options_sub_page' ) ) {
		// add sub page
		acf_add_options_sub_page( array(
			'page_title' 	=> $cpt . ' Settings',
			'menu_slug'		=> strtolower( $cpt ) . '-settings',
			'parent_slug' => 'edit.php' . ( ( 'News' === $cpt ) ? '' : '?post_type=' . strtolower( $cpt ) ),
		) );
	
	}
}

function add_option_pages() {
	add_option_page('Team');
	add_option_page('Testimonial');
	add_option_page('Career');

	if( function_exists( 'acf_add_options_page' ) ) {
		// add sub page
		acf_add_options_page( array(
			'page_title' => 'Company Settings',
			'menu_slug'	 => 'company-settings',
			'icon_url' 	 => 'dashicons-building',
			'position'	 => 75
		) );
	
	}

}

add_action( 'acf/init', 'add_option_pages' );