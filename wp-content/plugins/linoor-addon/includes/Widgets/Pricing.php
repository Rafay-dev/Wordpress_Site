<?php

namespace Layerdrops\Linoor\Widgets;


class Pricing extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'linoor-pricing';
    }

    public function get_title()
    {
        return __('Pricing', 'linoor-addon');
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
                ]
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Post Options', 'linoor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
                        'max' => 15,
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
                'options' => linoor_get_taxonoy('pricing_cat')
            ]
        );


        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <?php if ('layout_one' == $settings['layout_type']) : ?>
            <section class="pricing-one">
                <div class="auto-container">
                    <div class="row">
                        <?php echo do_shortcode('[linoor-pricing post_count="' . $settings['post_count']['size'] . '" select_category="' . $settings['select_category'] . '" ]'); ?>
                    </div><!-- /.row -->
                </div><!-- /.auto-container -->
            </section>
        <?php endif; ?>


<?php
    }

    protected function _content_template()
    {
    }
}
