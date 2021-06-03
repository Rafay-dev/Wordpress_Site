<?php

namespace Layerdrops\Linoor\Widgets;


class HowWorks extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'linoor-how-works';
    }

    public function get_title()
    {
        return __('How Works', 'linoor-addon');
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

        $how_works_list = new \Elementor\Repeater();

        $how_works_list->add_control(
            'title',
            [
                'label' => __('Add Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Contact Info', 'linoor-addon'),
                'label_block' => true,
            ]
        );
        $how_works_list->add_control(
            'icon',
            [
                'label' => __('Select Icon', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => linoor_get_fa_icons(),
                'label_block' => true,
            ]
        );

        $how_works_list->add_control(
            'text',
            [
                'label' => __('Add Text', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Default text', 'linoor-addon'),
                'label_block' => true,
            ]
        );

        $how_works_list->add_control(
            'read_more_label',
            [
                'label' => __('More Button Label', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Read More', 'linoor-addon'),
                'label_block' => true,
            ]
        );
        $how_works_list->add_control(
            'read_more_url',
            [
                'label' => __('More Button URL', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('#', 'linoor-addon'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'how_works_list',
            [
                'label' => __('Card List', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $how_works_list->get_controls(),
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display(); ?>



        <section class="how-it-works">
            <div class="auto-container">
                <div class="row">
                    <?php foreach ($settings['how_works_list'] as $list) : ?>
                        <div class="col-md-12 col-lg-4">
                            <div class="how-it-works-card text-center">
                                <div class="how-it-works-card__inner">
                                    <i class="how-it-works-card__icon  <?php echo esc_attr($list['icon']); ?>"></i>
                                    <h3 class="how-it-works-card__title">
                                        <a href="<?php echo esc_url($list['read_more_url']); ?>"><?php echo wp_kses($list['title'], 'linoor_allowed_tags'); ?></a>
                                    </h3><!-- /.how-it-works-card__title -->
                                    <p class="how-it-works-card__text"><?php echo wp_kses($list['text'], 'linoor_allowed_tags'); ?></p><!-- /.how-it-works-card__text -->
                                    <a href="<?php echo esc_url($list['read_more_url']); ?>" class="how-it-works-card__link"><?php echo esc_html($list['read_more_label']); ?></a>
                                    <!-- /.how-it-works-card__link -->
                                </div><!-- /.how-it-works-card__inner -->
                            </div><!-- /.how-it-works-card -->
                        </div><!-- /.col-md-12 col-lg-4 -->
                    <?php endforeach; ?>
                </div><!-- /.row -->
            </div><!-- /.auto-container -->
        </section><!-- /.how-it-works -->


<?php
    }

    protected function _content_template()
    {
    }
}
