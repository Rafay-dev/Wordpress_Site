<?php

namespace Layerdrops\Linoor\Widgets;


class ParallaxTwo extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'linoor-parallax-two';
    }

    public function get_title()
    {
        return __('Parallax Two', 'linoor-addon');
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
            'layout_section',
            [
                'label' => __('Content', 'linoor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Add Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Title', 'linoor-addon'),
            ]
        );

        $this->add_control(
            'button_label',
            [
                'label' => __('Button Text', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Discover More', 'linoor-addon'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'button_url',
            [
                'label' => __('Button Url', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('#', 'linoor-addon'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'show_label' => false,
            ]
        );

        $this->add_control(
            'background_image',
            [
                'label' => __('Background Image', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <section class="parallax-block jarallax" data-jarallax data-speed="0.3" data-imgPosition="50% -100%">
            <img src="<?php echo esc_url($settings['background_image']['url']); ?>" alt="" class="jarallax-img">
            <div class="container">
                <div class="parallax-block__content">
                    <h3><?php echo wp_kses($settings['title'], 'linoor_allowed_tags'); ?></h3>
                    <a class="theme-btn btn-style-one" href="<?php echo esc_html($settings['button_url']['url']); ?>">
                        <i class="btn-curve"></i>
                        <span class="btn-title"><?php echo esc_html($settings['button_label']); ?></span>
                    </a>
                </div><!-- /.parallax-block__content -->
            </div><!-- /.container -->
        </section><!-- /.parallax-block -->
<?php
    }

    protected function _content_template()
    {
    }
}
