<?php

namespace Layerdrops\Linoor\Widgets;


class Featured extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'linoor-featured';
    }

    public function get_title()
    {
        return __('Featured', 'linoor-addon');
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
                    'layout_four' => __('Layout Four', 'linoor-addon'),
                    'layout_five' => __('Layout Five', 'linoor-addon'),
                    'layout_six' => __('Layout Six', 'linoor-addon'),
                    'layout_seven' => __('Layout Seven', 'linoor-addon'),
                ]
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'linoor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'layout_type' => 'layout_one'
                ]
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Section Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Awesome title', 'linoor-addon'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'sub_text',
            [
                'label' => __('Section Text', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Default Text', 'linoor-addon'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'image',
            [
                'label' => __('Left Image', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $feature_box = new \Elementor\Repeater();
        $feature_box->add_control(
            'title',
            [
                'label' => __('Box Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Awesome title', 'linoor-addon'),
                'label_block' => true,
            ]
        );
        $feature_box->add_control(
            'text',
            [
                'label' => __('Box Text', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Default Text', 'linoor-addon'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'feature_boxes',
            [
                'label' => __('Funfact Boxes', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $feature_box->get_controls(),
                'default' => [
                    [
                        'title' => __('Awesome title', 'linoor-addon'),
                        'text' => __('Default Text', 'linoor-addon'),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'layout_two_content_section',
            [
                'label' => __('Content', 'linoor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'layout_type' => 'layout_two'
                ]
            ]
        );

        $this->add_control(
            'layout_two_title',
            [
                'label' => __('Section Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Awesome title', 'linoor-addon'),
                'label_block' => true,
            ]
        );

        $layout_two_feature_box = new \Elementor\Repeater();
        $layout_two_feature_box->add_control(
            'title',
            [
                'label' => __('Box Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Awesome title', 'linoor-addon'),
                'label_block' => true,
            ]
        );
        $layout_two_feature_box->add_control(
            'url',
            [
                'label' => __('Box Link', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('#', 'linoor-addon'),
                'label_block' => true,
            ]
        );
        $layout_two_feature_box->add_control(
            'image',
            [
                'label' => __('Box Image', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'layout_two_feature_boxes',
            [
                'label' => __('Feature Boxes', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $layout_two_feature_box->get_controls(),
                'default' => [
                    [
                        'title' => __('Awesome title', 'linoor-addon'),
                    ],
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'layout_three_content_section',
            [
                'label' => __('Content', 'linoor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'layout_type' => 'layout_three'
                ]
            ]
        );


        $this->add_control(
            'layout_three_title',
            [
                'label' => __('Section Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __('Default Title', 'linoor-addon'),
            ]
        );

        $layout_three_feature_box = new \Elementor\Repeater();
        $layout_three_feature_box->add_control(
            'title',
            [
                'label' => __('Box Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Awesome title', 'linoor-addon'),
                'label_block' => true,
            ]
        );
        $layout_three_feature_box->add_control(
            'text',
            [
                'label' => __('Box Text', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Default Text', 'linoor-addon'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'layout_three_feature_boxes',
            [
                'label' => __('Feature Boxes', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $layout_three_feature_box->get_controls(),
                'default' => [
                    [
                        'title' => __('Awesome title', 'linoor-addon'),
                    ],
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'layout_three_image_section',
            [
                'label' => __('Images', 'linoor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'layout_type' => 'layout_three'
                ]
            ]
        );

        $this->add_control(
            'layout_three_image',
            [
                'label' => __('Select Image', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],

            ]
        );


        $this->add_control(
            'layout_three_image_caption',
            [
                'label' => __('Select Image', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __('Default Caption', 'linoor-addon'),
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'layout_four_content_section',
            [
                'label' => __('Content', 'linoor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'layout_type' => 'layout_four'
                ]
            ]
        );

        $this->add_control(
            'layout_four_title',
            [
                'label' => __('Section Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __('Default Title', 'linoor-addon'),
            ]
        );

        $layout_four_tab_box = new \Elementor\Repeater();

        $layout_four_tab_box->add_control(
            'status',
            [
                'label' => __('Is Active?', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'linoor-addon'),
                'label_off' => __('No', 'linoor-addon'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $layout_four_tab_box->add_control(
            'title',
            [
                'label' => __('Tab Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Awesome title', 'linoor-addon'),
                'label_block' => true,
            ]
        );
        $layout_four_tab_box->add_control(
            'content',
            [
                'label' => __('Box Content', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Default Text', 'linoor-addon'),
                'label_block' => true,
            ]
        );
        $layout_four_tab_box->add_control(
            'check_list',
            [
                'label' => __('Box Checklist', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'description' => __('Each new line will become a checklist item', 'linoor-addon'),
                'label_block' => true,
            ]
        );
        $layout_four_tab_box->add_control(
            'image',
            [
                'label' => __('Tab Image', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'layout_four_tab_boxes',
            [
                'label' => __('Feature Boxes', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $layout_four_tab_box->get_controls(),
                'default' => [
                    [
                        'title' => __('Awesome title', 'linoor-addon'),
                    ],
                ],
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'layout_five_content_section',
            [
                'label' => __('Content', 'linoor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'layout_type' => 'layout_five'
                ]
            ]
        );


        $this->add_control(
            'layout_five_title',
            [
                'label' => __('Section Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __('Default Title', 'linoor-addon'),
            ]
        );

        $this->add_control(
            'layout_five_text',
            [
                'label' => __('Section Text', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __('Default Text', 'linoor-addon'),
            ]
        );


        $layout_five_progress_box = new \Elementor\Repeater();

        $layout_five_progress_box->add_control(
            'title',
            [
                'label' => __('Progress Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Awesome title', 'linoor-addon'),
                'label_block' => true,
            ]
        );

        $layout_five_progress_box->add_control(
            'progress_count',
            [
                'label' => __('Progerss Percent', 'linoor-addon'),
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
                    'size' => 60,
                ],
            ]
        );

        $this->add_control(
            'layout_five_progress_boxes',
            [
                'label' => __('Feature Boxes', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $layout_five_progress_box->get_controls(),
                'default' => [
                    [
                        'title' => __('Awesome title', 'linoor-addon'),
                    ],
                ],
            ]
        );


        $this->end_controls_section();



        $this->start_controls_section(
            'layout_five_image_section',
            [
                'label' => __('Images', 'linoor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'layout_type' => 'layout_five'
                ]
            ]
        );

        $this->add_control(
            'layout_five_image',
            [
                'label' => __('Select Image', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],

            ]
        );


        $this->add_control(
            'layout_five_image_caption',
            [
                'label' => __('Select Image', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __('Default Caption', 'linoor-addon'),
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'layout_six_content_section',
            [
                'label' => __('Content', 'linoor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'layout_type' => 'layout_six'
                ]
            ]
        );


        $this->add_control(
            'layout_six_title',
            [
                'label' => __('Section Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __('Default Title', 'linoor-addon'),
            ]
        );

        $this->add_control(
            'layout_six_text',
            [
                'label' => __('Section Text', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __('Default Text', 'linoor-addon'),
            ]
        );
        $this->add_control(
            'layout_six_check_list',
            [
                'label' => __('Checklist', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'description' => __('Each new line will become a checklist item', 'linoor-addon'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'layout_six_image',
            [
                'label' => __('Select Image', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],

            ]
        );


        $this->add_control(
            'layout_six_image_caption',
            [
                'label' => __('Image Caption', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __('Default Caption', 'linoor-addon'),
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'layout_seven_content_section',
            [
                'label' => __('Content', 'linoor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'layout_type' => 'layout_seven'
                ]
            ]
        );


        $this->add_control(
            'layout_seven_title',
            [
                'label' => __('Section Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __('Default Title', 'linoor-addon'),
            ]
        );

        $layout_seven_post = new \Elementor\Repeater();

        $layout_seven_post->add_control(
            'image',
            [
                'label' => __('Select Image', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],

            ]
        );

        $layout_seven_post->add_control(
            'title',
            [
                'label' => __('Post Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __('Default Title', 'linoor-addon'),
            ]
        );

        $layout_seven_post->add_control(
            'url',
            [
                'label' => __('Post URL', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __('Default Title', 'linoor-addon'),
            ]
        );

        $layout_seven_post->add_control(
            'text',
            [
                'label' => __('Post Text', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __('Default Text', 'linoor-addon'),
            ]
        );


        $this->add_control(
            'layout_seven_posts',
            [
                'label' => __('Feature Posts', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $layout_seven_post->get_controls(),
                'default' => [
                    [
                        'title' => __('Awesome title', 'linoor-addon'),
                    ],
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <?php if ('layout_one' === $settings['layout_type']) : ?>
            <!--Featured Section-->
            <section class="featured-section">
                <div class="auto-container">
                    <div class="row clearfix">
                        <!--Left Column-->
                        <div class="left-col col-lg-6 col-md-12 col-sm-12">
                            <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <div class="image-box"><img src="<?php echo esc_attr($settings['image']['url']); ?>" alt=""></div>
                            </div>
                        </div>
                        <!--Right Column-->
                        <div class="right-col col-lg-6 col-md-12 col-sm-12">
                            <div class="inner">
                                <?php if (!empty($settings['title']) || !empty($settings['sub_text'])) : ?>
                                    <div class="sec-title">
                                        <h2><?php echo wp_kses($settings['title'], 'linoor_allowed_tags'); ?></h2>
                                        <div class="lower-text"><?php echo wp_kses($settings['sub_text'], 'linoor_allowed_tags'); ?></div>
                                    </div>
                                <?php endif; ?>
                                <div class="features">
                                    <div class="row clearfix">
                                        <?php foreach ($settings['feature_boxes'] as $feature_box) : ?>
                                            <div class="feature col-md-6 col-sm-12">
                                                <div class="inner-box">
                                                    <h6><?php echo esc_html($feature_box['title']); ?></h6>
                                                    <div class="text"><?php echo esc_html($feature_box['text']); ?></div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php if ('layout_two' === $settings['layout_type']) : ?>
            <!--Discover Section-->
            <section class="discover-section">
                <div class="auto-container">
                    <?php if (!empty($settings['layout_two_title'])) : ?>
                        <div class="sec-title centered">
                            <h2><?php echo wp_kses($settings['layout_two_title'], 'linoor_allowed_tags'); ?></h2>
                        </div>
                    <?php endif; ?>
                    <div class="row clearfix">
                        <?php foreach ($settings['layout_two_feature_boxes'] as $layout_two_feature_box) : ?>
                            <!--Discover Block-->
                            <div class="discover-block col-lg-6 col-md-12 col-sm-12">
                                <div class="inner-box">
                                    <div class="image-box"><img src="<?php echo esc_attr($layout_two_feature_box['image']['url']); ?>" alt=""></div>
                                    <div class="cap-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                        <div class="cap-inner">
                                            <h5><?php echo wp_kses($layout_two_feature_box['title'], 'linoor_allowed_tags'); ?></h5>
                                            <div class="more-link"><a href="<?php echo esc_url($layout_two_feature_box['url']); ?>"><span class="fa fa-angle-right"></span></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </section>

        <?php endif; ?>

        <?php if ('layout_three' === $settings['layout_type']) : ?>
            <!--Features Section-->
            <section class="features-section-two">
                <div class="auto-container">
                    <div class="content-container">
                        <div class="row clearfix">
                            <!--Left Column-->
                            <div class="left-col col-lg-5 col-md-12 col-sm-12">
                                <div class="inner">
                                    <?php if (!empty($settings['layout_three_title'])) : ?>
                                        <div class="sec-title">
                                            <h2><?php echo wp_kses($settings['layout_three_title'], 'linoor_allowed_tags'); ?></h2>
                                        </div>
                                    <?php endif; ?>
                                    <div class="features">
                                        <?php foreach ($settings['layout_three_feature_boxes'] as $layout_three_feature_box) : ?>
                                            <div class="feature">
                                                <div class="count"><span></span></div>
                                                <h5><?php echo esc_html($layout_three_feature_box['title']); ?></h5>
                                                <div class="sub-text"><?php echo esc_html($layout_three_feature_box['text']); ?></div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <!--Right Column-->
                            <div class="right-col col-lg-7 col-md-12 col-sm-12">
                                <div class="inner">
                                    <div class="image-box wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                                        <img src="<?php echo esc_attr($settings['layout_three_image']['url']); ?>" alt="">
                                        <div class="cap-box">
                                            <div class="cap-inner">
                                                <h5><?php echo wp_kses($settings['layout_three_image_caption'], 'linoor_allowed_tags'); ?></h5>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php endif; ?>


        <?php if ('layout_four' === $settings['layout_type']) : ?>

            <!-- We Work Section -->
            <section class="we-work-section">
                <div class="auto-container">
                    <?php if (!empty($settings['layout_four_title'])) : ?>
                        <div class="sec-title centered">
                            <h2><?php echo wp_kses($settings['layout_four_title'], 'linoor_allowed_tags'); ?></h2>
                        </div>
                    <?php endif; ?>
                    <!--Work Tabs-->
                    <div class="work-tabs tabs-box">

                        <!--Tab Btns-->
                        <ul class="tab-btns tab-buttons clearfix ml-0 list-unstyled">
                            <?php $tab_title_count = 1; ?>
                            <?php foreach ($settings['layout_four_tab_boxes'] as $layout_four_tab_box) : ?>
                                <?php $get_title_status = $layout_four_tab_box['status']; ?>
                                <li data-tab="#feature-tab-<?php echo esc_attr($tab_title_count); ?>" class="tab-btn <?php echo esc_attr(('yes' == $get_title_status) ? 'active-btn' : ''); ?> "><span><?php echo esc_html($layout_four_tab_box['title']); ?></span></li>
                                <?php $tab_title_count++; ?>
                            <?php endforeach; ?>
                        </ul>

                        <!--Tabs Container-->
                        <div class="tabs-content">
                            <?php $tab_content_count = 1; ?>
                            <?php foreach ($settings['layout_four_tab_boxes'] as $layout_four_tab_box) : ?>
                                <?php $get_tab_status = $layout_four_tab_box['status']; ?>
                                <!--Tab-->
                                <div class="tab <?php echo esc_attr(('yes' == $get_tab_status) ? 'active-tab' : ''); ?>" id="feature-tab-<?php echo esc_attr($tab_content_count); ?>">
                                    <div class="row clearfix">
                                        <div class="image-col col-lg-5 col-md-6 col-sm-12">
                                            <div class="inner">
                                                <div class="image">
                                                    <img src="<?php echo esc_attr($layout_four_tab_box['image']['url']); ?>" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-col col-lg-7 col-md-6 col-sm-12">
                                            <div class="inner">
                                                <div class="content">
                                                    <div class="text">
                                                        <?php echo wp_kses($layout_four_tab_box['content'], 'linoor_allowed_tags'); ?>

                                                        <?php $checklists = preg_split('/\r\n|\r|\n/', $layout_four_tab_box['check_list']); ?>
                                                        <ul class="m-0 list-unstyled">
                                                            <?php foreach ($checklists as $checklist) : ?>
                                                                <li><?php echo esc_html($checklist); ?></li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $tab_content_count++; ?>
                            <?php endforeach; ?>



                        </div>
                    </div>
                </div>
            </section>


        <?php endif; ?>

        <?php if ('layout_five' === $settings['layout_type']) : ?>

            <!--About Section-->
            <section class="about-section-two">
                <div class="auto-container">
                    <div class="row clearfix">
                        <!--Left Column-->
                        <div class="left-col col-lg-6 col-md-12 col-sm-12">
                            <div class="inner">
                                <div class="sec-title">
                                    <h2><?php echo wp_kses($settings['layout_five_title'], 'linoor_allowed_tags'); ?></h2>
                                    <div class="lower-text"><?php echo wp_kses($settings['layout_five_text'], 'linoor_allowed_tags'); ?></div>
                                </div>
                                <div class="counter">
                                    <div class="row clearfix">
                                        <?php foreach ($settings['layout_five_progress_boxes'] as $layout_five_progress_box) : ?>
                                            <div class="counter-block col-lg-6 col-md-6 col-sm-12">
                                                <div class="inner-box">
                                                    <div class="graph-outer">
                                                        <input type="text" class="dial" data-fgColor="#ffaa17" data-bgColor="none" data-width="140" data-height="140" data-linecap="normal" value="<?php echo esc_attr($layout_five_progress_box['progress_count']['size']); ?>" data-thickness="0.050">
                                                        <div class="inner-text count-box"><span class="count-text" data-stop="<?php echo esc_attr($layout_five_progress_box['progress_count']['size']); ?>" data-speed="2000"></span><span class="sign">%</span></div>
                                                    </div>
                                                    <h4><?php echo wp_kses($layout_five_progress_box['title'], 'linoor_allowed_tags'); ?></h4>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Right Column-->
                        <div class="right-col col-lg-6 col-md-12 col-sm-12">
                            <div class="inner">
                                <div class="image-box wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <div class="image"><img src="<?php echo esc_attr($settings['layout_five_image']['url']); ?>" alt=""></div>
                                    <div class="since"><span class="txt"><?php echo wp_kses($settings['layout_five_image_caption'], 'linoor_allowed_tags'); ?></span></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>


        <?php endif; ?>

        <?php if ('layout_six' === $settings['layout_type']) : ?>
            <section class="feature-six">
                <div class="auto-container">
                    <div class="row no-gutters">
                        <div class="col-md-12 col-lg-12 col-xl-6">
                            <div class="feature-six__image clearfix">
                                <img src="<?php echo esc_attr($settings['layout_six_image']['url']); ?>" alt="<?php echo esc_attr($settings['layout_six_image_caption']); ?>">
                                <div class="feature-six__image__caption"><?php echo wp_kses($settings['layout_six_image_caption'], 'linoor_allowed_tags'); ?></div><!-- /.feature-six__image__caption -->
                            </div><!-- /.feature-six__image -->
                        </div><!-- /.col-md-12 col-lg-6 -->
                        <div class="col-md-12 col-lg-12 col-xl-6 d-flex">
                            <div class="my-auto">

                                <div class="feature-six__content">
                                    <?php if (!empty($settings['layout_six_title'])) : ?>
                                        <div class="sec-title">
                                            <h2><?php echo wp_kses($settings['layout_six_title'], 'linoor_allowed_tags'); ?></h2>
                                        </div>
                                    <?php endif; ?>
                                    <div class="feature-six__content__text">
                                        <?php echo wp_kses($settings['layout_six_text'], 'linoor_allowed_tags'); ?>
                                    </div><!-- /.feature-six__content__text -->
                                    <?php $layout_six_checklists = preg_split('/\r\n|\r|\n/', $settings['layout_six_check_list']); ?>
                                    <ul class="m-0 list-unstyled feature-six__list">
                                        <?php foreach ($layout_six_checklists as $checklist) : ?>
                                            <li class="feature-six__list__item">
                                                <i class="flaticon-check-symbol"></i>
                                                <?php echo esc_html($checklist); ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div><!-- /.feature-six__content -->
                            </div><!-- /.my-auto -->
                        </div><!-- /.col-md-12 col-lg-6 -->
                    </div><!-- /.row -->
                </div><!-- /.auto-container -->
            </section><!-- /.feature-six -->

        <?php endif; ?>

        <?php if ('layout_seven' === $settings['layout_type']) : ?>
            <section class="feature-seven">
                <div class="auto-container">
                    <?php if (!empty($settings['layout_seven_title'])) : ?>
                        <div class="sec-title centered">
                            <h2><?php echo wp_kses($settings['layout_seven_title'], 'linoor_allowed_tags'); ?></h2>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <?php foreach ($settings['layout_seven_posts'] as $layout_seven_post) : ?>
                            <div class="col-md-12 col-lg-4">
                                <div class="feature-seven-card">
                                    <div class="feature-seven-card__inner">
                                        <div class="feature-seven-card__image">
                                            <?php echo wp_get_attachment_image($layout_seven_post['image']['id'], 'linoor_blog_370X254', "", array("class" => "img-fluid"));  ?>
                                        </div><!-- /.feature-seven-card__image -->
                                        <div class="feature-seven-card__content">
                                            <h3 class="feature-seven-card__title">
                                                <a href="<?php echo esc_url($layout_seven_post['url']); ?>"><?php echo wp_kses($layout_seven_post['title'], 'linoor_allowed_tags'); ?></a>
                                            </h3>
                                            <p class="feature-seven-card__text">
                                                <?php echo wp_kses($layout_seven_post['text'], 'linoor_allowed_tags'); ?>
                                            </p>
                                        </div><!-- /.feature-seven-card__content -->
                                    </div><!-- /.feature-seven-card__inner -->
                                </div><!-- /.feature-seven-card -->
                            </div><!-- /.col-md-12 -->
                        <?php endforeach; ?>
                    </div><!-- /.row -->
                </div><!-- /.auto-container -->
            </section><!-- /.feature-seven -->
        <?php endif; ?>


<?php
    }

    protected function _content_template()
    {
    }
}
