<?php

namespace Layerdrops\Linoor\Widgets;


class FooterCopyright extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'footer-copyright';
    }

    public function get_title()
    {
        return __('Footer CopyRight', 'linoor-addon');
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
                'label' => __('Add Text', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('&copy; Layerdrops', 'linoor-addon')
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display(); ?>
        <div class="footer-bottom">
            <div class="auto-container">
                <div class="inner clearfix">
                    <div class="copyright"><?php echo wp_kses($settings['title'], 'linoor_allowed_tags'); ?></div>
                </div>
            </div>
        </div>
<?php
    }

    protected function _content_template()
    {
    }
}
