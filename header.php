<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Pulla_Studio
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>  data-scroll-container>
<?php wp_body_open(); ?>
<!-- <div id="page" class="site"> -->
	<?php
	$logo= get_field('logo', 'option');
	?>
	<section class="overlay-loader">
		<div class="loader">
			<div class="inside-loader">
				<div class="loading-process">
					<p>/loading process/</p>
				</div>
				<div class="wrap-text">
					<p>We're glad you're here!</p>
					<h3>Thank you for visiting.</h3>
				</div>
			</div>
		</div>
	</section>
	<section class="loader-next-page">
		<div class="loader">
			<div class="inside-loader">
				<div class="loading-process">
					<p>/loading process/</p>
				</div>
				<div class="wrap-text">
					<p>We're glad you're here!</p>
					<h3>Almost there, loading the next page...</h3>
				</div>
			</div>
		</div>
	</section>
	<header class="header fade-in-header">
		<div class="header-wrpaper">
			<div class="inside-header">
				<div class="img-logo-wrap">
					<a href="/pulla/">
						<img src="<?php echo($logo); ?>" alt="">
					</a>
					<!-- <p>Logo</p> -->
				</div>
				<nav class="nav">
				<?php
                    wp_nav_menu(array(
                        'theme_location' => 'main-menu',
                    ));
                ?>
				</nav>
			</div>
		</div>
	</header>
	<?php if (is_page('company')) { 
		echo '<div class="about-page-wrap">';
		} ?> 
	<section class="site-wraper">

