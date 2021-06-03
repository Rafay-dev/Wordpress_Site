<?php

namespace Layerdrops\Linoor\Metaboxes;


class Testimonial
{
    function __construct()
    {
        add_action('cmb2_admin_init', [$this, 'add_metabox']);
    }

    function add_metabox()
    {
        $prefix = 'linoor_';

        $general = new_cmb2_box(array(
            'id'           => $prefix . 'testimonial_option',
            'title'        => __('Testimonial Options', 'linoor-addon'),
            'object_types' => array('testimonial'),
            'context'      => 'normal',
            'priority'     => 'default',
        ));

        $general->add_field(array(
            'name' => __('Content', 'linoor-addon'),
            'id' => $prefix . 'content',
            'type' => 'textarea',
        ));
        $general->add_field(array(
            'name' => __('Designation', 'linoor-addon'),
            'id' => $prefix . 'designation',
            'type' => 'text',
        ));
    }
}
