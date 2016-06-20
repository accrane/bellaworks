<?php

// Enqueue Scripts
require( get_template_directory() . '/functions/enqueue-scripts.php' );

// Register Custom Post Types
require( get_template_directory() . '/functions/post-types.php' );

// Specific Theme functions... includes pagination = pagi_posts_nav()
require( get_template_directory() . '/functions/theme-functions.php' );

// Theme setup. Style sheet link, threaded comments et al.
require( get_template_directory() . '/functions/theme-setup.php' );

// Runs social media loop connected through ACF "acc_social_links()"
require( get_template_directory() . '/functions/social-media.php' );

 
 
