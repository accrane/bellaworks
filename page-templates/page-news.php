<?php
/**
 * Template Name: News
 *
 */

get_header(); ?>

	<div class="wrapper">
    <div id="primary" class="">
		<div id="content" role="main">
        
        <header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->

				<?php
                    $wp_query = new WP_Query();
                    $wp_query->query(array(
                    'post_type'=>'post',
                    'posts_per_page' => 10,
                    'paged' => $paged,
                ));
                    if ($wp_query->have_posts()) : ?>
                    
                        <div id="container">
                        
							<?php while ($wp_query->have_posts()) : ?>
                                
                            <?php $wp_query->the_post(); ?>	
                            
                            		<?php get_template_part('inc/news-full'); ?>
                            
                            
                            <?php endwhile; ?>
                        </div><!-- container -->
                    
                    <?php pagi_posts_nav(); ?>
                    
                    <?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

		<div id="secondary-news" class="widget-area" role="complementary">
			<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
            <?php endif; ?>
            
			
			
			<div class="widget news-bottom-block">
            <h3 class="widget-title">News Archives</h3>
			<?php 
			$args = array(
				'type'            => 'yearly',
				'limit'           => '',
				'format'          => 'html', 
				'before'          => '',
				'after'           => '',
				'show_post_count' => false,
				'echo'            => 1,
				'order'           => 'DESC'
			);
			wp_get_archives( $args ); ?>
            </div><!-- widget -->
            
            
            <div class="widget news-bottom-block">
            	<h3 class="widget-title">News Categories</h3>
                <?php 
					$args = array(
					'show_option_all'    => '',
					'orderby'            => 'name',
					'order'              => 'ASC',
					'style'              => 'list',
					'show_count'         => 0,
					'hide_empty'         => 1,
					'use_desc_for_title' => 1,
					'child_of'           => 0,
					'feed'               => '',
					'feed_type'          => '',
					'feed_image'         => '',
					'exclude'            => '',
					'exclude_tree'       => '',
					'include'            => '',
					'hierarchical'       => 1,
					'title_li'           => __( '' ),
					'show_option_none'   => __( '' ),
					'number'             => null,
					'echo'               => 1,
					'depth'              => 0,
					'current_category'   => 0,
					'pad_counts'         => 0,
					'taxonomy'           => 'category',
					'walker'             => null
					);
					wp_list_categories( $args ); 
				?>
            </div><!-- widget -->
            
            <div class="widget">
            <h3 class="widget-title">News Tags</h3>
            <?php
					echo get_the_tag_list('<li>Tags: ',', ','</li>');
				?>
            </div><!-- widget -->
            
            
		</div><!-- #secondary -->
</div><!-- wrapper -->


<?php get_footer(); ?>