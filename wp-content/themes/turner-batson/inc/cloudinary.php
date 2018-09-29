<?php 

require ABSPATH . '/vendor/autoload.php';

add_action( 'acf/init', 'setup_cloudinary' );

function setup_cloudinary() {
  $name = get_field( 'cloud_name', 'options' );
  $api = get_field( 'cloud_api', 'options' );
  $secret = get_field( 'cloud_secret', 'options' );

  \Cloudinary::config(array( 
    "cloud_name" => $name, 
    "api_key" => $api, 
    "api_secret" => $secret, 
  ));

}