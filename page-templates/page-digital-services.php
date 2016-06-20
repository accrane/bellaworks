<?php
/**
 * Template Name: Digital Services
 *
 */

get_header(); ?>



	<div class="wrapper">
    <div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
            
          <header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->
                
                <div class="entry-content">
                	
                	<?php the_content(); ?>
                    
                    <?php 
						$link = get_field('next_service');
						if( $link != '' ) { ?>
                    <div class="next-service-link">
                    	<a href="<?php echo $link; ?>">&raquo;</a>
                    </div><!-- next service link -->
                    <?php } ?>
                    
                    
                </div><!-- entry content -->
                
			<?php endwhile; // end of the loop. ?>
            
<?php
if(is_page(1065)) : // Digital Services. Feed in portfolio tagged," Print, Logos, Brand"

	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'portfolio',
	'posts_per_page' => -1,
	'paged' => $paged,
	'tax_query' => array(
		array(
			'taxonomy' => 'tagged', // custom taxonomy
			'field' => 'id',
			'terms' => array( 16,14,34 ) // terms
		)
	)
));
if ($wp_query->have_posts()) : ?>
<div id="container">
<?php while ($wp_query->have_posts()) : ?>
<?php $wp_query->the_post(); ?>	

 <div class="item portblock <?php echo $mycats; ?>">
     <?php  
		// Get field Name
		$image = get_field('featured_image'); 
		$url = $image['url'];
		$title = $image['title'];
		$alt = $image['alt'];
		$size = 'thumbfeed';
		$thumb = $image['sizes'][ $size ];
			
		?>
       <div class="port-img">
       	<div class="port-img-hover nobg">
        
        	<!--<div class="seemore">See More</div>-->
            <h3><?php the_title(); ?></h3>
             <?php 
			 // excerpt
			/* $excerpt =  get_the_excerpt(); 
			 if($excerpt != '' ) { 
			 	echo '<div class="port-excerpt">';
				echo $excerpt; 
				echo '</div>';
			 }*/
			 ?>
        </div><!-- port img hover -->
       <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
       </div><!-- port image -->
            <div class="port-content">
                <div class="entry-content">
                   <!-- <h2><?php //the_title(); ?></h2>-->
                       
                </div><!-- entry content -->
                <div class="readmore"><a href="<?php the_permalink(); ?>">keep reading</a></div>
                <!--<div class="read-port">view</div>-->
             </div><!-- news content -->
        
    </div><!-- item -->


<?php endwhile; ?>
</div><!-- container -->
<?php endif; 
endif; // end if is page ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar('digital-services'); ?>
</div><!-- wrapper -->
<?php get_footer(); ?>