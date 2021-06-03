<?php

/**
 * Template part for displaying Header
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package linoor
 */

$linoor_page_id     = get_queried_object_id();
$linoor_custom_header_status = !empty(get_post_meta($linoor_page_id, 'linoor_custom_header_status', true)) ? get_post_meta($linoor_page_id, 'linoor_custom_header_status', true) : 'off';

$linoor_custom_header_id = '';
if (is_page() && 'on' === $linoor_custom_header_status) {
    $linoor_custom_header_id = get_post_meta($linoor_page_id, 'linoor_select_custom_header', true);
} elseif (true == get_theme_mod('header_custom')) {
    $linoor_custom_header_id = get_theme_mod('header_custom_post');
} else {
    $linoor_custom_header_id = 'default_header';
}

$linoor_dynamic_header = isset($_GET['custom_header_id']) ? $_GET['custom_header_id'] : $linoor_custom_header_id;
?>


<?php if ('default_header' == $linoor_dynamic_header) : ?>

    <!-- Main Header -->
    <?php $linoor_sticky_menu_class = get_theme_mod('header_stricked_menu', true) && !is_admin_bar_showing() ? 'sticky-menu' : '';
    ?>
    <header class="main-header header-style-one <?php echo esc_attr($linoor_sticky_menu_class); ?>">

        <!-- Header Upper -->
        <div class="header-upper">
            <div class="inner-container clearfix">
                <!--Logo-->
                <div class="logo-box">
                    <div class="logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <?php
                            $linoor_logo_size = get_theme_mod('header_logo_width', 133);
                            $linoor_custom_logo_id = get_theme_mod('custom_logo');
                            $linoor_logo = wp_get_attachment_image_src($linoor_custom_logo_id, 'full');
                            if (has_custom_logo()) {
                                echo '<img width="' . esc_attr($linoor_logo_size) . '" src="' . esc_url($linoor_logo[0]) . '" alt="' . esc_attr(get_bloginfo('name')) . '">';
                            } else {
                                echo '<h1>' . esc_html(get_bloginfo('name')) . '</h1>';
                            } ?>
                        </a>
                    </div>
                </div>
                <div class="nav-outer clearfix">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler"><span class="icon flaticon-menu-2"></span><span class="txt"><?php esc_html_e('Menu', 'linoor'); ?></span></div>

                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'menu-1',
                                    'menu_id'        => 'primary-menu',
                                    'fallback_cb' => 'linoor_menu_fallback_callback',
                                    'menu_class' => 'navigation clearfix',
                                )
                            );
                            ?>
                        </div>
                    </nav>
                </div>

                <div class="other-links clearfix">
                    <!--Search Btn-->
                    <?php $linoor_search_btn_status = get_theme_mod('header_search_btn', false); ?>
                    <?php if ($linoor_search_btn_status) : ?>
                        <div class="search-btn">
                            <button type="button" class="theme-btn search-toggler"><span class="flaticon-loupe"></span></button>
                        </div>
                    <?php endif; ?>

                    <?php $linoor_call_btn_status = get_theme_mod('header_call_btn_switch', false); ?>
                    <?php if ($linoor_call_btn_status) : ?>
                        <div class="link-box">
                            <div class="call-us">
                                <a class="link" href="<?php echo esc_url(get_theme_mod('header_call_btn_link')); ?>">
                                    <span class="icon"></span>
                                    <span class="sub-text"><?php echo esc_html(get_theme_mod('header_call_btn_text')); ?></span>
                                    <span class="number"><?php echo esc_html(get_theme_mod('header_call_btn_number')); ?></span>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
        <!--End Header Upper-->


    </header>
    <!-- End Main Header -->

    <!--Search Popup-->
    <div class="search-popup">
        <div class="search-popup__overlay">
        </div><!-- /.search-popup__overlay -->
        <div class="search-popup__inner">
            <?php echo get_search_form(); ?>
        </div><!-- /.search-popup__inner -->
    </div><!-- /.search-popup -->


    <!--Mobile Menu-->
    <div class="side-menu__block">
        <div class="side-menu__block-overlay">
        </div><!-- /.side-menu__block-overlay -->
        <div class="side-menu__block-inner ">
            <div class="side-menu__top justify-content-between">
                <div class="logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <?php
                        $linoor_logo_size = get_theme_mod('header_logo_width', 133);
                        $linoor_custom_logo_id = get_theme_mod('custom_logo');
                        $linoor_logo = wp_get_attachment_image_src($linoor_custom_logo_id, 'full');
                        if (has_custom_logo()) {
                            echo '<img width="' . esc_attr($linoor_logo_size) . '" src="' . esc_url($linoor_logo[0]) . '" alt="' . esc_attr(get_bloginfo('name')) . '">';
                        } else {
                            echo '<h1>' . esc_html(get_bloginfo('name')) . '</h1>';
                        } ?>
                    </a>
                </div>
                <a href="#" class="side-menu__toggler side-menu__close-btn"></a>
            </div><!-- /.side-menu__top -->


            <nav class="mobile-nav__container">
                <!-- content is loading via js -->
            </nav>
            <?php $linoor_mobile_menu_content = get_theme_mod('linoor_mobile_menu_text'); ?>
            <?php if (!empty($linoor_mobile_menu_content)) : ?>
                <div class="side-menu__sep"></div><!-- /.side-menu__sep -->
            <?php endif; ?>
            <div class="side-menu__content">
                <?php if (!empty($linoor_mobile_menu_content)) : ?>
                    <?php echo wp_kses($linoor_mobile_menu_content, 'linoor_allowed_tags'); ?>
                <?php endif; ?>
                <div class="side-menu__social">
                    <?php $linoor_mobile_menu_social = get_theme_mod('mobile_menu_social_icons'); ?>
                    <?php if (!empty($linoor_mobile_menu_social)) : ?>
                        <?php foreach ($linoor_mobile_menu_social as $social_icon) : ?>
                            <a href="<?php echo esc_url($social_icon['link_url']); ?>"><i class="fab <?php echo esc_attr($social_icon['link_icon']); ?>"></i></a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div><!-- /.side-menu__content -->
        </div><!-- /.side-menu__block-inner -->
    </div><!-- /.side-menu__block -->


    <?php $linoor_back_to_top_status = get_theme_mod('scroll_to_top', false); ?>
    <?php if (true === $linoor_back_to_top_status) : ?>
        <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa <?php echo esc_attr(get_theme_mod('scroll_to_top_icon', 'fa-angle-up')); ?>"></i></a>

    <?php endif; ?>

<?php else : ?>
    <?php echo do_shortcode('[linoor-header id="' . $linoor_dynamic_header . '"]');
    ?>
<?php endif; ?>