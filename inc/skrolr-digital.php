<?php 
// run loop to see if we have a banner 
if(have_posts()) : 
		while(have_posts()) : 
		the_post(); 

$banner = get_field('top_banner');

if ( $banner != '' ) :
?>

<section id="slide-1" class="homeSlide">
    <div class="bcg "
     style="background-image:url(<?php echo $banner; ?>);"
        data-center="background-position: 50% 0px;"
        data-top-bottom="background-position: 50% -100px;"
        data-anchor-target="#slide-1">
        <div class="hsContainer">
            <div class="hsContent"
                data-center="opacity: 1"
                data-106-top="opacity: 0"
                data-anchor-target="#slide-1">
               
            </div>
        </div>
    </div>
</section>
<?php 
// end if banner emtpy
endif;
// end while loop
endwhile; 
// end loop
endif; 
// reset query data 
wp_reset_postdata(); ?>