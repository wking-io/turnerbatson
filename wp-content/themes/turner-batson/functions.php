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

// Add custom taxonomy for portfolio projects
include 'inc/project-tax.php';

// Assets.
include 'inc/assets.php';

// Changing posts to news
include 'inc/post-to-news.php';

// Disable Comments.
include 'inc/remove-comments.php';

// Add option pages for custom post types
include 'inc/option-pages.php';

// Add google API key
// include 'inc/google-api.php';
