<?php
/**
 * Custom Theme Functions
 *
 * @package turner-batson
 */

define( 'THEME_VERSION', '1.0.0' );
define( 'THEME_NAME', 'turnerbatson' );

// Setup
include 'inc/setup.php';

// Scripts.
include 'inc/scripts.php';

// Changing posts to news
include 'inc/post-to-news.php';

// Disable Comments.
include 'inc/remove-comments.php';
