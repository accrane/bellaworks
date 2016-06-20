<?php
/**
 * The template for displaying Tag pages
 *
 * Used to display archive-type pages for posts in a tag.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<section id="primary" class="site-content">
		<div id="content" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title"><?php printf( __( 'Tag Archives: %s', 'twentytwelve' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></h1>

			<?php if ( tag_description() ) : // Show an optional tag description ?>
				<div class="archive-meta"><?php echo tag_description(); ?></div>
			<?php endif; ?>
			</header><!-- .archive-header -->

			
			<div id="container">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post(); ?>
            
            
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
       	<div class="port-img-hover">
        
        	<!--<div class="seemore">See More</div>-->
            <h2><?php //the_title(); ?></h2>
             <?php 
			 // excerpt
			 $excerpt =  get_the_excerpt(); 
			 if($excerpt != '' ) { 
			 	echo '<div class="port-excerpt">';
				echo $excerpt; 
				echo '</div>';
			 }
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
    
    	<?php pagi_posts_nav(); ?>
        
        <?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>