<?php

namespace Layerdrops\Linoor\Widgets;


class Funfact extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'linoor-funfact';
    }

    public function get_title()
    {
        return __('Funfact', 'linoor-addon');
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
            'layout_type',
            [
                'label' => __('Select Layout', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'default' => 'layout_one',
                'options' => [
                    'layout_one' => __('Layout One', 'linoor-addon'),
                    'layout_two' => __('Layout Two', 'linoor-addon'),
                    'layout_three' => __('Layout Three', 'linoor-addon'),
                ]
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'linoor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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


        $funfact_box = new \Elementor\Repeater();
        $funfact_box->add_control(
            'title',
            [
                'label' => __('Count Number'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 123,
                'label_block' => true,
            ]
        );
        $funfact_box->add_control(
            'text',
            [
                'label' => __('Count Text'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Default Text', 'linoor-addon'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'funfact_boxes',
            [
                'label' => __('Funfact Boxes', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $funfact_box->get_controls(),
                'default' => [
                    [
                        'title' => 123,
                        'text' => __('Default Text', 'linoor-addon'),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <?php if ('layout_one' === $settings['layout_type']) : ?>
            <!-- Funfacts Section -->
            <section class="facts-section jarallax" data-jarallax data-speed="0.3" data-imgPosition="50% 80%">
                <img src="<?php echo esc_url($settings['background_image']['url']); ?>" alt="" class="jarallax-img">
                <div class="auto-container">
                    <div class="inner-container">

                        <!-- Fact Counter -->
                        <div class="fact-counter">
                            <div class="row clearfix">

                                <?php foreach ($settings['funfact_boxes'] as $funfact_box) : ?>

                                    <!--Column-->
                                    <div class="column counter-column col-lg-3 col-md-6 col-sm-12">
                                        <div class="inner">
                                            <div class="content">
                                                <div class="count-outer count-box">
                                                    <span class="count-text" data-speed="4000" data-stop="<?php echo esc_attr($funfact_box['title']); ?>">0</span>
                                                </div>
                                                <div class="counter-title"><?php echo esc_html($funfact_box['text']); ?></div>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; ?>

                            </div>
                        </div>

                    </div>
                </div>
            </section>
            <!-- End Funfacts Section -->
        <?php endif; ?>

        <?php if ('layout_two' === $settings['layout_type']) : ?>
            <!-- Funfacts Section -->
            <section class="facts-section alternate">
                <div class="auto-container">
                    <div class="inner-container">
                        <!-- Fact Counter -->
                        <div class="fact-counter">
                            <div class="row clearfix">
                                <?php foreach ($settings['funfact_boxes'] as $funfact_box) : ?>
                                    <!--Column-->
                                    <div class="column counter-column col-lg-3 col-md-6 col-sm-12">
                                        <div class="inner">
                                            <div class="content">
                                                <div class="count-outer count-box">
                                                    <span class="count-text" data-speed="4000" data-stop="<?php echo esc_attr($funfact_box['title']); ?>">0</span>
                                                </div>
                                                <div class="counter-title"><?php echo esc_html($funfact_box['text']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            <!-- End Funfacts Section -->
        <?php endif; ?>


<?php
    }

    protected function _content_template()
    {
    }
}
