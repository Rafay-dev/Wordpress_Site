<?php

namespace Layerdrops\Linoor\Metaboxes;


class Service
{
    function __construct()
    {
        add_action('cmb2_admin_init', [$this, 'add_metabox']);
    }

    function add_metabox()
    {
        $prefix = 'linoor_';

        $general = new_cmb2_box(array(
            'id'           => $prefix . 'service_option',
            'title'        => __('Service Options', 'linoor-addon'),
            'object_types' => array('service'),
            'context'      => 'normal',
            'priority'     => 'default',
        ));


        $general->add_field(array(
            'name' => __('Select Icon', 'linoor-addon'),
            'id' => $prefix . 'select_service_icon',
            'type' => 'pw_select',
            'options' => linoor_get_fa_icons(),
        ));
    }
}
