<?php

namespace Layerdrops\Linoor\Widgets;


class FooterContact extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'footer-contact';
    }

    public function get_title()
    {
        return __('Footer Contact', 'linoor-addon');
    }

    public function get_icon()
    {
        return 'eicon-cogs';
    }

    public function get_categories()
    {
        return ['linoor-category'];
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'linoor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Add Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Explore', 'linoor-addon')
            ]
        );

        $info_list = new \Elementor\Repeater();

        $info_list->add_control(
            'icon',
            [
                'label' => __('Select Icon', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => linoor_get_fa_icons(),
                'label_block' => true,
            ]
        );
        $info_list->add_control(
            'text',
            [
                'label' => __('Add Text', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Contact Info', 'linoor-addon'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'info_list',
            [
                'label' => __('Info List', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $info_list->get_controls(),
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display(); ?>
        <div class="footer-widget info-widget">
            <div class="widget-content">
                <h6><?php echo esc_html($settings['title']); ?></h6>
                <ul class="contact-info m-0 list-unstyled">
                    <?php foreach ($settings['info_list'] as $list) : ?>
                        <li class="address">
                            <span class="icon <?php echo esc_attr($list['icon']); ?>"></span>
                            <?php echo wp_kses($list['text'], 'linoor_allowed_tags'); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
<?php
    }

    protected function _content_template()
    {
    }
}
