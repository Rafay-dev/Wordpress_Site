<?php

namespace Layerdrops\Linoor\Metaboxes;


class Pricing
{
    function __construct()
    {
        add_action('cmb2_admin_init', [$this, 'add_metabox']);
    }

    function add_metabox()
    {
        $prefix = 'linoor_';

        $general = new_cmb2_box(array(
            'id'           => $prefix . 'pricing_content',
            'title'        => __('Pricing Content', 'linoor-addon'),
            'object_types' => array('pricing'),
            'context'      => 'normal',
            'priority'     => 'default',
        ));

        $general->add_field(array(
            'name' => __('Pricing Icon', 'linoor-addon'),
            'id' => $prefix . 'pricing_icon',
            'type' => 'pw_select',
            'options' => linoor_get_fa_icons()
        ));

        $general->add_field(array(
            'name' => __('Currency Type', 'linoor-addon'),
            'id' => $prefix . 'pricing_currency',
            'type' => 'text',
        ));

        $general->add_field(array(
            'name' => __('Renewal Fee', 'linoor-addon'),
            'id' => $prefix . 'pricing_renewal_fee',
            'type' => 'text',
        ));

        $plan_options = $general->add_field(array(
            'name' => __('Plan Options', 'linoor-addon'),
            'id' => $prefix . 'plan_options',
            'type' => 'group',
        ));

        $general->add_group_field($plan_options, array(
            'name' => __('Feature Name', 'linoor-addon'),
            'id' => $prefix . 'feature_name',
            'type' => 'text',
        ));

        $general->add_group_field($plan_options, array(
            'name' => __('Is Available?', 'linoor-addon'),
            'id' => $prefix . 'feature_status',
            'type' => 'checkbox',
        ));


        $general->add_field(array(
            'name' => __('Btn Label', 'linoor-addon'),
            'id' => $prefix . 'pricing_btn_label',
            'type' => 'text',
        ));

        $general->add_field(array(
            'name' => __('Btn URL', 'linoor-addon'),
            'id' => $prefix . 'pricing_btn_url',
            'type' => 'text',
        ));
    }
}
