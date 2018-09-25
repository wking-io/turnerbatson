<?php
/**
 * Add custom taxonomy for Portfolio
 *
 * @package turner-batson
 */

function tb_register_project_tax() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Project Types', 'taxonomy general name', THEME_NAME ),
		'singular_name'     => _x( 'Project Type', 'taxonomy singular name', THEME_NAME ),
		'search_items'      => __( 'Search Project Types', THEME_NAME ),
		'all_items'         => __( 'All Project Types', THEME_NAME ),
		'parent_item'       => __( 'Parent Project Type', THEME_NAME ),
		'parent_item_colon' => __( 'Parent Project Type:', THEME_NAME ),
		'edit_item'         => __( 'Edit Project Type', THEME_NAME ),
		'update_item'       => __( 'Update Project Type', THEME_NAME ),
		'add_new_item'      => __( 'Add New Project Type', THEME_NAME ),
		'new_item_name'     => __( 'New Project Type Name', THEME_NAME ),
		'menu_name'         => __( 'Project Type', THEME_NAME ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'						=> array( 'slug' => 'portfolio/type', 'with_front' => false ),
	);

	register_taxonomy( 'project-type', 'portfolio', $args );
}

add_action( 'init', 'tb_register_project_tax' );