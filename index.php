<?php
/**
 * The main template file
 *
 * 
 */

get_header(); 
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type' => 'page',
	'page_id'=>'36',
	'paged' => $paged,
));
	if ($wp_query->have_posts()) : ?>
    <?php while ($wp_query->have_posts()) : ?>
        
    <?php $wp_query->the_post(); ?>	

	<?php 
		$opacity = get_field('opacity');
		$background = get_field('background'); 
		$banner = get_field('homepage_banner');
	?>

    <section id="home-intro" class="homeSlide">
    <div class="bcg "
     style="background-image:url(<?php echo $banner; ?>);"
        data-center="background-position: 50% 0px;"
        data-top-bottom="background-position: 50% -100px;"
        data-anchor-target="#home-intro">
        
        
        
        <div class="wrapper">
            <h2 class="homeintro">
				<div class="hit"><?php the_field('home_intro_title'); ?></div>
                <div class="hit"><?php the_field('home_intro_line_2'); ?></div>
                <div class="hit"><?php the_field('home_into_line_3'); ?></div>
            </h2>
            
            <?php if(get_field('home_intro_subtext')): ?>
              <!--  <div class="home-intro-subtext">
                    <?php //the_field('home_intro_subtext'); ?>
                </div> home intro subtext -->
            <?php endif; ?>
         </div><!-- wrapper -->
        
        
        
        <div class="hsContainer">
            <div class="hsContent"
                data-center="opacity: 1"
                data-106-top="opacity: 0"
                data-anchor-target="#home-intro">
               
            </div>
        </div>
    </div>
    	
    </section><!-- home intro -->

<?php endwhile; endif; wp_reset_postdata(); ?>



    
    <?php 
	
	// going to change to 3 ransom ones.
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type' => 'portfolio',
	'posts_per_page'=>'3',
	'orderby' => 'rand',
	'tax_query' => array(
		'relation' => 'AND',
		array(
			'taxonomy' => 'categorized',
			'field'    => 'term_id',
			'terms'    => array( 11 ),
		),
		array(
			'taxonomy' => 'categorized',
			'field'    => 'term_id',
			'terms'    => array( 12 ),
			'operator' => 'NOT IN',
		),
		array(
			'taxonomy' => 'tagged',
			'field'    => 'term_id',
			'terms'    => array( 14,17,34 ),
			'operator' => 'NOT IN',
		),
	),
));
	if ($wp_query->have_posts()) : ?>
    
    <div class="home-projects ">
    
    <div class="recent-proj">recent projects</div><!-- recent proj -->
    
    <?php if ( get_field('button_text') !="" ) : ?>
        <div class="why-work">
            <a href="<?php the_field('button_link'); ?>"><?php the_field('button_text'); ?></a>
        </div><!-- why work -->
    <?php endif; ?>
    
    
    
    	<div class="wrapper">
        
        
        
    <div class="home-projects-container">
        
    <?php while ($wp_query->have_posts()) : ?>
    <?php $wp_query->the_post(); ?>
    
    <?php  
		// Get field Name
		$image = get_field('featured_image'); 
		$url = $image['url'];
		$title = $image['title'];
		$alt = $image['alt'];
		$caption = $image['caption'];
	 
		// thumbnail or custom size that will go
		// into the "thumb" variable.
		$size = 'homethumb';
		$thumb = $image['sizes'][ $size ];
		$width = $image['sizes'][ $size . '-width' ];
		$height = $image['sizes'][ $size . '-height' ];
			
		?>
        
        
        <div class="grid">
        	<figure class="effect-ruby">
            <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
                <figcaption>
                    <?php the_excerpt(); ?>
                    <h2><?php the_title(); ?></h2>
                  <a href="<?php the_permalink(); ?>">Read more</a>
                </figcaption>
            </figure>
        </div><!-- grid -->
        
        
    <?php endwhile; ?>
    	</div><!-- home projects container -->
        </div><!-- wrapper -->
    </div><!-- home projects -->
    <?php endif; ?>
    
  
  
    
    <?php 
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type' => 'post',
	'posts_per_page'=>'1'
));
	if ($wp_query->have_posts()) : ?>
    
<div class="home-latestpost" style="background-image:url(<?php echo $background; ?>);">

    
    <?php while ($wp_query->have_posts()) : ?>
    <?php $wp_query->the_post(); ?>
    
    	<div class="homepost">
        	<div class="homepost-date"><?php echo get_the_date('m.d.Y'); ?></div><!-- homepost date -->
            <h2 class="homepost-title"><?php the_title(); ?></h2>
            <div class="homepost-excerpt"><?php the_excerpt(); ?></div>
            <div class="homepost-readmore"><a href="<?php the_permalink(); ?>">keep reading</a></div>
        </div><!-- homepost -->
    
    <?php endwhile; ?>
    <div class="home-latestpost-opacity" style=" background-color: rgba(255,255,255,<?php echo $opacity; ?>);">
    </div><!-- home latestpost opacity -->
    </div><!-- home latestpost -->
    <?php endif; ?>
 


<?php get_footer(); ?>