<?php

namespace Layerdrops\Linoor\Widgets;


class Sponsors extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'linoor-sponsors';
    }

    public function get_title()
    {
        return __('Sponsors', 'linoor-addon');
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


        $this->add_control(
            'title',
            [
                'label' => __('Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Title', 'linoor-addon'),
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

        $sponsor_images = new \Elementor\Repeater();

        $sponsor_images->add_control(
            'image',
            [
                'label' => __('Add Image', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $sponsor_images->add_control(
            'link',
            [
                'label' => __('Add Link', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );


        $this->add_control(
            'sponsor_images',
            [
                'label' => __('Box Items', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $sponsor_images->get_controls(),
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <?php if ('layout_one' == $settings['layout_type']) : ?>
            <!--Sponsors Section-->
            <section class="sponsors-section">
                <div class="sponsors-outer">
                    <!--Sponsors-->
                    <div class="auto-container">
                        <!--Sponsors Carousel-->
                        <div class="sponsors-carousel owl-theme owl-carousel">
                            <?php foreach ($settings['sponsor_images'] as $image) : ?>
                                <div class="slide-item">
                                    <figure class="image-box"><a href="<?php echo esc_url($image['link']); ?>">
                                            <?php echo wp_get_attachment_image($image['image']['id'], 'linoor_brand_logo_150X80'); ?>
                                        </a></figure>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php if ('layout_two' == $settings['layout_type']) : ?>
            <!--Sponsors Section-->
            <section class="sponsors-section-two">
                <div class="auto-container">
                    <!--Sponsors Carousel-->
                    <div class="row clearfix">
                        <div class="title-col col-xl-5 col-lg-12 col-md-12">
                            <div class="sec-title wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <h2><?php echo wp_kses($settings['title'], 'linoor_allowed_tags'); ?></h2>
                            </div>
                        </div>

                        <div class="logo-col col-xl-7 col-lg-12 col-md-12">
                            <div class="row clearfix">

                                <?php foreach ($settings['sponsor_images'] as $image) : ?>
                                    <div class="logo-block col-xl-4 col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                        <div class="image-box"><a href="<?php echo esc_url($image['link']); ?>">
                                                <?php echo wp_get_attachment_image($image['image']['id'], 'linoor_brand_logo_150X80'); ?>
                                            </a></div>
                                    </div>

                                <?php endforeach; ?>


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
