<?php

$linoor_config_id = 'linoor_customize';

Kirki::add_config($linoor_config_id, array(
    'capability'    => 'edit_theme_options',
    'option_type'   => 'theme_mod',
));


/**
 * theme option panel master
 */

Kirki::add_panel('linoor_theme_opt', array(
    'priority'    => 240,
    'title'       => esc_html__('Linoor Options', 'linoor'),
    'description' => esc_html__('Linoor Theme options panel', 'linoor'),
));

/**
 * General options
 */
Kirki::add_section('linoor_theme_general', array(
    'title'          => esc_html__('General Settings', 'linoor'),
    'description'    => esc_html__('Linoor General Settings.', 'linoor'),
    'panel'          => 'linoor_theme_opt',
    'priority'       => 160,
));


// theme base color
Kirki::add_field($linoor_config_id, [
    'type'        => 'color',
    'settings'    => 'theme_base_color',
    'label'       => __('Select Theme Base color', 'linoor'),
    'section'     => 'linoor_theme_general',
    'default'     => sanitize_hex_color('#ffaa17'),
]);


// theme black color
Kirki::add_field($linoor_config_id, [
    'type'        => 'color',
    'settings'    => 'theme_black_color',
    'label'       => __('Select Theme Black color', 'linoor'),
    'section'     => 'linoor_theme_general',
    'default'     => sanitize_hex_color('#222429'),
]);

// general options fields

Kirki::add_field($linoor_config_id, [
    'type'        => 'checkbox',
    'settings'    => 'preloader',
    'label'       => esc_html__('Preloader Visibility', 'linoor'),
    'section'     => 'linoor_theme_general',
    'default'     => false,
    'priority'    => 10
]);

Kirki::add_field($linoor_config_id, [
    'type'        => 'checkbox',
    'settings'    => 'linoor_boxed_layout',
    'label'       => esc_html__('Enable Boxed Layout', 'linoor'),
    'section'     => 'linoor_theme_general',
    'default'     => false,
    'priority'    => 10
]);

Kirki::add_field($linoor_config_id, [
    'type'        => 'checkbox',
    'settings'    => 'linoor_dark_mode',
    'label'       => esc_html__('Enable Dark Mode', 'linoor'),
    'section'     => 'linoor_theme_general',
    'default'     => false,
    'priority'    => 10
]);



Kirki::add_field($linoor_config_id, [
    'type'        => 'checkbox',
    'settings'    => 'scroll_to_top',
    'label'       => esc_html__('Back to top Visibility', 'linoor'),
    'section'     => 'linoor_theme_general',
    'default'     => false,
    'priority'    => 10
]);

Kirki::add_field($linoor_config_id, [
    'type'        => 'select',
    'settings'    => 'scroll_to_top_icon',
    'label'       => esc_html__('Select Back to top icon', 'linoor'),
    'section'     => 'linoor_theme_general',
    'default'     => 'fa-angle-up',
    'priority'    => 10,
    'multiple'    => 0,
    'choices'     => linoor_get_fa_icons(),
    'active_callback'  => function () {
        $switch_value = get_theme_mod('scroll_to_top', true);

        if (true === $switch_value) {
            return true;
        }
        return false;
    },
]);




// background image
Kirki::add_field($linoor_config_id, [
    'type'        => 'image',
    'settings'    => 'error_404_image',
    'label'       => esc_html__('Custom 404 Image', 'linoor'),
    'section'     => 'linoor_theme_general',
]);

// page header background image
Kirki::add_field($linoor_config_id, [
    'type'        => 'image',
    'settings'    => 'page_header_bg_image',
    'label'       => esc_html__('Page Header Background Image', 'linoor'),
    'section'     => 'linoor_theme_general',
]);




/**
 * Header options
 */

Kirki::add_section('linoor_theme_header', array(
    'title'          => esc_html__('Header Settings', 'linoor'),
    'description'    => esc_html__('Linoor Header Settings.', 'linoor'),
    'panel'          => 'linoor_theme_opt',
    'priority'       => 160,
));



// set logo width
Kirki::add_field($linoor_config_id, [
    'type'        => 'text',
    'settings'    => 'header_logo_width',
    'label'       => __('Add Logo size in px', 'linoor'),
    'section'     => 'linoor_theme_header',
    'default'     => esc_html(133),
]);




Kirki::add_field($linoor_config_id, [
    'type'        => 'checkbox',
    'settings'    => 'header_call_btn_switch',
    'label'       => esc_html__('Call Btn Visibility', 'linoor'),
    'section'     => 'linoor_theme_header',
    'default'     => true,
    'priority'    => 10,
]);


