<?php

namespace Layerdrops\Linoor\Widgets;


class Progress extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'linoor-progress';
    }

    public function get_title()
    {
        return __('Progress', 'linoor-addon');
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
            'image',
            [
                'label' => __('Add Image', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [],
            ]
        );

        $progress_lists = new \Elementor\Repeater();

        $progress_lists->add_control(
            'title',
            [
                'label' => __('Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
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
        <?php if ('layout_one' === $settings['layout_type']) : ?>
            <div class="inner">
                <?php if (!empty($settings['title'])) : ?>
                    <div class="sec-title">
                        <h2><?php echo wp_kses($settings['title'], 'linoor_allowed_tags'); ?></h2>
                    </div>
                <?php endif; ?>
                <div class="featured-block clearfix">
                    <div class="image"><img src="<?php echo esc_attr($settings['image']['url']); ?>" alt=""></div>
                    <div class="text"><?php echo wp_kses($settings['sub_title'], 'linoor_allowed_tags'); ?></div>
                </div>
                <?php foreach ($settings['progress_lists'] as $progress_list) : ?>
                    <div class="progress-box">
                        <div class="bar-title"><?php echo wp_kses($progress_list['title'], 'linoor_allowed_tags'); ?></div>
                        <div class="bar">
                            <div class="bar-inner count-bar" data-percent="<?php echo esc_attr($progress_list['count']['size']); ?>%">
                                <div class="count-box">
                                    <span class="count-text" data-stop="<?php echo esc_attr($progress_list['count']['size']); ?>" data-speed="1500">0</span>%
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        <?php endif; ?>


        <?php if ('layout_two' === $settings['layout_type']) : ?>
            <section class="feature-eight">
                <div class="auto-container">
                    <div class="row">
                        <div class="col-md-12 col-lg-5">
                            <div class="feature-eight__image">
                                <img src="<?php echo esc_attr($settings['image']['url']); ?>" alt="">
                            </div><!-- /.feature-eight__image -->
                        </div><!-- /.col-md-12 -->
                        <div class="col-md-12 col-lg-7">
                            <div class="feature-eight__content">
                                <div class="sec-title">
                                    <h2><?php echo wp_kses($settings['title'], 'linoor_allowed_tags'); ?></h2>
                                </div>
                                <p class="feature-eight__text"><?php echo wp_kses($settings['sub_title'], 'linoor_allowed_tags'); ?></p><!-- /.feature-eight__text -->
                                <?php foreach ($settings['progress_lists'] as $progress_list) : ?>
                                    <div class="progress-box">
                                        <div class="bar-title"><?php echo wp_kses($progress_list['title'], 'linoor_allowed_tags'); ?></div>
                                        <div class="bar">
                                            <div class="bar-inner count-bar counted" data-percent="<?php echo esc_attr($progress_list['count']['size']); ?>%" style="width: <?php echo esc_attr($progress_list['count']['size']); ?>%;">
                                                <div class="count-box counted">
                                                    <span class="count-text" data-stop="<?php echo esc_attr($progress_list['count']['size']); ?>" data-speed="1500"><?php echo esc_attr($progress_list['count']['size']); ?></span>%
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div><!-- /.feature-eight__content -->
                        </div><!-- /.col-md-12 -->
                    </div><!-- /.row -->
                </div><!-- /.auto-container -->
            </section><!-- /.feature-eight -->
        <?php endif; ?>
<?php
    }

    protected function _content_template()
    {
    }
}
