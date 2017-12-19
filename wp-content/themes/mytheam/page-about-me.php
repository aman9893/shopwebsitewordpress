<?php get_header(); ?>

	<?php 
	
	if( have_posts() ):
		
		while( have_posts() ): the_post(); ?>
		
			<h3><?php the_title(); ?></h3>
		        <?php the_category(); ?>
			
			<p><?php the_content(); ?></p>
			
			<hr>
		
		<?php endwhile;
		
	endif;
			
	?>

<?php get_footer(); ?>