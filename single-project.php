<?php
/**
 * The template for displaying all single cases
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Pulla_Studio
 */

get_header();
?>

<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'single-banner' );        
			get_template_part( 'template-parts/content', 'single-grid' );        
			
		endwhile; // End of the loop.
		?>

<?php
get_footer();
