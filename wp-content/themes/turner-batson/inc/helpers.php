<?php

function get_page_name( $post_type ) {

  switch ( $post_type ) {
    case 'page':
      $name = get_name_by_page();
      break;
    case 'post':
      $name = 'News';
      break;
    case 'career':
      $name = 'Career';
      break;
    case 'portfolio':
      $name = 'Portfolio';
      break;
    case 'team':
      $name = 'Team';
      break;
    case 'testimonial':
      $name = 'Testimonial';
      break;
    default:
      $name = '';
      break;

  }

  return $name;
}

function get_name_by_page() {
  if ( is_front_page() ) {
    return 'Home';
  } else if ( is_page( 'connect' ) ) {
    return 'Connect';
  } else if ( is_page( 'culture' ) ) {
    return 'Culture';
  } else {
    return '';
  }
}

function with_default( $default, $key, $array ) {
  return array_key_exists( $key, $array ) && ! empty( $array[$key] ) ? $array[$key] : $default;
}

function get_main_category( $id, $tax ) {
  $categories = get_the_terms( $id, $tax );
  $result = '';
  if ( !empty( $categories ) ) {
    foreach ( $categories as $category ) {
      if ( 'featured' !== $category->slug ) {
        $result = $category->name;
        break;
      }
    }
  }
  return $result;
}

function no_items( $name = 'items' ) {
  return sprintf( 'There were no %s found', $name );
}