Kirki::add_field($linoor_config_id, [
    'type'     => 'text',
    'settings' => 'header_call_btn_text',
    'label'    => esc_html__('Call Btn Text', 'linoor'),
    'section'  => 'linoor_theme_header',
    'default'  => esc_html__('Btn Text', 'linoor'),
    'priority' => 10,
    'active_callback'  => function () {
        $switch_value = get_theme_mod('header_call_btn_switch', true);

        if (true === $switch_value) {
            return true;
        }
        return false;
    },
]);
Kirki::add_field($linoor_config_id, [
    'type'     => 'text',
    'settings' => 'header_call_btn_number',
    'label'    => esc_html__('Call Btn Number', 'linoor'),
    'section'  => 'linoor_theme_header',
    'default'  => esc_html__('666 888 0000', 'linoor'),
    'priority' => 10,
    'active_callback'  => function () {
        $switch_value = get_theme_mod('header_call_btn_switch', true);

        if (true === $switch_value) {
            return true;
        }
        return false;
    },
]);

Kirki::add_field($linoor_config_id, [
    'type'     => 'link',
    'settings' => 'header_call_btn_link',
    'label'    => __('Call Btn Link', 'linoor'),
    'section'  => 'linoor_theme_header',
    'default'  => '#',
    'priority' => 10,
    'active_callback'  => function () {
        $switch_value = get_theme_mod('header_call_btn_switch', true);

        if (true === $switch_value) {
            return true;
        }
        return false;
    },
]);



// stricky switch
Kirki::add_field($linoor_config_id, [
    'type'        => 'checkbox',
    'settings'    => 'header_stricked_menu',
    'label'       => esc_html__('Stricky Header', 'linoor'),
    'section'     => 'linoor_theme_header',
    'default'     => true,
    'priority'    => 10,
]);

// header banner breadcrumb
Kirki::add_field($linoor_config_id, [
    'type'        => 'switch',
    'settings'    => 'header_search_btn',
    'label'       => esc_html__('Search Button Visibility', 'linoor'),
    'section'     => 'linoor_theme_header',
    'default'     => 'on',
    'priority'    => 10,
    'choices'     => [
        'on'  => esc_html__('Enable', 'linoor'),
        'off' => esc_html__('Disable', 'linoor'),
    ],
]);

// header banner breadcrumb
Kirki::add_field($linoor_config_id, [
    'type'        => 'switch',
    'settings'    => 'breadcrumb_opt',
    'label'       => esc_html__('Breadcrumb Visibility', 'linoor'),
    'section'     => 'linoor_theme_header',
    'default'     => 'on',
    'priority'    => 10,
    'choices'     => [
        'on'  => esc_html__('Enable', 'linoor'),
        'off' => esc_html__('Disable', 'linoor'),
    ],
]);



// Footer options fields
Kirki::add_field($linoor_config_id, [
    'type'        => 'checkbox',
    'settings'    => 'header_custom',
    'label'       => esc_html__('Enable Custom Header', 'linoor'),
    'section'     => 'linoor_theme_header',
    'default'     => false,
    'priority'    => 10,
]);

// Get Footer Custom Post
Kirki::add_field($linoor_config_id, [
    'type'        => 'select',
    'settings'    => 'header_custom_post',
    'label'       => esc_html__('Select Header Type', 'linoor'),
    'choices'     => linoor_post_query('header'),
    'section'     => 'linoor_theme_header',
    'priority'    => 10,
    'active_callback' => function () {
        if (true == post_type_exists('header') && true == get_theme_mod('header_custom')) {
            return true;
        } else {
            return false;
        }
    },
]);


/**
 * Mobile Menu
 */

Kirki::add_section('linoor_theme_mobile_menu', array(
    'title'          => esc_html__('Mobile Menu Settings', 'linoor'),
    'description'    => esc_html__('Linoor Mobile Menu Settings.', 'linoor'),
    'panel'          => 'linoor_theme_opt',
    'priority'       => 160,
));

Kirki::add_field($linoor_config_id, [
    'type'     => 'textarea',
    'settings' => 'linoor_mobile_menu_text',
    'label'    => esc_html__('Mobile Menu Content', 'linoor'),
    'section'  => 'linoor_theme_mobile_menu',
    'default'  => esc_html__('Lorem Ipsum is simply dummy text the printing and setting industry. Lorm Ipsum has been the industry', 'linoor'),
    'priority' => 10,
]);

