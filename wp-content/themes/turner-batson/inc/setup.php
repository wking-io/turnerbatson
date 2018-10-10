<?php

if ( ! function_exists( 'batson_setup' ) ) :

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function turnerbatson_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on turnerbatson, use a find and replace
	 * to change 'turnerbatson' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'turnerbatson', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-main' => esc_html__( 'Primary', THEME_NAME ),
		'menu-footer' => esc_html__( 'Footer', THEME_NAME ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'turnerbatson_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	function tb_widgets_init() {

    register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', THEME_NAME ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', THEME_NAME ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	
		register_sidebar( array(
			'name'          => esc_html__( 'Social Widget Area', THEME_NAME ),
			'id'            => 'social-widget-area',
			'description'   => esc_html__( 'Add social icons here.', THEME_NAME ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Share Widget Area', THEME_NAME ),
			'id'            => 'share-widget-area',
			'description'   => esc_html__( 'Add share icons here.', THEME_NAME ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}

	add_action( 'widgets_init', 'tb_widgets_init' );
}

endif;

add_action( 'after_setup_theme', 'turnerbatson_setup' );

function update_posts_per_page_cpt( $query ) {
  if ( ! is_admin() && $query->is_main_query() && is_post_type_archive( 'team' ) ) {
    $query->set( 'posts_per_page', '500' );
  }
}
add_action( 'pre_get_posts', 'update_posts_per_page_cpt' );