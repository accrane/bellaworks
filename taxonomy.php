<?php
/**
   Taxonomy template
 
	To create different taxonomy templates, copy
	this file and create a new...
	
	Ex: taxonomy-my_custom_tax.php
 	
*/
get_header(); ?>
<div class="wrapper">
	<div id="primary" class="">
		<div id="content" role="main">
<?php 
// get some info about the term queried
$queried_object = get_queried_object(); 
$taxonomy = $queried_object->taxonomy;
$term_id = $queried_object->term_id; 
?>


<?php //Get the correct taxonomy ID by id
$term = get_term_by( 'id', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>

<?php // use the term to echo the description of the term 
//echo term_description( $term, $taxonomy ) ?>


			<header class="archive-header">
				<h1 class="archive-title">
						Posts with the term: <?php echo get_queried_object()->name; ?>
                </h1>
			</header><!-- .archive-header -->


<?php if(have_posts()) :  ?>
<div id="container">	
<?php while(have_posts()) :  ?>	
<?php the_post(); ?>		

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
       	<div class="port-img-hover port-plus">
        
        	<!--<div class="seemore">See More</div>-->
            <h2><?php the_title(); ?></h2>
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
	</div><!-- #primary -->

<?php //get_sidebar('portfolio'); ?>
</div><!-- wrapper -->

<?php get_footer(); ?>