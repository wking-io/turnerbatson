<?php

/**
 * Get template for post based on post type
 * 
 */
function tb_get_template( $post_type = '' ) {
  $markup = '';
  if ( ! empty( $post_type ) ) {
    switch ( $post_type ) {
      case 'portfolio':
        $markup = portfolio_item( get_the_ID() );
        break;

      case 'team':
        $markup = team_item( get_the_ID() );
        break;

      case 'post':
        $markup = news_item( get_the_ID() );
        break;

      case 'testimonial':
        $markup = testimonial_item( get_the_ID() );
        break;
    }
  }
  return $markup;
}

/**
 * Javascript for Load More
 *
 */
function tb_load_more_portfolio_js() {

  global $wp_query;
	$args = array(
		'nonce' => wp_create_nonce( 'tb-load-more-nonce' ),
		'url'   => admin_url( 'admin-ajax.php' ),
    'action' => 'tb_ajax_load_more',
  );

  $portfolio_args = array_merge( $args, array( 'query' => array_merge( $wp_query->query, array( 'post_type' => 'portfolio' ) ) ) );
  $team_args = array_merge( $args, array( 'query' => array_merge( $wp_query->query, array( 'post_type' => 'team' ) ) ) );
  $news_args = array_merge( $args, array( 'query' => $wp_query->query ) );
  $testimonial_args = array_merge( $args, array( 'query' => array_merge( $wp_query->query, array( 'post_type' => 'testimonial' ) ) ) );
  
  wp_localize_script( 'portfolio', 'loadmore', $portfolio_args );
  wp_localize_script( 'team', 'loadmore', $team_args );
  wp_localize_script( 'news', 'loadmore', $news_args );
  wp_localize_script( 'testimonial', 'loadmore', $testimonial_args );
	
}
add_action( 'wp_enqueue_scripts', 'tb_load_more_portfolio_js' );

/**
 * AJAX Load More 
 *
 */
function tb_ajax_load_more() {
	check_ajax_referer( 'tb-load-more-nonce', 'nonce' );
  $args = isset( $_POST['query'] ) ? $_POST['query'] : array();
  $args['post_type'] = isset( $args['post_type'] ) ? $args['post_type'] : 'post';
  $args['post_status'] = 'publish';
  $check_max = false;
  
  if ( ! isset( $args['posts_per_page'] ) || ! isset( $args['offset'] ) ) {
    $args['paged'] = $_POST['page'];
    $check_max = true;
  }
  
  // Get markup from template functions
  ob_start();
  $loop = new WP_Query( $args );
  error_log( print_r( $loop, true ) );
	if( $loop->have_posts() ): while( $loop->have_posts() ): $loop->the_post();
  echo tb_get_template( $args['post_type'] );
  endwhile; endif; wp_reset_postdata();
  $markup = ob_get_clean();

  // Get if last page in request
  $is_last_page = false;
  if ( $check_max && $loop->max_num_pages == $loop->get( 'paged' ) ) {
    $is_last_page =  true;
  } elseif ( ( $loop->found_posts - ( $loop->get( 'offset' ) || 0 ) ) <= $loop->get( 'posts_per_page' ) ) {
    $is_last_page = true;
  }

  // Setup data object
  $data = array( 'markup' => $markup, 'isLast' => $is_last_page );

  // Send it back to JS
	wp_send_json_success(  $data );
}
add_action( 'wp_ajax_tb_ajax_load_more', 'tb_ajax_load_more' );
add_action( 'wp_ajax_nopriv_tb_ajax_load_more', 'tb_ajax_load_more' );