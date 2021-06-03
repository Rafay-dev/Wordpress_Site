<?php

namespace Layerdrops\Linoor\Metaboxes;


class Page
{
    function __construct()
    {
        add_action('cmb2_admin_init', [$this, 'page_metabox']);
    }

    function page_metabox()
    {
        $prefix = 'linoor_';

        $general = new_cmb2_box(array(
            'id'           => $prefix . 'page_option',
            'title'        => __('General Options', 'linoor-addon'),
            'object_types' => array('page'),
            'context'      => 'normal',
            'priority'     => 'default',
        ));

        $general->add_field(array(
            'name' => __('Enable Custom Header', 'linoor-addon'),
            'id' => $prefix . 'custom_header_status',
            'type' => 'radio',
            'options' => array(
                'on' => __('On', 'linoor-addon'),
                'off'   => __('Off', 'linoor-addon'),
            ),
        ));


        $general->add_field(array(
            'name' => __('Select Custom Header', 'linoor-addon'),
            'id' => $prefix . 'select_custom_header',
            'type' => 'pw_select',
            'options' => linoor_post_query('header'),
            'attributes' => array(
                'data-conditional-id' => $prefix . 'custom_header_status',
                'data-conditional-value' => 'on',
            ),
        ));

        $general->add_field(array(
            'name' => __('Enable Custom Footer', 'linoor-addon'),
            'id' => $prefix . 'custom_footer_status',
            'type' => 'radio',
            'options' => array(
                'on' => __('On', 'linoor-addon'),
                'off'   => __('Off', 'linoor-addon'),
            ),
        ));


        $general->add_field(array(
            'name' => __('Select Custom Footer', 'linoor-addon'),
            'id' => $prefix . 'select_custom_footer',
            'type' => 'pw_select',
            'options' => linoor_post_query('footer'),
            'attributes' => array(
                'data-conditional-id' => $prefix . 'custom_footer_status',
                'data-conditional-value' => 'on',
            ),
        ));


        $general->add_field(array(
            'name' => __('Show Page Banner', 'linoor-addon'),
            'id' => $prefix . 'show_page_banner',
            'type' => 'radio',
            'default' => 'on',
            'options' => array(
                'on' => __('On', 'linoor-addon'),
                'off' => __('Off', 'linoor-addon'),
            ),
        ));

        $general->add_field(array(
            'name' => __('Enable BreadCrumb', 'linoor-addon'),
            'id' => $prefix . 'show_page_breadcrumb',
            'type' => 'radio',
            'default' => 'on',
            'options' => array(
                'on' => __('On', 'linoor-addon'),
                'off' => __('Off', 'linoor-addon'),
            ),
            'attributes' => array(
                'data-conditional-id' => $prefix . 'show_page_banner',
                'data-conditional-value' => 'on',
            ),
        ));

        $general->add_field(array(
            'name' => __('Header Title', 'linoor-addon'),
            'id' => $prefix . 'set_header_title',
            'type' => 'text',
            'attributes' => array(
                'data-conditional-id' => $prefix . 'show_page_banner',
                'data-conditional-value' => 'on',
            ),
        ));

        $general->add_field(array(
            'name' => __('Header Image', 'linoor-addon'),
            'id' => $prefix . 'set_header_image',
            'type' => 'file',
            'attributes' => array(
                'data-conditional-id' => $prefix . 'show_page_banner',
                'data-conditional-value' => 'on',
            ),
        ));

        $color_options = new_cmb2_box(array(
            'id'           => $prefix . 'page_color_option',
            'title'        => __('Color Options', 'linoor-addon'),
            'object_types' => array('page'),
            'context'      => 'normal',
            'priority'     => 'default',
        ));


        $color_options->add_field(array(
            'name' => __('Base Color', 'linoor-addon'),
            'id' => $prefix . 'base_color',
            'type'    => 'colorpicker',
            'default' => sanitize_hex_color('#ffaa17'),
        ));
        $color_options->add_field(array(
            'name' => __('black Color', 'linoor-addon'),
            'id' => $prefix . 'black_color',
            'type'    => 'colorpicker',
            'default' => sanitize_hex_color('#222429'),
        ));
    }
}
