<?php
/**
 * Template Name: Our Work
 *
 */

get_header(); ?>

	<div class="wrapper">
    <div id="primary" class="">
		<div id="content" role="main">
        
        <header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->
        
        <div class="entry-content">
        <?php while(have_posts()) : the_post(); ?>
        
            <?php the_content(); ?>
            <?php endwhile; ?>
        </div><!-- entry content -->

<?php
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'portfolio',
	'posts_per_page' => -1,
	'paged' => $paged,
	 'orderby'   => 'menu_order',
      'order'     => 'ASC'
));
	if ($wp_query->have_posts()) : ?>
    
    

<?php 

// Create Filter buttons from all Categories that have posts 
		
		// create an array
		$filterLinks = array();
		// an empty array to add to our previous array
		$newarray = array();
		// Starter "Show All' Array
		$starter = array('name'=>'show all','slug'=>'*');
		// put it into our array
		$filterLinks[] = $starter;
		
		 $taxterms = get_terms( 'categorized' );
		 // loop through terms if not empty
		 if ( ! empty( $taxterms ) && ! is_wp_error( $taxterms ) ){
			// Sort the array so Website comes up first.
			sort($taxterms);
			// loop em!
			 foreach ( $taxterms as $taxterm ) {
			  	// show all is a little different, so we add a "." to the others
				$datafilter = '.' . $taxterm->slug;
				// create some 
				  $newarray = array(
						'name' => $taxterm->name,
						'slug' => $datafilter,
				  );
				 // load it up 
				  $filterLinks[] = $newarray;
				
			 } // endforeach
			
		 } // if not empty
 
	// Filter Buttons output
	echo '<div id="filters" class="button-group">' ."\n";
	// Create filter buttons from terms
		foreach ($filterLinks as $links) {
			echo '<button class="portbutton" data-filter="' . $links['slug'] . '">' . $links['name'] . '</button>'."\n";
		}
	echo '</div><!-- isotope filters -->';
?>


<div id="container">
<?php while ($wp_query->have_posts()) : ?>
<?php $wp_query->the_post(); ?>
	
<?php
// Get the terms with each post
$terms = get_the_terms( $post->ID, 'categorized' );
						
if ( $terms && ! is_wp_error( $terms ) ) : 

	$cat_links = array();

	foreach ( $terms as $term ) {
		$cat_links[] = $term->slug;
	}
						
	$mycats = join( " ", $cat_links );
?>


<?php endif; ?>
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

<?php //get_sidebar(); ?>
</div><!-- wrapper -->
<?php get_footer(); ?>