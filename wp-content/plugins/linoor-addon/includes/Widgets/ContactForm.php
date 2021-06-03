<?php

namespace Layerdrops\Linoor\Widgets;


class ContactForm extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'linoor-contact-form';
    }

    public function get_title()
    {
        return __('Contact Form', 'linoor-addon');
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
                'label' => __('Contents', 'linoor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'select_wpcf7_form',
            [
                'label'       => esc_html__('Select your contact form 7', 'zeino-core'),
                'label_block' => true,
                'type'        => \Elementor\Controls_Manager::SELECT,
                'options'     => linoor_post_query('wpcf7_contact_form'),
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'feature_content_section',
            [
                'label' => __('Feature Box', 'linoor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'layout_type' => 'layout_one'
                ]
            ]
        );

        $this->add_control(
            'feature_title',
            [
                'label' => __('Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Title', 'linoor-addon'),
            ]
        );

        $this->add_control(
            'feature_text',
            [
                'label' => __('Text', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add paragraph text', 'linoor-addon'),
            ]
        );


        $this->add_control(
            'feature_image',
            [
                'label' => __('Add Image', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [],
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'counter_content_section',
            [
                'label' => __('Counter Box', 'linoor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'layout_type' => 'layout_one'
                ]
            ]
        );

        $this->add_control(
            'counter_number',
            [
                'label' => __('Add Number', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => 123,
            ]
        );

        $this->add_control(
            'counter_text',
            [
                'label' => __('Text', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add paragraph text', 'linoor-addon'),
            ]
        );


        $this->add_control(
            'counter_image',
            [
                'label' => __('Add Image', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [],
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
            'layout_two_title',
            [
                'label' => __('Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Title', 'linoor-addon'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'layout_three_content_section',
            [
                'label' => __('Layout Three Content', 'linoor-addon'),
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

        $this->add_control(
            'layout_three_text',
            [
                'label' => __('Paragraph', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Default Text', 'linoor-addon'),
            ]
        );



        $info_list = new \Elementor\Repeater();

        $info_list->add_control(
            'icon',
            [
                'label' => __('Select Icon', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => linoor_get_fa_icons(),
                'label_block' => true,
            ]
        );
        $info_list->add_control(
            'title',
            [
                'label' => __('Add Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Default Title', 'linoor-addon'),
                'label_block' => true,
            ]
        );
        $info_list->add_control(
            'text',
            [
                'label' => __('Add Text', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Contact Info', 'linoor-addon'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'info_list',
            [
                'label' => __('Info Boxes', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $info_list->get_controls(),
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <?php if ('layout_one' == $settings['layout_type']) : ?>

            <!--Get Quote Section-->
            <section class="get-quote-section">
                <div class="auto-container">
                    <div class="row clearfix no-gutters">
                        <!--Left Column-->
                        <div class="left-col col-xl-8 col-lg-12 col-md-12 col-sm-12">
                            <div class="inner">
                                <div class="featured-block clearfix">
                                    <div class="image"><img src="<?php echo esc_attr($settings['feature_image']['url']); ?>" alt=""></div>
                                    <h4><?php echo wp_kses($settings['feature_title'], 'linoor_allowed_tags'); ?></h4>
                                    <div class="text"><?php echo wp_kses($settings['feature_text'], 'linoor_allowed_tags'); ?></div>
                                </div>
                                <div class="counter">
                                    <div class="counter-inner clearfix">
                                        <div class="counter-text">
                                            <div class="count-box"><span class="count-text" data-stop="<?php echo esc_attr($settings['counter_number']); ?>" data-speed="2500">0</span></div>
                                            <div class="counter-title"><?php echo wp_kses($settings['counter_text'], 'linoor_allowed_tags'); ?></div>
                                        </div>
                                        <div class="counter-image"><img src="<?php echo esc_attr($settings['counter_image']['url']); ?>" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Right Column-->
                        <div class="right-col col-xl-4 col-lg-12 col-md-12 col-sm-12">
                            <div class="inner">
                                <div class="form-box wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <!-- loading form via plugin -->
                                    <?php if (!empty($settings['select_wpcf7_form'])) : ?>
                                        <?php echo do_shortcode('[contact-form-7 id="' . $settings['select_wpcf7_form'] . '" ]'); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

        <?php endif; ?>

        <?php if ('layout_two' == $settings['layout_type']) : ?>

            <!--Get Quote Section-->
            <section class="get-quote-three">
                <div class="auto-container">
                    <?php if (!empty($settings['layout_two_title'])) : ?>
                        <div class="sec-title centered">
                            <h2><?php echo wp_kses($settings['layout_two_title'], 'linoor_allowed_tags'); ?></h2>
                        </div>
                    <?php endif; ?>
                    <div class="form-box">

                        <!-- loading form via plugin -->
                        <?php if (!empty($settings['select_wpcf7_form'])) : ?>
                            <?php echo do_shortcode('[contact-form-7 id="' . $settings['select_wpcf7_form'] . '" ]'); ?>
                        <?php endif; ?>

                    </div>
                </div>
            </section>

        <?php endif; ?>


        <?php if ('layout_three' == $settings['layout_type']) : ?>

            <!--Get Quote Section-->
            <section class="get-quote-two">
                <div class="auto-container">
                    <div class="row clearfix">
                        <!--Left Column-->
                        <div class="left-col col-lg-6 col-md-12 col-sm-12">
                            <div class="inner">
                                <div class="sec-title">
                                    <h2><?php echo wp_kses($settings['layout_three_title'], 'linoor_allowed_tags'); ?></h2>
                                </div>
                                <div class="text"><?php echo wp_kses($settings['layout_three_text'], 'linoor_allowed_tags'); ?></div>
                                <div class="info">
                                    <ul class="ml-0 list-unstyled">

                                        <?php foreach ($settings['info_list'] as $list) : ?>
                                            <li class="address">
                                                <span class="icon <?php echo esc_attr($list['icon']); ?>"></span>
                                                <strong><?php echo wp_kses($list['title'], 'linoor_allowed_tags'); ?></strong>
                                                <?php echo wp_kses($list['text'], 'linoor_allowed_tags'); ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--Right Column-->
                        <div class="right-col col-lg-6 col-md-12 col-sm-12">
                            <div class="inner">
                                <div class="form-box">
                                    <!-- loading form via plugin -->
                                    <?php if (!empty($settings['select_wpcf7_form'])) : ?>
                                        <?php echo do_shortcode('[contact-form-7 id="' . $settings['select_wpcf7_form'] . '" ]'); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
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
