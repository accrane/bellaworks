<?php 
/*____________________________________

			
			Social Media icons

_______________________________________*/
function acc_social_links() {

	$socials = array();
					
	$facebooklink = get_field('facebook_link', 'option');
	$twitterlink = get_field('twitter_link', 'option');
	$linkedinlink = get_field('linkedin_link', 'option');
	$instagramlink = get_field('instagram_link', 'option');
	$googlelink = get_field('google_link', 'option');
	
	$facebook = array(
		'class' => 'facebook',
		'link' => $facebooklink,
		'text' => 'Like us on Facebook',
	);
	$twitter = array(
		'class' => 'twitter',
		'link' => $twitterlink,
		'text' => 'Follow us on Twitter',
	);
	$linkedin = array(
		'class' => 'linkedin',
		'link' => $linkedinlink,
		'text' => 'Join us on Linkedin',
	);
	$instagram = array(
		'class' => 'instagram',
		'link' => $instagramlink,
		'text' => 'Follow us on Instagram',
	);
	$google = array(
		'class' => 'google',
		'link' => $googlelink,
		'text' => 'Follow us on Google',
	);
	// Add Chosen Social media to the list
	if($facebooklink != "") {
		$socials[] = $facebook;
	}
	if($twitterlink != "") {
		$socials[] = $twitter;
	}
	if($linkedinlink != "") {
		$socials[] = $linkedin;
	}
	if($instagramlink != "") {
		$socials[] = $instagram;
	} 
	if($googlelink != "") {
		$socials[] = $google;
	}
	// See what data we have.
	/*echo '<pre>';
	print_r($socials);
	echo '</pre>';*/
	
	// count for width
	$socialcount = count($socials);
	if($socialcount == 1) {
		$snumber = 'socialone';	
	} elseif($socialcount == 2) {
		$snumber = 'socialtwo';	
	} elseif($socialcount == 3) {
		$snumber = 'socialthree';	
	} elseif($socialcount == 4) {
		$snumber = 'socialfour';	
	} elseif($socialcount == 5) {
		$snumber = 'socialfive';	
	} elseif($socialcount == 6) {
		$snumber = 'socialsix';	
	}
	
	echo '<div id="sociallinks" class="' . $snumber . '">';
	echo '<ul>';
	
	foreach ( $socials as $social ) {
		echo '<li class="'. $social['class'] . '">';
		echo '<a href="' . $social['link'] . '" target="_blank">';
		echo $social['text'];
		echo '</a>';
		echo '</li>';
	}
	
	echo '</ul>';
	echo '</div><!-- social links -->'; ?>
	
<style type="text/css">
	
/* Social CSS */


.socialone{width: 47px;}
.socialtwo{width: 115px;}
.socialthree{width: 172px;}
.socialfour{width: 160px;}
.socialfive{width: 200px;}
.socialsix{width: 240px;}

#sociallinks  ul {
	margin: 0px;
	padding: 0px;
	list-style-type: none;
	z-index: 2;	
	position: relative;
}

#sociallinks  ul li {
	float: left;
	position: relative;
	margin: 0px 5px;
}

#sociallinks  ul a {
	text-decoration: none;
	background-image: url(<?php echo get_bloginfo('template_url') . '/images/social.png'; ?>);
	background-repeat: no-repeat;
	display: inline-block;
	height: 47px;
	width: 47px;
	text-indent: -9000px;
	position: relative;
	opacity: .8;
}
#sociallinks  ul a:hover {
	opacity:1;
}
#sociallinks  .facebook a {
	background-position: -0px -0px;
	transition: opacity 0.3s ease;
}	
#sociallinks .facebook a:hover {
	
}
#sociallinks  .linkedin a {
	background-position: -53px 0px;
	transition: opacity 0.3s ease;
}
	
#sociallinks  .linkedin a:hover {
	opacity: 1;
}
#sociallinks  .instagram a {
	background-position: -105px -0px;
	transition: opacity 0.3s ease;
}
	
#sociallinks .instagram a:hover {
	
}	
#sociallinks  .twitter a {
	background-position: -30px -0px;
	transition: opacity 0.3s ease;
}
	
#sociallinks .twitter a:hover {
	
}
#sociallinks  .google a {
	background-position: -120px -0px;
	transition: opacity 0.3s ease;
}
	
#sociallinks .google a:hover {
	
}
<?php 
echo '</style>';
} // end acc social links 

//add_action( 'login_enqueue_scripts', 'acc_social_links' );