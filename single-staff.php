<?php
/**
 * The Template for displaying all single posts
 *
 */

get_header(); ?>
<div class="wrapper">
<?php while ( have_posts() ) : the_post(); 

// Get field Name for photos
	$image = get_field('photo'); 
	$url = $image['url'];
	$title = $image['title'];
	$alt = $image['alt'];
	$caption = $image['caption'];
	  // size
	$size = 'large';
	$thumb = $image['sizes'][ $size ];
	// email  
				 $email = get_field('email');
?>
<div  class="side-left">
<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />


</div><!-- secondary -->

	<div id="primary" class="site-content">
		<div id="content" role="main" class="single-about-middle">

			

			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
                
			</header><!-- .entry-header -->
            
            <div class="jobtitle">
					<?php the_field('job_title'); ?>
            </div><!-- jobtitle -->
            
            <div class="staff-email">
                <a href="mailto:<?php echo antispambot($email); ?>">
                   <?php echo antispambot($email); ?>
                </a>  
            </div><!-- staff email -->
            
            <div class="entry-content">
            	<?php the_content(); ?>
            </div><!-- entry content -->
            


				<?php //comments_template( '', true ); ?>

			

		</div><!-- #content -->
       <?php 
	   // get the id of the current person and pass it to the next query
	   $person = get_the_ID();
	   
	   endwhile; // end of the loop. ?> 
        
        
        <div class="single-about-right">
        
        <h2>More Staff!</h2>
        
           <?php
				$wp_query = new WP_Query();
				$wp_query->query(array(
				'post_type'=>'staff',
				'posts_per_page' => -1,
				'orderby'   => 'menu_order',
              'order'     => 'ASC',
				'paged' => $paged,
				// don't include the current person
				'post__not_in' => array($person)
			));
				if ($wp_query->have_posts()) : 
				// set count for class
				  $count = 0; 
				?>
           
                    
				<?php while ($wp_query->have_posts()) : 
				  
				  // Then the post
				  $wp_query->the_post(); 
				  
				  // Get field Name for photos
                $image = get_field('photo'); 
                $url = $image['url'];
                $title = $image['title'];
                $alt = $image['alt'];
                $caption = $image['caption'];
             	  // size
				  $size = 'thumbnail';
                $thumb = $image['sizes'][ $size ];
                $width = $image['sizes'][ $size . '-width' ];
                $height = $image['sizes'][ $size . '-height' ];
                // email  
				 $email = get_field('email');
 				 // count classes
				 if($count == 3) {
					 $class = 'staff-3';
					 $count = 0;
				 } else {
					 $class = 'staff-1';
				 }
				 // count up
				 $count++;
                ?>
    	
        
        		<div class="staff-circle">
             
                	<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
                    
                	<div class="staff-circle-content">
                    <a href="<?php the_permalink(); ?>">
                    	<h3><?php the_title(); ?></h3>
                        </a>
                   </div><!-- staff content -->
                   
                </div><!-- staff -->
                
                <?php endwhile; ?>
                    
                <?php endif; ?>
        </div><!-- side about right -->
        
        
        
        
        
        
	</div><!-- #primary -->


</div><!-- wrapper -->

<?php get_footer(); ?>