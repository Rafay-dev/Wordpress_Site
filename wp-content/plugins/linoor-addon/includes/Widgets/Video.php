<?php

namespace Layerdrops\Linoor\Widgets;


class Video extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'linoor-video';
    }

    public function get_title()
    {
        return __('Video', 'linoor-addon');
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
                'condition' => [
                    'layout_type' => 'layout_one'
                ]
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
            ]
        );

        $this->add_control(
            'video_url',
            [
                'label' => __('Video Url', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('#', 'linoor-addon'),
                'default' => '#',
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


        $this->end_controls_section();


        $this->start_controls_section(
            'content_two_section',
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
                'label' => __('Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Title', 'linoor-addon'),
            ]
        );


        $this->add_control(
            'layout_two_video_url',
            [
                'label' => __('Video Url', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('#', 'linoor-addon'),
                'default' => '#',
            ]
        );


        $this->add_control(
            'layout_two_image',
            [
                'label' => __('Add Image', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [],
            ]
        );

        $check_box = new \Elementor\Repeater();
        $check_box->add_control(
            'title',
            [
                'label' => __('Box Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Awesome title', 'linoor-addon'),
                'label_block' => true,
            ]
        );
        $check_box->add_control(
            'text',
            [
                'label' => __('Box Text', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Default Text', 'linoor-addon'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'check_boxes',
            [
                'label' => __('Check Boxes', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $check_box->get_controls(),
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
            'content_three_section',
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
                'label' => __('Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Title', 'linoor-addon'),
            ]
        );


        $sub_text_box = new \Elementor\Repeater();

        $sub_text_box->add_control(
            'text',
            [
                'label' => __('Box Text', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Default Text', 'linoor-addon'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'sub_text_box',
            [
                'label' => __('Sub Text', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $sub_text_box->get_controls(),
                'default' => [
                    [
                        'text' => __('Default Text', 'linoor-addon'),
                    ],
                ],
                'title_field' => '{{{ text }}}',
            ]
        );


        $this->add_control(
            'layout_three_video_url',
            [
                'label' => __('Video Url', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('#', 'linoor-addon'),
                'default' => '#',
            ]
        );


        $this->add_control(
            'layout_three_image',
            [
                'label' => __('Add Image', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display(); ?>
        <?php if ('layout_one' === $settings['layout_type']) : ?>
            <!--Live Section-->
            <section class="live-section">
                <div class="auto-container">
                    <?php if (!empty($settings['title'])) : ?>
                        <div class="sec-title centered">
                            <h2><?php echo wp_kses($settings['title'], 'linoor_allowed_tags'); ?></h2>
                        </div>
                    <?php endif; ?>
                    <div class="main-image-box">
                        <div class="image-layer" style="background-image: url(<?php echo esc_attr($settings['image']['url']); ?>);"></div>
                        <div class="inner clearfix">
                            <div class="round-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <div class="round-inner">
                                    <div class="vid-link">
                                        <a href="<?php echo esc_url($settings['video_url']); ?>" class="lightbox-image">
                                            <div class="icon"><span class="flaticon-play-button-1"></span><i class="ripple"></i></div>
                                        </a>
                                    </div>
                                    <div class="title">
                                        <h3><?php echo wp_kses($settings['sub_title'], 'linoor_allowed_tags'); ?></h3>
                                    </div>
                                    <div class="more-link"><a href="<?php echo esc_html($settings['button_url']['url']); ?>"><?php echo esc_html($settings['button_label']); ?></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php if ('layout_two' === $settings['layout_type']) : ?>

            <!--Why Us Section-->
            <section class="why-us-section">
                <div class="auto-container">
                    <div class="row clearfix">
                        <!--Left Column-->
                        <div class="left-col col-lg-6 col-md-12 col-sm-12">
                            <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <div class="round-box">
                                    <div class="image-box">
                                        <img src="<?php echo esc_attr($settings['layout_two_image']['url']); ?>" alt="">
                                    </div>
                                    <div class="vid-link">
                                        <a href="<?php echo esc_url($settings['layout_two_video_url']); ?>" class="lightbox-image">
                                            <div class="icon"><span class="flaticon-play-button-1"></span><i class="ripple"></i></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Right Column-->
                        <div class="right-col col-lg-6 col-md-12 col-sm-12">
                            <div class="inner">
                                <?php if (!empty($settings['layout_two_title'])) : ?>
                                    <div class="sec-title">
                                        <h2><?php echo wp_kses($settings['layout_two_title'], 'linoor_allowed_tags'); ?></h2>
                                    </div>
                                <?php endif; ?>

                                <div class="features">
                                    <?php foreach ($settings['check_boxes'] as $check_box) : ?>
                                        <div class="feature">
                                            <div class="inner-box">
                                                <h6><?php echo wp_kses($check_box['title'], 'linoor_allowed_tags'); ?></h6>
                                                <div class="text"><?php echo wp_kses($check_box['text'], 'linoor_allowed_tags'); ?></div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php if ('layout_three' === $settings['layout_type']) : ?>
            <div class="video-one">
                <div class="auto-container">
                    <div class="video-one__image">
                        <img src="<?php echo esc_attr($settings['layout_three_image']['url']); ?>" alt="<?php echo esc_attr($settings['layout_three_title']); ?>">
                        <div class="vid-link">
                            <a href="<?php echo esc_url($settings['layout_three_video_url']); ?>" class="lightbox-image">
                                <div class="icon"><span class="flaticon-play-button-1"></span><i class="ripple"></i></div>
                            </a>
                        </div>
                    </div><!-- /.video-one__image -->
                    <div class="video-one__content">
                        <div class="row align-items-center">
                            <?php if (!empty($settings['layout_three_title'])) : ?>
                                <div class="col-md-12 col-lg-4">
                                    <div class="sec-title">
                                        <h2><?php echo wp_kses($settings['layout_three_title'], 'linoor_allowed_tags'); ?><span class="dot">.</span></h2>
                                    </div>
                                </div><!-- /.col-md-12 -->
                            <?php endif; ?>
                            <?php foreach ($settings['sub_text_box'] as $sub_text_box) : ?>
                                <div class="col-md-12 col-lg-4">
                                    <div class="block-text">
                                        <?php echo wp_kses($sub_text_box['text'], 'linoor_allowed_tags'); ?>
                                    </div><!-- /.block-text -->
                                </div><!-- /.col-md-12 col-lg-4 -->
                            <?php endforeach; ?>
                        </div><!-- /.row -->
                    </div><!-- /.video-one__content -->
                </div><!-- /.auto-container -->
            </div><!-- /.video-one -->
        <?php endif; ?>

<?php
    }

    protected function _content_template()
    {
    }
}
