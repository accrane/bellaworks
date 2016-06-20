<div class="item newsblock">
    <a href="<?php the_permalink(); ?>">
    <?php if ( has_post_thumbnail() ) {
                    the_post_thumbnail();
                } ?>
        <div class="news-content">
            <div class="entry-content">
                <h2><?php the_title(); ?></h2>
                    <?php the_excerpt(); ?>
            </div><!-- entry content -->
            <div class="read">keep reading</div>
         </div><!-- news content -->
    </a>
</div><!-- item -->