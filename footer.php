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

	<footer class="footer">
		<div class="footer-wraper">
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
						<p>Ali Vitia, nr. 258 <br> Prishtine, 10000 Kosovo</p>
					</div>
				</div>
				<div class="columns-3">
					<div class="one-click">
						<p>The doorway to amazing is one click away, so choose any form you like <br> and we will be happy to help.</p>
					</div>
				</div>
			</div>
			<div class="info-big-banner">
				<p>
					<a href="">
					info@pulla.Studio
					</a>
				</p>
			</div>
			<div class="copy-rights">
				<div class="columns-2">
					<p>© 2024 by Pulla. All rights reserved.</p>
				</div>
				<div class="columns-2">
					<p>Site by <b class='white'>Pulla Digital</b></p>
				</div>
				<div class="columns-5">
					<p>We'd love to hear from you!</p>
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
