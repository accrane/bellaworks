<?php
/**
 * Template Name: About
 *
 */

get_header(); ?>

	<div class="wrapper">
    
    
            
    
    
    <div id="primary" class="">
		<div id="content" role="main">
        
        
        
        <?php while ( have_posts() ) : the_post(); ?>
			<div class="about-content">	
            
				<div class="entry-content">
                <header class="entry-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header><!-- .entry-header -->
                	<?php the_content(); ?>
                </div><!-- entry content -->
           </div><!-- secondary -->
                
		<?php endwhile; // end of the loop. ?>
        
        


			<div class="entry-content">
            
            <!--	<h2>Our Staff</h2>-->
                
                <?php
				$wp_query = new WP_Query();
				$wp_query->query(array(
				'post_type'=>'staff',
				'posts_per_page' => -1,
				'orderby'   => 'menu_order',
              'order'     => 'ASC',
				'paged' => $paged
			));
				if ($wp_query->have_posts()) : 
				// set count for class
				  $count = 0; 
				?>
                	<div class="staff-container">
                    
				<?php while ($wp_query->have_posts()) : 
				  
				  // Then the post
				  $wp_query->the_post(); 
				  $personTitle = get_the_title();
				  // Get field Name for photos
                $image = get_field('photo'); 
                $url = $image['url'];
                $title = $image['title'];
                $alt = $image['alt'];
                $caption = $image['caption'];
             	  // size
				  $size = 'large';
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
    	
        
        		<div class="staff <?php echo $class; ?> blocks">
                <?php //echo $count; ?>
                	<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
                    
                	<div class="staff-content">
                    	<h3><?php echo $personTitle; ?></h3>
                        <div class="jobtitle">
								<?php the_field('job_title'); ?>
                        </div><!-- jobtitle -->
                        <div class="staff-email">
                        		<a href="mailto:<?php echo antispambot($email); ?>">
							  		<?php echo 'Email: ' . $personTitle; ?>
                            </a>  
                        </div><!-- staff email -->
                        <div class="readmore">	
                        		<a href="<?php the_permalink(); ?>">more</a>
                        </div><!-- staff readmore -->
                        <div class="read">	
                        		read more
                        </div><!-- staff read -->
                   </div><!-- staff content -->
                   
                </div><!-- staff -->
                
                <?php endwhile; ?>
                	</div><!-- staff container -->
                    <?php pagi_posts_nav(); ?>
                    
                <?php endif; ?>
            
            </div><!-- entry content -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
</div><!-- wrapper -->
<?php get_footer(); ?>