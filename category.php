<?php
/**
 * The template for displaying Category pages
 *
 * Used to display archive-type pages for posts in a category.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package
 */

get_header(); ?>

<div class="wrapper">
	<div id="primary" class="site-content">
		<div id="content" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title"><?php printf( __( 'Category Archives: %s', 'twentytwelve' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>

			<?php if ( category_description() ) : // Show an optional category description ?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
			<?php endif; ?>
			</header><!-- .archive-header -->

                <div id="container">	
                <?php while(have_posts()) :  ?>	
                <?php the_post(); ?>		

						<?php get_template_part('inc/news'); ?>
            
            	<?php endwhile; ?>
       			 </div><!-- container -->
    
    				<?php pagi_posts_nav(); ?>
        
        <?php endif; ?>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
</div><!-- wrapper -->
<?php get_footer(); ?>