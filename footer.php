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
	<footer class="footer" data-scroll-section>
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
						<p><?php echo($address);?> <br><?php echo($address_brake);?></p>
					</div>
				</div>
				<div class="columns-3">
					<div class="one-click">
						<p><?php echo($text_footer); ?><br><?php echo($text_footer_brake); ?></p>
					</div>
				</div>
			</div>
			<div class="info-big-banner">
				<p>
					<a href="">
					<?php echo($info); ?>
					</a>
				</p>
			</div>
			<div class="copy-rights">
				<div class="columns-2">
					<p><?php echo($copyrights); ?></p>
				</div>
				<div class="columns-6">
					<p><?php echo($site_by); ?></p><p class='white'>Pulla Digital</p>
				</div>
				<div class="columns-5">
					<p><?php echo($message); ?></p>
				</div>
				<div class="columns-4">
					<p>
						<a href="" class="go-top">Go to Top</a>
					</p>
				</div>
			</div>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
