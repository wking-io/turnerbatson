<?php 

add_filter( 'nav_menu_css_class' , 'special_nav_class' , 10 , 2 );

function special_nav_class ( $classes, $item ) {
    // Getting the current post details
    global $post;
    
    // Getting the post type of the current post
    $current_post_type = get_post_type_object( get_post_type( $post->ID ) );
    $current_post_type_slug = $current_post_type->rewrite['slug'];
        
    // Getting the URL of the menu item
    $menu_slug = strtolower(trim($item->url));
		
    // If the menu item URL contains the current post types slug add the current-menu-item class
    if ( strpos( $menu_slug, $current_post_type_slug ) !== false ) {
        $classes[] = 'active';
    }

    if ( in_array( 'current-menu-item', $classes ) ){
        $classes[] = 'active ';
    }

    return $classes;
}