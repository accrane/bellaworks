<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700' type='text/css' media='all' />
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Ubuntu:400,300,500' type='text/css' media='all' />

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="skrollr-body"></div>
<div id="page" class="hfeed site">

<div class="wrapper">
	<header id="masthead" class="site-header" role="banner">
    
		<?php if(is_home()) { ?>
            <h1 class="logo"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
        <?php } else { ?>
            <div class="logo"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></div>
        <?php } ?>
        
		<div class="header-right">
        
        
        <?php 
			$address = get_field('address','option'); 
			$city = get_field('city','option');
			$state = get_field('state','option');
			$zip = get_field('zip','option');
			$year = date('Y');
			$phone = get_field('phone_number','option');
			$fax = get_field('fax','option');
			 ?>
             <div class="header-address">
			  <?php echo $address . ' | ' . $city . ', ' . $state . ' ' . $zip; ?>
              </div><!-- header-address -->
        

        
        <div class="phone"><?php echo $phone ?></div><!-- phone -->
        
            <nav id="site-navigation" class="main-navigation" role="navigation">
                <h3 class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></h3>
               <!-- <a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>">
						<?php //_e( 'Skip to content', 'twentytwelve' ); ?>
                </a>-->
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
            </nav><!-- #site-navigation -->
            
            	
            
        </div><!-- header right -->

	</header><!-- #masthead -->
   </div><!-- wrapper -->
   
   
   <?php if ( is_tree(10) || is_page(10) || is_tree(7) || is_page(7) ) {
	   	get_template_part('inc/skrolr-digital');
   }
   ?>

	
    <?php if ( is_page('news') ) {
		$pageClass = 'bgcolor-beige';
	} else {
		$pageClass = 'bgcolor-grey';
	}
	?>
    <div id="main" class="<?php echo $pageClass; ?>">