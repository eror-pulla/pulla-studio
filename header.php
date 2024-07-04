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

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<!-- <div id="page" class="site"> -->
	<?php
	$logo= get_field('logo', 'option');
	?>
	<header class="header">
		<div class="header-wrpaper">
			<div class="inside-header">
				<div class="img-logo-wrap">
					<a href="">
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
