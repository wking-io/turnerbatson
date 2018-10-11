<?php

/**
 * Get template for post based on post type
 * 
 */
function tb_get_template( $post_type = '' ) {
  error_log( $post_type );
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
    'query' => $wp_query->query,
    'action' => 'tb_ajax_load_more',
  );
  
  wp_localize_script( 'portfolio', 'loadmore', $args );
  wp_localize_script( 'team', 'loadmore', $args );
  wp_localize_script( 'news', 'loadmore', $args );
	
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
	$args['paged'] = $_POST['page'];
  $args['post_status'] = 'publish';
  
  // Get markup from template functions
	ob_start();
  $loop = new WP_Query( $args );
	if( $loop->have_posts() ): while( $loop->have_posts() ): $loop->the_post();
		echo tb_get_template( $args['post_type'] );
	endwhile; endif; wp_reset_postdata();
  $markup = ob_get_clean();

  // Get if last page in request
  $is_last_page = false;
  if ( $loop->max_num_pages == $loop->get( 'paged' ) ) {
    $is_last_page =  true;
  }

  // Setup data object
  $data = array( 'markup' => $markup, 'isLast' => $is_last_page );

  // Send it back to JS
	wp_send_json_success(  $data );
}
add_action( 'wp_ajax_tb_ajax_load_more', 'tb_ajax_load_more' );
add_action( 'wp_ajax_nopriv_tb_ajax_load_more', 'tb_ajax_load_more' );