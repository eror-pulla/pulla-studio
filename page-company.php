<?php 
get_header();
?>
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'banner-company' );        
			get_template_part( 'template-parts/content', 'we-are' );        
			get_template_part( 'template-parts/content', 'our-services' );        
			get_template_part( 'template-parts/content', 'awards' );        
			get_template_part( 'template-parts/content', 'values' );        

			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; 
		?>

 <?php
get_footer(); 
?>