<?php
/**
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	
		<div id="secondary" class="widget-area" role="complementary">
			<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
            <?php endif; ?>
            
			
			
			<div class="widget">
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
            
            
            <div class="widget">
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
            
            
		</div><!-- #secondary -->
	