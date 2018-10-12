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

// Add helper functions
include 'inc/helpers.php';

// Shortcodes
include 'inc/shortcodes.php';

// Custom active class on menu items
include 'inc/custom-active-menu.php';

// Auto copyright
include 'inc/copyright.php';

// Setup Cloudinary Config
include 'inc/cloudinary.php';

// Template functions for post items
include 'inc/templates.php';

// Infinite scroll functions
include 'inc/infinite.php';