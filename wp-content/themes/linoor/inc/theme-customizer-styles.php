<?php

/**
 * linoor functions for getting inline styles from theme customizer
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package linoor
 */

if (!function_exists('linoor_theme_customizer_styles')) :
    function linoor_theme_customizer_styles()
    {

        // linoor color option

        $linoor_inline_style = '';
        $linoor_inline_style .= ':root {--thm-base: ' . get_theme_mod('theme_base_color', sanitize_hex_color('#ffaa17')) . '; --thm-black: ' . get_theme_mod('theme_black_color', sanitize_hex_color('#222429')) . '; }';

        $linoor_inner_banner_bg = get_theme_mod('page_header_bg_image');
        $linoor_inline_style .= '.page-banner .image-layer { background-image: url(' . $linoor_inner_banner_bg . '); } ';

        if (is_page()) {

            $linoor_page_base_color = empty(get_post_meta(get_the_ID(), 'linoor_base_color', true)) ? get_theme_mod('theme_base_color', sanitize_hex_color('#ffaa17')) : get_post_meta(get_the_ID(), 'linoor_base_color', true);

            $linoor_page_black_color = empty(get_post_meta(get_the_ID(), 'linoor_black_color', true)) ? get_theme_mod('theme_black_color', sanitize_hex_color('#222429')) : get_post_meta(get_the_ID(), 'linoor_black_color', true);

            $linoor_inline_style .= ':root {--thm-base: ' . $linoor_page_base_color . '; --thm-black: ' . $linoor_page_black_color . '; }';

            $linoor_page_header_bg = empty(get_post_meta(get_the_ID(), 'linoor_set_header_image', true)) ? get_theme_mod('page_header_bg_image') : get_post_meta(get_the_ID(), 'linoor_set_header_image', true);

            $linoor_inline_style .= '.page-banner .image-layer { background-image: url(' . $linoor_page_header_bg . '); }';
        }


        wp_add_inline_style('linoor-main', $linoor_inline_style);
    }
endif;

add_action('wp_enqueue_scripts', 'linoor_theme_customizer_styles');
