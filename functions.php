<?php
/**
 * Pulla Studio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Pulla_Studio
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function pulla_studio_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Pulla Studio, use a find and replace
		* to change 'pulla-studio' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'pulla-studio', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'pulla-studio' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'pulla_studio_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'pulla_studio_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pulla_studio_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'pulla_studio_content_width', 640 );
}
add_action( 'after_setup_theme', 'pulla_studio_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pulla_studio_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'pulla-studio' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'pulla-studio' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'pulla_studio_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function pulla_studio_scripts() {
	wp_enqueue_style( 'pulla-studio-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'pulla-studio-style', 'rtl', 'replace' );

	wp_enqueue_script( 'pulla-studio-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'pulla_studio_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function theme_enqueue_styles() {
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0');
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

// Enqueue Locomotive Scroll CSS
function enqueue_locomotive_scroll_styles() {
    wp_enqueue_style('locomotive-scroll', get_template_directory_uri() . '/locomotive/locomotive-scroll.css');
}
add_action('wp_enqueue_scripts', 'enqueue_locomotive_scroll_styles');

// Enqueue Locomotive Scroll JavaScript
function enqueue_locomotive_scroll_script() {
    wp_enqueue_script('locomotive-scroll', get_template_directory_uri() . '/locomotive/locomotive-scroll.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_locomotive_scroll_script');
function enqueue_gsap_scripts() {
    // Enqueue GSAP core
    wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.4/gsap.min.js', array(), null, true);
    
    // Enqueue GSAP ScrollTrigger
    wp_enqueue_script('gsap-scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.4/ScrollTrigger.min.js', array('gsap'), null, true);
    
    // Your custom JS
    // wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery', 'gsap', 'gsap-scrolltrigger'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_gsap_scripts');

// Enqueue custom script
function enqueue_custom_script() {
	 // Enqueue Swiper CSS
	 wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), null);
	 // Enqueue Swiper JS
	 wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array('jquery'), null, true);

	//  wp_enqueue_script('custom-script', get_template_directory_uri() . '/src/js/app.js',  array('swiper-js', 'jquery'), '1.0', true);
	//  wp_enqueue_script('custom-about', get_template_directory_uri() . '/src/js/about.js',  array('swiper-js', 'jquery'), '1.0', true);

	if (is_page('company')) {
        // Enqueue about.js only on the company page
        wp_enqueue_script('custom-about', get_template_directory_uri() . '/src/js/about.js', array('swiper-js', 'jquery'), '1.1', true);
		
    } else {
        // Enqueue app.js on all other pages except the company page
        wp_enqueue_script('custom-script', get_template_directory_uri() . '/src/js/app.js', array('swiper-js', 'jquery'), '1.0', true);
    }


	 wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', null, null, true);
	 wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');

	//  wp_enqueue_script('custom-about', get_template_directory_uri() . '/src/js/about.js', array('swiper-js'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_script');


// Register the menu location
function my_custom_theme_setup() {
    register_nav_menus(array(
        'main-menu' => __('Main Menu', 'pulla-studio'),
		'footer-main-menu' => __('Footer Main Menu', 'pulla-studio'),
        'social-menu' => __('Social Menu', 'pulla-studio'),
    ));
}

add_action('after_setup_theme', 'my_custom_theme_setup');


if( function_exists('acf_add_options_page') ) {

    acf_add_options_page();

}

function enqueue_plyr_and_jquery() {
    wp_enqueue_style('plyr-css', 'https://cdn.plyr.io/3.7.2/plyr.css');
    wp_enqueue_script('plyr-js', 'https://cdn.plyr.io/3.7.2/plyr.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_plyr_and_jquery');
