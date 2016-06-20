<?php
/**
 * The Template for displaying all single posts
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
            </div><!-- entry content -->
            
            
            <?php 
				$weblink = get_field('website_link');
				if($weblink != '') : ?>
            <div class="website-link">
            	<a href="<?php echo $weblink; ?>" target="_blank">visit site</a>
            </div><!-- website link -->
            <?php endif; ?>
            
            <div class="clear"></div>
            
            
            
<div class="meta">
Categorized: 
<?php
$taxonomy = 'category';

// get the term IDs assigned to post.
$post_terms = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );
// separator between links
$separator = ', ';

if ( !empty( $post_terms ) && !is_wp_error( $post_terms ) ) {

	$term_ids = implode( ',' , $post_terms );
	$terms = wp_list_categories( 'title_li=&style=none&echo=0&taxonomy=' . $taxonomy . '&include=' . $term_ids );
	$terms = rtrim( trim( str_replace( '<br />',  $separator, $terms ) ), $separator );

	// display post categories
	echo  $terms;
}
?>
</div><!-- meta -->

				<?php comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
</div><!-- wrapper -->

<?php get_footer(); ?>