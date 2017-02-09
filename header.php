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


<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');

fbq('init', '1107124109368587');
fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1107124109368587&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
<link href="https://fonts.googleapis.com/css?family=Arimo" rel="stylesheet">

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
          <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'MENU', 'acstarter' ); ?></button>
          <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
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