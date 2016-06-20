<?php 
// set counter
$step = 0;
// loop
if( have_rows('phase') ): ?>
<div class="phase">
<?php while ( have_rows('phase') ) : 
the_row(); 

$phase = get_sub_field('phase');

?>

<?php if($phase != '') : ?>
    <div class="phase-title">
    	<?php echo $phase; ?>
    </div><!-- phase title -->
<?php endif; // end if phase is empty ?>
 
	<?php 
	// Repeater within the repeater "The Steps"
    if( have_rows('step') ):
    while ( have_rows('step') ) : 
    the_row(); 
	
	++$step;
	if( $step > 1 ) {
		$class = 'step';
	} else {
		$class = 'step-full';
	}
	$title = get_sub_field('title');
	$desc = get_sub_field('description');
    ?>
    
    <div class="<?php echo $class; ?>">
    	<div class="step-number"><?php echo $step; ?></div><!-- step number -->
        <div class="step-title"><?php echo $title; ?></div><!-- step number -->
        <div class="step-desc"><?php echo $desc; ?></div><!-- step number -->
    </div><!-- step -->
    
    <?php endwhile; ?>
    <?php endif; ?>
 
<?php endwhile; ?>
</div><!-- phase -->
<?php endif; ?>