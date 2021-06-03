<?php

namespace Layerdrops\Linoor\Widgets;


class FooterSubscribe extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'footer-subscribe';
    }

    public function get_title()
    {
        return __('Footer Subscribe', 'linoor-addon');
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
            'layout_type',
            [
                'label' => __('Select Layout', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'default' => 'layout_one',
                'options' => [
                    'layout_one' => __('Layout One', 'linoor-addon'),
                    'layout_two' => __('Layout Two', 'linoor-addon'),
                ]
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Widget Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Explore', 'linoor-addon')
            ]
        );

        $this->add_control(
            'paragraph',
            [
                'label' => __('Paragraph Text', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Some Text', 'linoor-addon'),
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'layout_type',
                            'operator' => '==',
                            'value' => 'layout_one'
                        ]
                    ]
                ]
            ]
        );
        $this->add_control(
            'mailchimp_url',
            [
                'label' => __('Add Mailchimp URL', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '#',
            ]
        );

        $this->add_control(
            'mc_button_label',
            [
                'label' => __('Submit Button Label', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Register now', 'linoor-addon'),
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'layout_type',
                            'operator' => '==',
                            'value' => 'layout_two'
                        ]
                    ]
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {


        $settings = $this->get_settings_for_display(); ?>
        <?php if ('layout_one' == $settings['layout_type']) : ?>
            <div class="footer-widget newsletter-widget">
                <div class="widget-content">
                    <h6><?php echo esc_html($settings['title']); ?></h6>
                    <div class="newsletter-form">
                        <form class="mc-form" data-url="<?php echo esc_html($settings['mailchimp_url']); ?>">
                            <div class="form-group clearfix">
                                <input type="email" name="EMAIL" value="" placeholder="<?php esc_html_e('Email Address', 'linoor-addon'); ?>">
                                <button type="submit" class="theme-btn"><span class="fa fa-envelope"></span></button>
                            </div>
                        </form>
                        <div class="mc-form__response"></div>
                    </div>
                    <div class="text"><?php echo esc_html($settings['paragraph']); ?></div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ('layout_two' == $settings['layout_type']) : ?>
            <div class="footer-widget newsletter-widget-two">
                <div class="widget-content">
                    <h6><?php echo esc_html($settings['title']); ?></h6>
                    <div class="newsletter-form-two">
                        <form class="mc-form" data-url="<?php echo esc_html($settings['mailchimp_url']); ?>">
                            <div class="form-group clearfix">
                                <input type="email" name="EMAIL" value="" placeholder="<?php esc_html_e('Email Address', 'linoor-addon'); ?>">
                                <button type="submit" class="theme-btn btn-style-one"><i class="btn-curve"></i><span class="btn-title"><?php echo esc_html($settings['mc_button_label']); ?></span></button>
                            </div>
                        </form>
                        <div class="mc-form__response"></div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
<?php
    }

    protected function _content_template()
    {
    }
}