Kirki::add_field($linoor_config_id, [
    'type'        => 'repeater',
    'label'       => esc_html__('Select Social Icons', 'linoor'),
    'section'     => 'linoor_theme_mobile_menu',
    'priority'    => 10,
    'row_label' => [
        'type'  => 'text',
        'value' => esc_html__('Social Icons', 'linoor'),
    ],
    'button_label' => esc_html__('Add new Icon', 'linoor'),
    'settings'     => 'mobile_menu_social_icons',
    'default'      => [
        [
            'link_icon' => 'fa-facebook',
            'link_url' => esc_url('http://facebook.com'),
        ],
    ],
    'fields' => [
        'link_icon'  => [
            'type'        => 'select',
            'label'       => esc_html__('Social Icon', 'linoor'),
            'description' => esc_html__('Select Social Icons', 'linoor'),
            'default'     => 'fa-facebook',
            'choices'     => linoor_get_fa_icons(),
        ],
        'link_url' => [
            'type'        => 'text',
            'label'       => esc_html__('Link Url', 'linoor'),
            'description' => esc_html__('Add social profile links', 'linoor'),
            'default'     => esc_url('https://facebook.com/'),
        ],
    ]
]);




/**
 * Footer options
 */

Kirki::add_section('linoor_theme_footer', array(
    'title'          => esc_html__('Footer Settings', 'linoor'),
    'description'    => esc_html__('Linoor Footer Settings.', 'linoor'),
    'panel'          => 'linoor_theme_opt',
    'priority'       => 160,
));

// Footer options fields
Kirki::add_field($linoor_config_id, [
    'type'        => 'checkbox',
    'settings'    => 'footer_custom',
    'label'       => esc_html__('Enable Custom Footer', 'linoor'),
    'section'     => 'linoor_theme_footer',
    'default'     => false,
    'priority'    => 10,
]);

// Get Footer Custom Post
Kirki::add_field($linoor_config_id, [
    'type'        => 'select',
    'settings'    => 'footer_custom_post',
    'label'       => esc_html__('Select Footer Type', 'linoor'),
    'choices'     => linoor_post_query('footer'),
    'section'     => 'linoor_theme_footer',
    'priority'    => 10,
    'active_callback' => function () {
        if (true == post_type_exists('footer') && true == get_theme_mod('footer_custom')) {
            return true;
        } else {
            return false;
        }
    },
]);


Kirki::add_field($linoor_config_id, [
    'type'     => 'text',
    'settings' => 'footer_copytext',
    'label'    => esc_html__('Text Control', 'linoor'),
    'section'  => 'linoor_theme_footer',
    'default'  => esc_html__('&copy; All right reserved', 'linoor'),
    'priority' => 10,
    'sanitize_callback' => function ($input) {
        return wp_kses($input, 'linoor_allowed_tags');;
    },
    'active_callback' => function () {
        if (false == get_theme_mod('footer_custom')) {
            return true;
        }
    },
]);



/**
 * Service Sidebar Menu
 */


Kirki::add_section('linoor_theme_service_sidebar', array(
    'title'          => esc_html__('Service Sidebar Menu', 'linoor'),
    'description'    => esc_html__('Linoor Service Sidebar Options.', 'linoor'),
    'panel'          => 'linoor_theme_opt',
    'priority'       => 160,
    'active_callback' => function () {
        if (true == post_type_exists('service')) {
            return true;
        }
    },
));

Kirki::add_field($linoor_config_id, [
    'type'     => 'text',
    'settings' => 'linoor_sidebar_menu_title',
    'label'    => esc_html__('Menu Title', 'linoor'),
    'section'  => 'linoor_theme_service_sidebar',
    'default'  => esc_html__('All Services', 'linoor'),
    'priority' => 10,
    'sanitize_callback' => function ($input) {
        return wp_kses($input, 'linoor_allowed_tags');;
    },
]);


Kirki::add_field($linoor_config_id, [
    'type'     => 'select',
    'settings' => 'linoor_sidebar_menu_item',
    'label'    => esc_html__('Add Nav Menu', 'linoor'),
    'section'  => 'linoor_theme_service_sidebar',
    'priority' => 10,
    'choices'     => linoor_get_nav_menu(),
]);

/**
 * Service Sidebar Contact
 */


