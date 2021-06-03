<?php

namespace Layerdrops\Linoor\Metaboxes;


class Portfolio
{
    function __construct()
    {
        add_action('cmb2_admin_init', [$this, 'add_metabox']);
    }

    function add_metabox()
    {
        $prefix = 'linoor_';

        $general = new_cmb2_box(array(
            'id'           => $prefix . 'portfolio_option',
            'title'        => __('Portfolio Options', 'linoor-addon'),
            'object_types' => array('portfolio'),
            'context'      => 'normal',
            'priority'     => 'default',
        ));


        $general->add_field(array(
            'name' => __('Single Layout', 'linoor-addon'),
            'id' => $prefix . 'portfolio_single_layout',
            'type' => 'pw_select',
            'default'          => 'layout_one',
            'options'          => array(
                'layout_one' => __('Layout One', 'linoor-addon'),
                'layout_two'   => __('Layout Two', 'linoor-addon'),
                'layout_three'   => __('Layout Three', 'linoor-addon'),
            ),
        ));

        $general->add_field(array(
            'name' => __('Client Name', 'linoor-addon'),
            'id' => $prefix . 'portfolio_client',
            'type' => 'text',
        ));
        $general->add_field(array(
            'name' => __('Complete Date', 'linoor-addon'),
            'id' => $prefix . 'portfolio_date',
            'type' => 'text',
        ));
        $general->add_field(array(
            'name' => __('Preview Link', 'linoor-addon'),
            'id' => $prefix . 'portfolio_preview_link',
            'type' => 'text',
        ));
        $general->add_field(array(
            'name' => __('Image Gallery', 'linoor-addon'),
            'id' => $prefix . 'portfolio_gallery',
            'type' => 'file_list',
        ));


        $work_demands = $general->add_field(array(
            'name' => __('Work Demands', 'linoor-addon'),
            'id' => $prefix . 'work_demands',
            'type' => 'group',
        ));

        $general->add_group_field($work_demands, array(
            'name' => __('Demands Name', 'linoor-addon'),
            'id' => $prefix . 'demands_name',
            'type' => 'text',
        ));

        $feature_boxes = $general->add_field(array(
            'name' => __('Features Boxes', 'linoor-addon'),
            'id' => $prefix . 'feature_boxes',
            'type' => 'group',
        ));


        $general->add_group_field($feature_boxes, array(
            'name' => __('Feature Image', 'linoor-addon'),
            'id' => $prefix . 'feature_image',
            'type' => 'file',
            'options' => array(
                'url' => false, // Hide the text input for the url
            ),
        ));

        $general->add_group_field($feature_boxes, array(
            'name' => __('Feature Title', 'linoor-addon'),
            'id' => $prefix . 'feature_title',
            'type' => 'text',
        ));

        $general->add_group_field($feature_boxes, array(
            'name' => __('Feature Text', 'linoor-addon'),
            'id' => $prefix . 'feature_text',
            'type' => 'textarea',
        ));

        $general->add_field(array(
            'name' => __('Video Thumbnail', 'linoor-addon'),
            'id' => $prefix . 'portfolio_video_image',
            'type' => 'file',
            'options' => array(
                'url' => false, // Hide the text input for the url
            ),
        ));

        $general->add_field(array(
            'name' => __('Video Link', 'linoor-addon'),
            'id' => $prefix . 'portfolio_video_link',
            'type' => 'text',
        ));


        $summery = $general->add_field(array(
            'name' => __('Work Summery', 'linoor-addon'),
            'id' => $prefix . 'summery',
            'type' => 'group',
        ));

        $general->add_group_field($summery, array(
            'name' => __('Summery Title', 'linoor-addon'),
            'id' => $prefix . 'summery_title',
            'type' => 'text',
        ));
        $general->add_group_field($summery, array(
            'name' => __('Summery Text', 'linoor-addon'),
            'id' => $prefix . 'summery_text',
            'type' => 'textarea',
        ));
    }
}
