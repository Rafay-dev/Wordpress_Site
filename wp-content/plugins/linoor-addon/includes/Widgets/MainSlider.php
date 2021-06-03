<?php

namespace Layerdrops\Linoor\Widgets;


class MainSlider extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'linoor-main-slider';
    }

    public function get_title()
    {
        return __('Main Slider', 'linoor-addon');
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
                ]
            ]
        );

        $this->add_control(
            'left_side_content_status',
            [
                'label' => __('Enable Left Content', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'linoor-addon'),
                'label_off' => __('Hide', 'linoor-addon'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Slider Content', 'linoor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'layout_type',
                            'operator' => '!==',
                            'value' => 'layout_four'
                        ]
                    ]
                ]
            ]
        );

        $slider = new \Elementor\Repeater();


        $slider->add_control(
            'background_image',
            [
                'label' => __('Background Image', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $slider->add_control(
            'title',
            [
                'label' => __('Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Title', 'linoor-addon'),
            ]
        );

        $slider->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add paragraph text', 'linoor-addon'),
            ]
        );

        $slider->add_control(
            'button_label',
            [
                'label' => __('Button Text', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Discover More', 'linoor-addon'),
                'label_block' => true,
            ]
        );

        $slider->add_control(
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
            'sliders',
            [
                'label' => __('Social Icons', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $slider->get_controls(),
                'default' => [
                    [
                        'title' => __('Awesome Title', 'linoor-addon'),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'content_section_four',
            [
                'label' => __('Slider Content', 'linoor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'layout_type',
                            'operator' => '==',
                            'value' => 'layout_four'
                        ]
                    ]
                ]
            ]
        );

        $slider_four = new \Elementor\Repeater();


        $slider_four->add_control(
            'background_image',
            [
                'label' => __('Background Image', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $slider_four->add_control(
            'title',
            [
                'label' => __('Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Title', 'linoor-addon'),
            ]
        );

        $slider_four->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add paragraph text', 'linoor-addon'),
            ]
        );

        $slider_four->add_control(
            'button_label',
            [
                'label' => __('Button Text', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Discover More', 'linoor-addon'),
                'label_block' => true,
            ]
        );

        $slider_four->add_control(
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

        $slider_four->add_control(
            'video_link',
            [
                'label' => __('Video URL', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('#', 'linoor-addon'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'sliders_four',
            [
                'label' => __('Social Icons', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $slider_four->get_controls(),
                'default' => [
                    [
                        'title' => __('Awesome Title', 'linoor-addon'),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'left_content',
            [
                'label' => __('Left Side Content', 'linoor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'left_side_content_status' => 'yes'
                ]
            ]
        );

        $time_lists = new \Elementor\Repeater();

        $time_lists->add_control(
            'text',
            [
                'label' => __('Add Text', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('mon - fri', 'linoor-addon'),
            ]
        );

        $this->add_control(
            'time_lists',
            [
                'label' => __('Social Icons', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $time_lists->get_controls(),
                'default' => [
                    [
                        'text' => __('mon - fri', 'linoor-addon'),
                    ],
                ],
                'title_field' => '{{{ text }}}',
            ]
        );

        $social_icons = new \Elementor\Repeater();


        $social_icons->add_control(
            'text',
            [
                'label' => __('Add Name', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('Facebook', 'linoor-addon'),
            ]
        );
        $social_icons->add_control(
            'url',
            [
                'label' => __('Add URL', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('#', 'linoor-addon'),
            ]
        );

        $this->add_control(
            'social_icons',
            [
                'label' => __('Social Icons', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $social_icons->get_controls(),
                'default' => [
                    [
                        'text' => __('Facebook', 'linoor-addon'),
                    ],
                ],
                'title_field' => '{{{ text }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <?php if ('layout_one' === $settings['layout_type']) : ?>

            <!-- Banner Section -->
            <section class="banner-section banner-one">
                <?php if ('yes' === $settings['left_side_content_status']) : ?>
                    <div class="left-based-text">
                        <div class="base-inner">
                            <div class="hours">
                                <ul class="clearfix m-0 list-unstyled">
                                    <?php foreach ($settings['time_lists'] as $time_list) : ?>
                                        <li><span><?php echo esc_html($time_list['text']); ?></span></li>
                                    <?php endforeach; ?>

                                </ul>
                            </div>
                            <div class="social-links">
                                <ul class="clearfix m-0 list-unstyled">
                                    <?php foreach ($settings['social_icons'] as $social_icon) : ?>
                                        <li><a href="<?php echo esc_attr($social_icon['url']); ?>"><span><?php echo esc_html($social_icon['text']); ?></span></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="banner-carousel owl-theme owl-carousel">
                    <?php foreach ($settings['sliders'] as $slider) : ?>
                        <!-- Slide Item -->
                        <div class="slide-item">
                            <div class="image-layer" style="background-image: url(<?php echo esc_attr($slider['background_image']['url']); ?>);"></div>

                            <div class="left-top-line"></div>
                            <div class="right-bottom-curve"></div>
                            <div class="right-top-curve"></div>

                            <div class="auto-container">
                                <div class="content-box">
                                    <div class="content">
                                        <div class="inner">
                                            <div class="sub-title"><?php echo wp_kses($slider['sub_title'], 'linoor_allowed_tags'); ?></div>
                                            <h1><?php echo wp_kses($slider['title'], 'linoor_allowed_tags'); ?></h1>
                                            <div class="link-box">
                                                <a class="theme-btn btn-style-one" href="<?php echo esc_html($slider['button_url']['url']); ?>">
                                                    <i class="btn-curve"></i>
                                                    <span class="btn-title"><?php echo esc_html($slider['button_label']); ?></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>

                </div>
            </section>
            <!--End Banner Section -->

        <?php endif; ?>

        <?php if ('layout_two' === $settings['layout_type']) : ?>

            <!-- Banner Section -->
            <section class="banner-section banner-two">
                <?php if ('yes' === $settings['left_side_content_status']) : ?>
                    <div class="left-based-text">
                        <div class="base-inner">
                            <div class="hours">
                                <ul class="clearfix m-0 list-unstyled">
                                    <?php foreach ($settings['time_lists'] as $time_list) : ?>
                                        <li><span><?php echo esc_html($time_list['text']); ?></span></li>
                                    <?php endforeach; ?>

                                </ul>
                            </div>
                            <div class="social-links">
                                <ul class="clearfix m-0 list-unstyled">
                                    <?php foreach ($settings['social_icons'] as $social_icon) : ?>
                                        <li><a href="<?php echo esc_attr($social_icon['url']); ?>"><span><?php echo esc_html($social_icon['text']); ?></span></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="banner-carousel owl-theme owl-carousel">
                    <?php foreach ($settings['sliders'] as $slider) : ?>
                        <!-- Slide Item -->
                        <div class="slide-item">
                            <div class="image-layer" style="background-image: url(<?php echo esc_attr($slider['background_image']['url']); ?>);"></div>
                            <div class="shape-1"></div>
                            <div class="shape-2"></div>
                            <div class="shape-3"></div>
                            <div class="shape-4"></div>
                            <div class="shape-5"></div>
                            <div class="shape-6"></div>
                            <div class="auto-container">
                                <div class="content-box">
                                    <div class="content">
                                        <div class="inner">
                                            <div class="sub-title"><?php echo wp_kses($slider['sub_title'], 'linoor_allowed_tags'); ?></div>
                                            <h1><?php echo wp_kses($slider['title'], 'linoor_allowed_tags'); ?></h1>
                                            <div class="link-box">
                                                <a class="theme-btn btn-style-one" href="<?php echo esc_html($slider['button_url']['url']); ?>">
                                                    <i class="btn-curve"></i>
                                                    <span class="btn-title"><?php echo esc_html($slider['button_label']); ?></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </section>
            <!--End Banner Section -->

        <?php endif; ?>

        <?php if ('layout_three' === $settings['layout_type']) : ?>

            <!-- Banner Section -->
            <section class="banner-section banner-three">

                <?php if ('yes' === $settings['left_side_content_status']) : ?>
                    <div class="left-based-text">
                        <div class="base-inner">
                            <div class="hours">
                                <ul class="clearfix m-0 list-unstyled">
                                    <?php foreach ($settings['time_lists'] as $time_list) : ?>
                                        <li><span><?php echo esc_html($time_list['text']); ?></span></li>
                                    <?php endforeach; ?>

                                </ul>
                            </div>
                            <div class="social-links">
                                <ul class="clearfix m-0 list-unstyled">
                                    <?php foreach ($settings['social_icons'] as $social_icon) : ?>
                                        <li><a href="<?php echo esc_attr($social_icon['url']); ?>"><span><?php echo esc_html($social_icon['text']); ?></span></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>


                <div class="bg-image" style="background-image: url(<?php echo esc_attr($settings['_background_image']['url']); ?>);"></div>
                <div class="banner-carousel owl-theme owl-carousel">
                    <?php foreach ($settings['sliders'] as $slider) : ?>
                        <!-- Slide Item -->
                        <div class="slide-item">
                            <div class="round-shape-1"></div>
                            <div class="round-image">
                                <div class="image" style="background-image: url(<?php echo esc_attr($slider['background_image']['url']); ?>);"></div>
                            </div>
                            <div class="auto-container">
                                <div class="content-box">
                                    <div class="content">
                                        <div class="inner">
                                            <h1><?php echo wp_kses($slider['title'], 'linoor_allowed_tags'); ?></h1>
                                            <div class="text"><?php echo wp_kses($slider['sub_title'], 'linoor_allowed_tags'); ?></div>
                                            <div class="link-box">
                                                <a class="theme-btn btn-style-two" href="<?php echo esc_html($slider['button_url']['url']); ?>">
                                                    <i class="btn-curve"></i>
                                                    <span class="btn-title"><?php echo esc_html($slider['button_label']); ?></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>



                </div>
            </section>
            <!--End Banner Section -->

        <?php endif; ?>

        <!-- layout four -->
        <?php if ('layout_four' === $settings['layout_type']) : ?>

            <!-- Banner Section -->
            <section class="banner-section banner-one banner-one-page" id="home">

                <div class="banner-carousel owl-theme owl-carousel">
                    <?php foreach ($settings['sliders_four'] as $slider) : ?>
                        <!-- Slide Item -->
                        <div class="slide-item">
                            <div class="image-layer" style="background-image: url(<?php echo esc_attr($slider['background_image']['url']); ?>);"></div>

                            <div class="auto-container">
                                <div class="content-box">
                                    <div class="content">
                                        <div class="inner text-center">
                                            <div class="sub-title"><?php echo wp_kses($slider['sub_title'], 'linoor_allowed_tags'); ?></div>
                                            <h1><?php echo wp_kses($slider['title'], 'linoor_allowed_tags'); ?></h1>
                                            <div class="link-box">
                                                <a class="theme-btn btn-style-one" href="<?php echo esc_html($slider['button_url']['url']); ?>">
                                                    <i class="btn-curve"></i>
                                                    <span class="btn-title"><?php echo esc_html($slider['button_label']); ?></span>
                                                </a>
                                                <div class="vid-link">
                                                    <a href="<?php echo esc_url($slider['video_link']); ?>" class="lightbox-image">
                                                        <div class="icon"><span class="flaticon-play-button-1"></span><i class="ripple"></i></div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </section>
            <!--End Banner Section -->

        <?php endif; ?>

<?php
    }

    protected function _content_template()
    {
    }
}
