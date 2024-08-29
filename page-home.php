<?php 
get_header();
?>

	<!-- <section class="site-main" data-scroll-container> -->

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'home' );        
			get_template_part( 'template-parts/content', 'cases-home' );        
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
	<!-- </section> -->

 <?php
get_footer(); 