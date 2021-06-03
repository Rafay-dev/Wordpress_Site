<?php

namespace Layerdrops\Linoor\Widgets;


class AboutProgress extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'linoor-about-progress';
    }

    public function get_title()
    {
        return __('About Progress', 'linoor-addon');
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
                'default' => __('Default Title', 'linoor-addon'),
                'label_block' => true,
            ]
        );


        $progress_lists = new \Elementor\Repeater();

        $progress_lists->add_control(
            'title',
            [
                'label' => __('Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('My Progress', 'linoor-addon'),
                'label_block' => true,
            ]
        );

        $progress_lists->add_control(
            'count',
            [
                'label' => __('Add Count', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['count'],
                'range' => [
                    'count' => [
                        'min' => 1,
                        'max' => 100,
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
            'progress_lists',
            [
                'label' => __('Progress Box', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $progress_lists->get_controls(),
                'default' => [
                    [
                        'title' => __('My Progress', 'linoor-addon'),
                        'count' => '70',
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display(); ?>

        <div class="about-me-counter">
            <div class="auto-container">
                <div class="row align-content-md-center">
                    <div class="col-md-6 col-lg-3 d-flex align-content-md-center">
                        <div class="sec-title">
                            <h2><?php echo wp_kses($settings['title'], 'linoor_allowed_tags'); ?></h2>
                        </div>
                    </div><!-- /.col-md-6 col-lg-3 -->
                    <?php foreach ($settings['progress_lists'] as $progress_list) : ?>
                        <div class="col-md-6 col-lg-3">
                            <div class="counter-block">
                                <div class="inner-box">
                                    <div class="graph-outer">
                                        <input type="text" class="dial" data-fgColor="#ffaa16" data-bgColor="none" data-width="139" data-height="140" data-linecap="normal" value="<?php echo esc_attr($progress_list['count']['size']); ?>" data-thickness="0.050">
                                        <div class="inner-text count-box"><span class="count-text" data-stop="<?php echo esc_attr($progress_list['count']['size']); ?>" data-speed="2000"></span><span class="sign">%</span></div>
                                    </div>
                                    <h4><?php echo wp_kses($progress_list['title'], 'linoor_allowed_tags'); ?></h4>
                                </div>
                            </div>
                        </div><!-- /.col-md-6 -->
                    <?php endforeach; ?>
                </div><!-- /.row -->
            </div><!-- /.auto-container -->
        </div><!-- /.about-me-counter -->

<?php
    }

    protected function _content_template()
    {
    }
}