Kirki::add_section('linoor_theme_contact_sidebar', array(
    'title'          => esc_html__('Service Sidebar Contact', 'linoor'),
    'description'    => esc_html__('Linoor Service Sidebar Options.', 'linoor'),
    'panel'          => 'linoor_theme_opt',
    'priority'       => 160,
    'active_callback' => function () {
        if (true == post_type_exists('service')) {
            return true;
        }
    },
));

Kirki::add_field($linoor_config_id, [
    'type'     => 'text',
    'settings' => 'linoor_sidebar_contact_title',
    'label'    => esc_html__('Contact Title', 'linoor'),
    'section'  => 'linoor_theme_contact_sidebar',
    'default'  => esc_html__('Need Linoor Help?', 'linoor'),
    'priority' => 10,
    'sanitize_callback' => function ($input) {
        return wp_kses($input, 'linoor_allowed_tags');;
    },
]);

Kirki::add_field($linoor_config_id, [
    'type'     => 'textarea',
    'settings' => 'linoor_sidebar_contact_text',
    'label'    => esc_html__('Contact Text', 'linoor'),
    'section'  => 'linoor_theme_contact_sidebar',
    'default'  => esc_html__('Default Text', 'linoor'),
    'priority' => 10,
    'sanitize_callback' => function ($input) {
        return wp_kses($input, 'linoor_allowed_tags');;
    },
]);

Kirki::add_field($linoor_config_id, [
    'type'     => 'text',
    'settings' => 'linoor_sidebar_contact_number',
    'label'    => esc_html__('Contact Number', 'linoor'),
    'section'  => 'linoor_theme_contact_sidebar',
    'default'  => esc_html__('666 888 000', 'linoor'),
    'priority' => 10,
    'sanitize_callback' => function ($input) {
        return wp_kses($input, 'linoor_allowed_tags');;
    },
]);

Kirki::add_field($linoor_config_id, [
    'type'     => 'text',
    'settings' => 'linoor_sidebar_contact_number_link',
    'label'    => esc_html__('Contact Number Link', 'linoor'),
    'section'  => 'linoor_theme_contact_sidebar',
    'default'  => esc_html__('#', 'linoor'),
    'priority' => 10,
]);




/**
 * Service Call To Action
 */


Kirki::add_section('linoor_theme_service_cta', array(
    'title'          => esc_html__('Service Call to action', 'linoor'),
    'description'    => esc_html__('Service Details bottom call to action.', 'linoor'),
    'panel'          => 'linoor_theme_opt',
    'priority'       => 160,
    'active_callback' => function () {
        if (true == post_type_exists('service')) {
            return true;
        }
    },
));

Kirki::add_field($linoor_config_id, [
    'type'     => 'text',
    'settings' => 'linoor_theme_service_cta_title',
    'label'    => esc_html__('Add Title', 'linoor'),
    'section'  => 'linoor_theme_service_cta',
    'default'  => esc_html__('Default title', 'linoor'),
    'priority' => 10,
    'sanitize_callback' => function ($input) {
        return wp_kses($input, 'linoor_allowed_tags');;
    },
]);

Kirki::add_field($linoor_config_id, [
    'type'     => 'text',
    'settings' => 'linoor_theme_service_cta_btn_label',
    'label'    => esc_html__('Button Label', 'linoor'),
    'section'  => 'linoor_theme_service_cta',
    'default'  => esc_html__('button label', 'linoor'),
    'priority' => 10,
]);


Kirki::add_field($linoor_config_id, [
    'type'     => 'text',
    'settings' => 'linoor_theme_service_cta_btn_url',
    'label'    => esc_html__('Button URL', 'linoor'),
    'section'  => 'linoor_theme_service_cta',
    'default'  => esc_html__('#', 'linoor'),
    'priority' => 10,
]);



/**
 * Portfolio Archive Options
 */


Kirki::add_section('linoor_theme_portfolio_archive', array(
    'title'          => esc_html__('Portfolio Archive', 'linoor'),
    'panel'          => 'linoor_theme_opt',
    'priority'       => 160,
));

Kirki::add_field($linoor_config_id, [
    'type'        => 'slider',
    'settings'    => 'linoor_theme_portfolio_archive_post_count',
    'label'       => esc_html__('No. Of Post', 'linoor'),
    'section'  => 'linoor_theme_portfolio_archive',
    'default'     => 9,
    'choices'     => [
        'min'  => 1,
        'max'  => 15,
        'step' => 1,
    ],
    'active_callback' => function () {
        if (true == post_type_exists('portfolio')) {
            return true;
        }
    },
]);
