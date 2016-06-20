<?php
/**
 * The Template for displaying all single posts
 *
 */

get_header(); ?>
<div class="wrapper">
	<div id="primary" class="">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->
            
            
            <div class="single-port-copy">
            <div class="entry-content">
            	<?php the_content(); ?>
            </div><!-- entry content -->
            
            <?php 
				$weblink = get_field('link_to_website');
				if($weblink != '') : ?>
            <div class="website-link">
            	<a href="<?php echo $weblink; ?>" target="_blank">visit site</a>
            </div><!-- website link -->
            <?php endif; ?>
            
            <div class="meta">
            <div class="metaitem">
            <?php echo get_the_term_list( $post->ID, 'categorized', 'Categorized: ', ', ' ); ?>
            </div>
            <div class="clear"></div>
            <div class="metaitem">
          		<?php echo get_the_term_list( $post->ID, 'tagged', 'Tags about this work: ', ', ' ); ?>
                </div>
			 </div><!-- meta -->
             
              <!--<div class="meta">
          		<?php //echo get_the_term_list( $post->ID, 'categorized', 'This piece of work was catted: ', ', ' ); ?>
			 </div> meta -->
             
             
            <div class="single-proj-nav">
             <h3 class="nextproj moreproj"><a href="<?php bloginfo('url'); ?>/our-work">View all projects</a></h3>
              <div class="prevpost"><?php previous_post_link('%link','&raquo;'); ?></div>
            	<div class="nextpost"><?php next_post_link('%link', '&laquo;'); ?></div>
            </div>
            
            
            <!--<h3 class="moreproj"></h3>-->
           
            
            <?php endwhile; // end of first loop 
					 wp_reset_postdata(); wp_reset_query();?>
                    
                    
            
            </div><!-- single-port-copy -->
            
            <?php while ( have_posts() ) : the_post(); ?>
             <div class="single-port-gallery">
               
  <?php 
  $count = 0;
  if( have_rows('gallery') ): ?>
   <div id="container">
	<?php while ( have_rows('gallery') ) : ?>
	<?php the_row(); 
	++$count;
	?>
 
	 <?php 
        // Get field Name
        $image = get_sub_field('image'); 
		 $projectTitle = get_sub_field('title'); 
		 $projectDesc = get_sub_field('description'); 
		 $isMobile = get_sub_field('is_mobile'); 
        $url = $image['url'];
        $title = $image['title'];
        $alt = $image['alt'];
        $caption = $image['caption'];
     
        // size or custom size that will go
        // into the "thumb" variable.
        $size = 'thumbfeed';
		 $sizeLarge = 'large';
        $thumb = $image['sizes'][ $size ];
		 $large = $image['sizes'][ $sizeLarge ];
		 
		 if($isMobile == 'Yes') {
			 $imageClass = 'mobile';
		 } else {
			 $imageClass = 'not-mobile';
		 }
		 
		/* echo '<pre>';
		 print_r($image);
		 echo '</pre>';*/
      ?>
      <script type="text/javascript">
		//var my_class_name = <?php echo json_encode($imageClass); ?>;
		
		
		/*
		$('#cboxLoadedContent').addClass(my_class_name);
		*/
		
     /*  $('a.gallery').colorbox({onOpen: function(){
           $("#colorbox").find('#cboxWrapper').addClass(my_class_name);
       }});*/
 
		
	  </script>
        
       <div class="item port-image">
       <!--<a class="gallery" href="<?php //echo $large; ?>">-->
       <a class="gallery" href="#open-<?php echo $count; ?>">
        <img class="<?php echo $imageClass ?>" src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
        </a>
        <?php //echo custom_field_excerpt(); ?>
        </div><!-- item -->
        
        
       
        <div style="display:none">
        <div id="open-<?php echo $count; ?>" class="inline_content">
        <img class="<?php echo $imageClass ?>" src="<?php echo $large; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
        </div><!-- hidden div -->
        </div><!-- hidden div -->
       	
       
   <?php endwhile; ?>
   </div><!-- container -->
<?php endif; ?>
                    
            </div><!-- single-port-gallery -->

				<?php comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php //get_sidebar('portfolio'); ?>
</div><!-- wrapper -->



<?php get_footer(); ?>