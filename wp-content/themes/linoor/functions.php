<?php

/**
 * linoor functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package linoor
 */

if (!defined('_LINOOR_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_LINOOR_VERSION', '1.3');
}

if (!function_exists('linoor_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_linooretup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function linoor_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on linoor, use a find and replace
		 * to change 'linoor' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('linoor', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__('Primary', 'linoor'),
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
				'linoor_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

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
endif;
add_action('after_setup_theme', 'linoor_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function linoor_content_width()
{
	$GLOBALS['content_width'] = apply_filters('linoor_content_width', 640);
}
add_action('after_linooretup_theme', 'linoor_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function linoor_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'linoor'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'linoor'),
			'before_widget' => '<section id="%1$s" class="widget sidebar-widget %2$s"><div class="widget-inner">',
			'after_widget'  => '</div></section>',
			'before_title'  => '<div class="sidebar-title"><h4>',
			'after_title'   => '</h4></div>',
		)
	);
}
add_action('widgets_init', 'linoor_widgets_init');


// google font process

function linoor_fonts_url()
{
	$font_url = '';

	/*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
	if ('off' !== _x('on', 'Google font: on or off', 'linoor')) {
		$font_url = add_query_arg('family', urlencode('Rubik:300,400,700|Teko:300,400,500,600,700&subset=latin,latin-ext'), "//fonts.googleapis.com/css");
	}

	return esc_url_raw($font_url);
}

/**
 * Enqueue scripts and styles.
 */
function linoor_scripts()
{
	wp_enqueue_style('linoor-fonts', linoor_fonts_url(), array(), null);
	wp_enqueue_style('flaticons', get_template_directory_uri() . '/assets/vendors/flaticons/css/flaticon.css', array(), '1.1');
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/vendors/bootstrap/css/bootstrap.min.css', array(), '4.5.3');
	wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/vendors/fontawesome/css/all.min.css', array(), '5.15.1');
	wp_enqueue_style('linoor-style', get_stylesheet_uri(), array(), time());
	wp_style_add_data('linoor-style', 'rtl', 'replace');
	wp_enqueue_style('linoor-main', get_template_directory_uri() . '/assets/css/linoor-main.css', array(), time());
	wp_enqueue_style('linoor-responsive', get_template_directory_uri() . '/assets/css/linoor-responsive.css', array(), time());

	wp_enqueue_script('bootstrap-bundle', get_template_directory_uri() . '/assets/vendors/bootstrap/js/bootstrap.bundle.min.js', array('jquery'), '4.5.3', true);
	wp_enqueue_script('linoor-theme', get_template_directory_uri() . '/assets/js/linoor-theme.js', array('jquery'), time(), true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'linoor_scripts');


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Functions which give notice for required plugins to work theme properly
 */
require get_template_directory() . '/inc/plugins.php';

/**
 * Implement the breadcrumb feature.
 */
require get_template_directory() . '/library/linoor-wp-breadcrumb.php';

/**
 * Implement the customizer feature.
 */
if (class_exists('Kirki')) {
	require get_template_directory() . '/inc/customizer.php';
	require get_template_directory() . '/inc/theme-customizer-styles.php';
}

/*
* one click deomon import
*/
if (class_exists('OCDI_Plugin')) {
	require get_template_directory() . '/inc/demo-import.php';
}
