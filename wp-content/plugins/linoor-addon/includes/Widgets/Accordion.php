<?php

namespace Layerdrops\Linoor\Widgets;


class Accordion extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'linoor-accordion';
    }

    public function get_title()
    {
        return __('Accordion', 'linoor-addon');
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


        $accordion_lists = new \Elementor\Repeater();

        $accordion_lists->add_control(
            'title',
            [
                'label' => __('Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Title', 'linoor-addon'),
                'label_block' => true,
            ]
        );

        $accordion_lists->add_control(
            'text',
            [
                'label' => __('Add Paragraph', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Accordion Paragraph text', 'linoor-addon')
            ]
        );

        $accordion_lists->add_control(
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

        $this->add_control(
            'accordion_lists',
            [
                'label' => __('Accordion Box', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $accordion_lists->get_controls(),
                'default' => [
                    [
                        'title' => __('My Progress', 'linoor-addon'),
                        'text' => __('Accordion Paragraph text', 'linoor-addon'),
                        'status' => 'no'
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
        <div class="faq-block">
            <ul class="accordion-box m-0 list-unstyled clearfix" id="<?php echo esc_attr(uniqid()); ?>">
                <?php $count = 1; ?>
                <?php foreach ($settings['accordion_lists'] as $accordion_list) : ?>
                    <?php $get_status = $accordion_list['status']; ?>
                    <!--Block-->
                    <li class="accordion block <?php echo esc_attr(('yes' == $get_status) ? 'active-block' : ''); ?>">
                        <div class="acc-btn <?php echo esc_attr(('yes' === $get_status) ? 'active' : ''); ?> "><span class="count"><?php echo esc_html($count); ?>.</span> <?php echo wp_kses($accordion_list['title'], 'linoor_allowed_tags'); ?></div>
                        <div class="acc-content <?php echo esc_attr(('yes' == $get_status) ? 'current' : ''); ?>">
                            <div class="content">
                                <div class="text"><?php echo wp_kses($accordion_list['text'], 'linoor_allowed_tags'); ?></div>
                            </div>
                        </div>
                    </li>
                    <?php $count++; ?>
                <?php endforeach; ?>
            </ul>
        </div><!-- /.faq-block -->

<?php
    }

    protected function _content_template()
    {
    }
}
