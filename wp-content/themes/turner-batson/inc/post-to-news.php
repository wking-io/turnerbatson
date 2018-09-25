<?php
/**
 * Change Posts to News
 *
 * @package turner-batson
 */

function turnerbatson_change_post_to_news( $post_type, $post_type_object ) {
	if ( 'post' !== $post_type ) {
		return;
	}

	$post_type_object->label = __( 'News', 'turner-batson' );
	$post_type_object->menu_icon = 'dashicons-media-text';
	$post_type_object->menu_position = 22;

	$post_type_object->labels->name = __( 'News', 'turner-batson' );
	$post_type_object->labels->singular_name = __( 'News', 'turner-batson' );
	$post_type_object->labels->add_new = __( 'Add News', 'turner-batson' );
	$post_type_object->labels->add_new_item = __( 'Add News', 'turner-batson' );
	$post_type_object->labels->edit_item = __( 'Edit News', 'turner-batson' );
	$post_type_object->labels->new_item = __( 'News', 'turner-batson' );
	$post_type_object->labels->view_item = __( 'View News', 'turner-batson' );
	$post_type_object->labels->search_items = __( 'Search News', 'turner-batson' );
	$post_type_object->labels->not_found = __( 'No News found', 'turner-batson' );
	$post_type_object->labels->not_found_in_trash = __( 'No News found in Trash', 'turner-batson' );
	$post_type_object->labels->all_items = __( 'All News', 'turner-batson' );
	$post_type_object->labels->menu_name = __( 'News', 'turner-batson' );
	$post_type_object->labels->name_admin_bar = __( 'News', 'turner-batson' );
}

add_action( 'registered_post_type', 'turnerbatson_change_post_to_news', 10, 2 );
