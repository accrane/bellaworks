<div id="secondary" class="widget-area" role="complementary">
	<div class="widget">
    <h2>Other Projects</h2>	
    
    <?php
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'portfolio',
	'posts_per_page' => 5,
	'paged' => $paged,
));
	if ($wp_query->have_posts()) : ?>
        <ul>
			<?php while ($wp_query->have_posts()) : ?>
                
            <?php $wp_query->the_post(); ?>
            
            	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            
            <?php endwhile; ?>
        </ul>
    <?php endif; ?>
    </div><!-- widget -->	
</div><!-- #secondary -->
