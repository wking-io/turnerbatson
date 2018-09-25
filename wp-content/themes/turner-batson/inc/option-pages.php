<?php

function add_option_page( $cpt ) {
	if( function_exists( 'acf_add_options_page' ) ) {
		
		// add sub page
		acf_add_options_sub_page( array(
			'page_title' 	=> 'Settings',
			'menu_title' 	=> 'Settings',
			'menu_slug'		=> $cpt . '-settings',
			'parent_slug' 	=> 'edit.php?post_type=' . $cpt,
		) );
	
	}
}

function add_option_pages() {
	add_option_page('team');
	add_option_page('testimonial');
	add_option_page('job');
}

add_action( 'admin_menu', 'add_option_pages' );