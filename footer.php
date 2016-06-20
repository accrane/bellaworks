<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div><!-- #main .wrapper -->
	
</div><!-- #page -->

<footer id="colophon" role="contentinfo">
		<div class="site-info">
		
         	<div class="footer-cred">
             <?php 
			 		$address = get_field('address','option'); 
			 		$city = get_field('city','option');
					$state = get_field('state','option');
					$zip = get_field('zip','option');
					$year = date('Y');
					$phone = get_field('phone_number','option');
					$fax = get_field('fax','option');
			 ?>
             <div class="footer-text">
			  <?php echo '&copy; ' . $year . ' Bellaworks Web | ' . $address . ' | ' . $city . ' , ' . $state . ' ' . $zip; ?>
              </div><!-- footer text -->
			  	<?php acc_social_links(); ?>
             </div><!-- footer cred -->
             
            
		</div><!-- .site-info -->
        
       
        
	</footer><!-- #colophon -->
<?php the_field('google_analtyics','option'); ?>
<?php wp_footer(); ?>


</body>
</html>