<?php

namespace Layerdrops\Linoor\Metaboxes;


class Team
{
    function __construct()
    {
        add_action('cmb2_admin_init', [$this, 'add_metabox']);
    }

    function add_metabox()
    {
        $prefix = 'linoor_';

        $general = new_cmb2_box(array(
            'id'           => $prefix . 'team_option',
            'title'        => __('Team Options', 'linoor-addon'),
            'object_types' => array('team'),
            'context'      => 'normal',
            'priority'     => 'default',
        ));

        $general->add_field(array(
            'name' => __('Designation', 'linoor-addon'),
            'id' => $prefix . 'designation',
            'type' => 'text',
        ));

        $team_social = $general->add_field(array(
            'name' => __('Social Profiles', 'linoor-addon'),
            'id' => $prefix . 'team_social',
            'type' => 'group',
        ));

        $general->add_group_field($team_social, array(
            'name' => __('icon', 'linoor-addon'),
            'id' => $prefix . 'icon',
            'type' => 'pw_select',
            'default' => 'fa-facebook-f',
            'options' => linoor_get_fa_icons(),
        ));

        $general->add_group_field($team_social, array(
            'name' => __('link', 'linoor-addon'),
            'id' => $prefix . 'link',
            'type' => 'text',
        ));
    }
}
