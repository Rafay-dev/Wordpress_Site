<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;


/**
 * Setup My Child Theme's textdomain.
 *
 * Declare textdomain for this child theme.
 * Translations can be filed in the /languages/ directory.
 */
function linoor_child_theme_setup() {
    load_child_theme_textdomain( 'linoor-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'linoor_child_theme_setup' );

if ( !function_exists( 'linoor_child_thm_parent_css' ) ):
    function linoor_child_thm_parent_css()
    {
        // loading parent styles
        wp_enqueue_style( 'linoor-parent-style', get_template_directory_uri() . '/style.css', array('linoor-fonts', 'flaticons', 'bootstrap', 'fontawesome') );

        // loading child style based on parent style
        wp_enqueue_style( 'linoor-style', get_stylesheet_directory_uri() . '/style.css', array(  'linoor-parent-style', 'linoor-main', 'linoor-responsive') );
    }

endif;
add_action( 'wp_enqueue_scripts', 'linoor_child_thm_parent_css' );

// END ENQUEUE PARENT ACTION