<?php

namespace Layerdrops\Linoor\Widgets;


class CallToAction extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'linoor-call-to-action';
    }

    public function get_title()
    {
        return __('Call To Action', 'linoor-addon');
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
                ]
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Contents', 'linoor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'layout_type',
                            'operator' => '!==',
                            'value' => 'layout_three'
                        ]
                    ]
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


        $this->end_controls_section();

        $this->start_controls_section(
            'layout_two_content_section',
            [
                'label' => __('Layout Two Content', 'linoor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'layout_type' => 'layout_two'
                ]
            ]
        );

        $this->add_control(
            'layout_two_background_image',
            [
                'label' => __('Add Background Image', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $icon_box = new \Elementor\Repeater();
        $icon_box->add_control(
            'icon',
            [
                'label' => __('Select Icon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => linoor_get_fa_icons(),
            ]
        );

        $icon_box->add_control(
            'title',
            [
                'label' => __('Icon Title'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Default Text', 'linoor-addon'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'icon_boxes',
            [
                'label' => __('Funfact Boxes', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $icon_box->get_controls(),
                'default' => [
                    [
                        'title' => __('Default Text', 'linoor-addon'),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'layout_three_content_section',
            [
                'label' => __('Layout Three Contents', 'linoor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'layout_type',
                            'operator' => '==',
                            'value' => 'layout_three'
                        ]
                    ]
                ]
            ]
        );

        $layout_three_box = new \Elementor\Repeater();

        $layout_three_box->add_control(
            'background_image',
            [
                'label' => __('Background Image', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $layout_three_box->add_control(
            'title',
            [
                'label' => __('Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Title', 'linoor-addon'),
            ]
        );



        $layout_three_box->add_control(
            'button_label',
            [
                'label' => __('Button Text', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Discover More', 'linoor-addon'),
                'label_block' => true,
            ]
        );

        $layout_three_box->add_control(
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
            'layout_three_boxes',
            [
                'label' => __('Funfact Boxes', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $layout_three_box->get_controls(),
                'default' => [
                    [
                        'title' => __('Default Text', 'linoor-addon'),
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

        <?php if ('layout_one' == $settings['layout_type']) : ?>

            <!-- Call To Section -->
            <section class="call-to-section">
                <div class="auto-container">
                    <div class="inner clearfix">
                        <div class="shape-1 wow slideInRight" data-wow-delay="0ms" data-wow-duration="1500ms"></div>
                        <div class="shape-2 wow fadeInDown" data-wow-delay="0ms" data-wow-duration="1500ms"></div>
                        <h2><?php echo wp_kses($settings['title'], 'linoor_allowed_tags'); ?></h2>
                        <div class="link-box">
                            <a class="theme-btn btn-style-two" href="<?php echo esc_html($settings['button_url']['url']); ?>">
                                <i class="btn-curve"></i>
                                <span class="btn-title"><?php echo esc_html($settings['button_label']); ?></span>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

        <?php endif; ?>

        <?php if ('layout_two' == $settings['layout_type']) : ?>

            <!-- Features Section -->
            <section class="features-section jarallax" data-jarallax data-speed="0.3" data-imgPosition="50% -100%">
                <img src="<?php echo esc_attr($settings['layout_two_background_image']['url']); ?>" class="jarallax-img" alt="">
                <div class="auto-container">
                    <div class="content-box">
                        <h2><?php echo wp_kses($settings['title'], 'linoor_allowed_tags'); ?></h2>
                        <div class="features clearfix">
                            <?php foreach ($settings['icon_boxes'] as $icon_box) : ?>
                                <div class="feature-block">
                                    <div class="inner">
                                        <div class="icon-box"><span class="<?php echo esc_attr($icon_box['icon']); ?>"></span></div>
                                        <h6><?php echo wp_kses($icon_box['title'], 'linoor_allowed_tags'); ?></h6>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="link-box">
                            <a class="theme-btn btn-style-one" href="<?php echo esc_html($settings['button_url']['url']); ?>">
                                <i class="btn-curve"></i>
                                <span class="btn-title"><?php echo esc_html($settings['button_label']); ?></span>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Funfacts Section -->

        <?php endif; ?>

        <?php if ('layout_three' == $settings['layout_type']) : ?>

            <!-- Fluid Section -->
            <section class="fluid-section">
                <div class="outer-container">
                    <div class="row clearfix">
                        <?php $call_layout_three_count = 1;
                        $call_layout_three_btn_class = 'btn-style-one';
                        ?>
                        <?php foreach ($settings['layout_three_boxes'] as $layout_three_box) : ?>
                            <?php if (0 == ($call_layout_three_count % 2)) {
                                $call_layout_three_btn_class  = 'btn-style-two';
                            } ?>
                            <div class="column col-lg-6 col-md-12 col-sm-12">
                                <div class="inner">
                                    <div class="image-layer" style="background-image: url(<?php echo esc_attr($layout_three_box['background_image']['url']); ?>);">
                                    </div>
                                    <div class="content-box">
                                        <h3><?php echo wp_kses($layout_three_box['title'], 'linoor_allowed_tags'); ?></h3>
                                        <div class="link-box">
                                            <a class="theme-btn <?php echo esc_attr($call_layout_three_btn_class); ?>" href="<?php echo esc_html($layout_three_box['button_url']['url']); ?>">
                                                <i class="btn-curve"></i>
                                                <span class="btn-title"><?php echo esc_html($layout_three_box['button_label']); ?></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $call_layout_three_count++; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

        <?php endif; ?>

        <?php if ('layout_four' == $settings['layout_type']) : ?>

            <!-- Call To Section -->
            <section class="call-to-section-two">
                <div class="auto-container">
                    <div class="inner clearfix">
                        <h2><?php echo wp_kses($settings['title'], 'linoor_allowed_tags'); ?></h2>
                        <div class="link-box">
                            <a class="theme-btn btn-style-one" href="<?php echo esc_html($settings['button_url']['url']); ?>">
                                <i class="btn-curve"></i>
                                <span class="btn-title"><?php echo esc_html($settings['button_label']); ?></span>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

        <?php endif; ?>

        <?php if ('layout_five' == $settings['layout_type']) : ?>

            <!-- Call To Section -->
            <section class="call-to-section-two alternate">
                <div class="auto-container">
                    <div class="inner clearfix">
                        <h2><?php echo wp_kses($settings['title'], 'linoor_allowed_tags'); ?></h2>
                        <div class="link-box">
                            <a class="theme-btn btn-style-two" href="<?php echo esc_html($settings['button_url']['url']); ?>">
                                <i class="btn-curve"></i>
                                <span class="btn-title"><?php echo esc_html($settings['button_label']); ?></span>
                            </a>
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
