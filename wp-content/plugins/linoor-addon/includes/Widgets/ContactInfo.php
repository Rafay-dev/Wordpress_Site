<?php

namespace Layerdrops\Linoor\Widgets;


class ContactInfo extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'linoor-contact-info';
    }

    public function get_title()
    {
        return __('Contact Info', 'linoor-addon');
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
                'default' => __('Explore', 'linoor-addon')
            ]
        );

        $info_list = new \Elementor\Repeater();

        $info_list->add_control(
            'title',
            [
                'label' => __('Add Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Contact Info', 'linoor-addon'),
                'label_block' => true,
            ]
        );
        $info_list->add_control(
            'list_item',
            [
                'label' => __('Info List', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'description' => __('Each new line will become a info list item', 'linoor-addon'),
                'default' => __('Default text', 'linoor-addon'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'info_list',
            [
                'label' => __('Info List', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $info_list->get_controls(),
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display(); ?>

        <!--Contact Section-->
        <section class="contact-section p-0 ">
            <div class="auto-container">
                <?php if (!empty($settings['title'])) : ?>
                    <div class="sec-title centered">
                        <h2><?php echo wp_kses($settings['title'], 'linoor_allowed_tags'); ?></h2>
                    </div>
                <?php endif; ?>

                <div class="upper-info">
                    <div class="row clearfix">
                        <?php foreach ($settings['info_list'] as $info_list) : ?>
                            <div class="info-block col-xl-3 col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <div class="inner-box">
                                    <h5><?php echo esc_html($info_list['title']); ?></h5>
                                    <div class="text">
                                        <?php $checklists = preg_split('/\r\n|\r|\n/', $info_list['list_item']); ?>
                                        <ul class="info ml-0 list-unstyled">
                                            <?php foreach ($checklists as $checklist) : ?>
                                                <li><?php echo wp_kses($checklist, 'linoor_allowed_tags'); ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </section>

<?php
    }

    protected function _content_template()
    {
    }
}
