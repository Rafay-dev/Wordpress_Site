<?php

namespace Layerdrops\Linoor\Widgets;


class Parallax extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'linoor-parallax';
    }

    public function get_title()
    {
        return __('Parallax', 'linoor-addon');
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
                'label' => __('Layout', 'linoor-addon'),
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
            'icon',
            [
                'label' => __('Add Icon', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => linoor_get_fa_icons(),
            ]
        );
        $this->add_control(
            'background_image',
            [
                'label' => __('Background Image', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );


        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <!-- Parallax Section -->
        <section class="parallax-section jarallax" data-jarallax data-speed="0.3" data-imgPosition="50% 80%">
            <img src="<?php echo esc_url($settings['background_image']['url']); ?>" alt="" class="jarallax-img">
            <div class="auto-container">
                <div class="content-box">
                    <div class="icon-box"><span class="<?php echo esc_attr($settings['icon']); ?>"></span></div>
                    <h2><?php echo wp_kses($settings['title'], 'linoor_allowed_tags'); ?></h2>
                </div>
            </div>
        </section>
        <!-- End Funfacts Section -->
<?php
    }

    protected function _content_template()
    {
    }
}
