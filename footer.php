<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Pulla_Studio
 */

?>

<?php
// Template Name: Home

// Fetch ACF fields
$footer= get_field('footer', 'option');
$copyrights=$footer['copyrights'];
$address=$footer['address'];
$address_brake=$footer['address_brake'];
$text_footer=$footer['text_footer'];
$text_footer_brake=$footer['text_footer_brake'];
$site_by=$footer['site_by'];
$site_by=$footer['site_by'];
$message=$footer['message'];
$info=$footer['info'];


?>
	</section>
	<?php if (is_page('company')) { 
		echo '<footer class="footer" data-scroll>'; }
		else{
			echo '<footer class="footer" data-scroll-section data-scroll>';
		} ?>
		<div class="footer-wraper" data-scroll>
			<div class="menus-footer">
				<div class="columns-2">
					<div class="wrap-menu-footer">
						<?php
						wp_nav_menu(array(
							'theme_location' => 'footer-main-menu',
						));
						?>
					</div>
				</div>
				<div class="columns-2">
					<div class="wrap-menu-footer">
						<?php
						wp_nav_menu(array(
							'theme_location' => 'social-menu'
						));
						?>
					</div>
				</div>
				<div class="columns-3">
					<div class="address">
						<p data-scroll><?php echo($address);?> <br><?php echo($address_brake);?></p>
					</div>
				</div>
				<div class="columns-3">
					<div class="one-click">
						<p data-scroll><?php echo($text_footer); ?><?php echo($text_footer_brake); ?></p>
					</div>
				</div>
			</div>
			<div class="info-big-banner">
				<div class="split-lines">
					<p data-scroll>
						<a href="javascript:void(0);" class="copy-text">
						<?php echo($info); ?>
						</a>
					</p>
				</div>
				<div class="custom-cursor">Copy to Clipboard</div>
			</div>
			<div class="copy-rights">
				<div class="columns-2">
					<p data-scroll><?php echo($copyrights); ?></p>
				</div>
				<div class="columns-6">
					<p data-scroll class="gray-text"><?php echo($site_by); ?></p><a class='white' target="_blank" href="https://pulla.digital/"  rel="noopener noreferrer" data-scroll>Pulla Digital</a>
				</div>
				<div class="columns-5">
					<p data-scroll><?php echo($message); ?></p>
				</div>
				<div class="columns-4">
					<p data-scroll>
						<a href="" class="go-top">Go to Top</a>
					</p>
				</div>
			</div>
		</div>
	</footer>
	<?php if (is_page('company')) { 
		echo '</div>'; } ?> 
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
