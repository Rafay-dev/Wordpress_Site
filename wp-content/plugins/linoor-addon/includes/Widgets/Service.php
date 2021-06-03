<?php

namespace Layerdrops\Linoor\Widgets;


class Service extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'linoor-service';
    }

    public function get_title()
    {
        return __('Service', 'linoor-addon');
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
            'title',
            [
                'label' => __('Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Title', 'linoor-addon'),
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add paragraph text', 'linoor-addon'),
            ]
        );

        $this->add_control(
            'post_count',
            [
                'label' => __('Number Of Posts', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['count'],
                'range' => [
                    'count' => [
                        'min' => 0,
                        'max' => 11,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'count',
                    'size' => 6,
                ],
            ]
        );

        $this->add_control(
            'select_category',
            [
                'label' => __('Post Category', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => linoor_get_taxonoy('service_cat')
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <?php if ('layout_one' === $settings['layout_type']) : ?>
            <!--Services Section-->
            <section class="services-section">
                <div class="auto-container">
                    <div class="row clearfix">
                        <!--Title Block-->
                        <div class="title-block col-xl-6 col-lg-12 col-md-12 col-sm-12">
                            <div class="inner">
                                <?php if (!empty($settings['title'])) : ?>
                                    <div class="sec-title">
                                        <h2><?php echo wp_kses($settings['title'], 'linoor_allowed_tags'); ?></h2>
                                        <div class="lower-text"><?php echo wp_kses($settings['sub_title'], 'linoor_allowed_tags'); ?></div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <?php echo do_shortcode('[linoor-service post_count="' . $settings['post_count']['size'] . '" select_category="' . $settings['select_category'] . '" ]'); ?>

                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php if ('layout_two' === $settings['layout_type']) : ?>

            <!--Services Section-->
            <section class="services-section-two">
                <div class="auto-container">
                    <?php if (!empty($settings['title'])) : ?>
                        <div class="sec-title">
                            <!--Title Block-->
                            <div class="row clearfix">
                                <div class="column col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                    <h2><?php echo wp_kses($settings['title'], 'linoor_allowed_tags'); ?></h2>
                                </div>
                                <div class="column col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                    <div class="lower-text"><?php echo wp_kses($settings['sub_title'], 'linoor_allowed_tags'); ?></div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="services">
                        <div class="row clearfix">
                            <?php echo do_shortcode('[linoor-service-two post_count="' . $settings['post_count']['size'] . '" select_category="' . $settings['select_category'] . '" ]'); ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php if ('layout_three' === $settings['layout_type']) : ?>
            <!--Services Section-->
            <section class="services-section-three">
                <div class="auto-container">
                    <?php if (!empty($settings['title'])) : ?>
                        <div class="sec-title centered">
                            <h2><?php echo wp_kses($settings['title'], 'linoor_allowed_tags'); ?></h2>
                        </div>
                    <?php endif; ?>

                    <div class="services">
                        <div class="row clearfix">
                            <?php echo do_shortcode('[linoor-service-two post_count="' . $settings['post_count']['size'] . '" select_category="' . $settings['select_category'] . '" ]'); ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

<?php
    }

    protected function _content_template()
    {
    }
}
