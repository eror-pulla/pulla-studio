<?php 
get_header();
?>

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'banner-company' );        
			get_template_part( 'template-parts/content', 'we-are' );        

			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

 <?php
get_footer(); 