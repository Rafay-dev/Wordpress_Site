<?php

/**
 * Template part for displaying Page Banner
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package linoor
 */

?>

<!-- Banner Section -->
<section class="page-banner">
    <div class="image-layer"></div>
    <div class="shape-1"></div>
    <div class="shape-2"></div>
    <div class="banner-inner">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <?php $linoor_page_title_text = !empty(get_post_meta(get_the_ID(), 'linoor_set_header_title', true)) ? get_post_meta(get_the_ID(), 'linoor_set_header_title', true) : get_the_title(); ?>
                <h1>
                    <?php if (!is_page()) : ?>
                        <?php linoor_page_title(); ?>
                    <?php else : ?>
                        <?php echo wp_kses($linoor_page_title_text, 'linoor_allowed_tags') ?>
                    <?php endif; ?>
                </h1>

                <?php $linoor_page_meta_breadcumb_status = empty(get_post_meta(get_the_ID(), 'linoor_show_page_breadcrumb', true)) ? 'on' : get_post_meta(get_the_ID(), 'linoor_show_page_breadcrumb', true); ?>

                <?php if (function_exists('linoor_wp_breadcrumb') && 'on' == get_theme_mod('breadcrumb_opt', 'on') && 'on' == $linoor_page_meta_breadcumb_status) : ?>
                    <div class="page-nav">
                        <?php linoor_wp_breadcrumb('ul', 'thm-breadcrumb', 'bread-crumb clearfix', 'active', true); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!--End Banner Section -->