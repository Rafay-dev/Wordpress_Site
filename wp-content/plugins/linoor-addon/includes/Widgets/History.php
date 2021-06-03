<?php

namespace Layerdrops\Linoor\Widgets;


class History extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'linoor-history';
    }

    public function get_title()
    {
        return __('History Timeline', 'linoor-addon');
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
            'year',
            [
                'label' => __('Add Year', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('2020', 'linoor-addon'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'reverse_layout',
            [
                'label' => __('Reverse Layout', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'linoor-addon'),
                'label_off' => __('No', 'linoor-addon'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $history_card_list = new \Elementor\Repeater();

        $history_card_list->add_control(
            'title',
            [
                'label' => __('Add Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Contact Info', 'linoor-addon'),
                'label_block' => true,
            ]
        );

        $history_card_list->add_control(
            'date',
            [
                'label' => __('Add Date', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('01 January 2020', 'linoor-addon'),
                'label_block' => true,
            ]
        );
        $history_card_list->add_control(
            'text',
            [
                'label' => __('Add Text', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Default text', 'linoor-addon'),
                'label_block' => true,
            ]
        );

        $history_card_list->add_control(
            'image',
            [
                'label' => __('Add Image', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );



        $this->add_control(
            'history_card_list',
            [
                'label' => __('Card List', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $history_card_list->get_controls(),
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display(); ?>



        <div class="history-timeline__card <?php echo esc_attr(('yes' == $settings['reverse_layout']) ? 'reversed-layout' : ''); ?>">
            <span class="history-timeline__year"><?php echo esc_html($settings['year']); ?></span><!-- /.history-timeline__year -->
            <?php foreach ($settings['history_card_list'] as $history_card) : ?>

                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <div class="history-timeline__info">
                            <span class="history-timeline__date"><?php echo esc_html($history_card['date']); ?></span>
                            <h3 class="history-timeline__title"><?php echo wp_kses($history_card['title'], 'linoor_allowed_tags'); ?></h3>
                            <!-- /.history-timeline__title -->
                            <p class="history-timeline__text"><?php echo wp_kses($history_card['text'], 'linoor_allowed_tags'); ?></p>
                        </div><!-- /.history-timeline__info -->
                    </div><!-- /.col-md-12 col-lg-6 -->
                    <div class="col-md-12 col-lg-6">
                        <?php if (!empty($history_card['image']['url'])) : ?>
                            <div class="history-timeline__image">
                                <img src="<?php echo esc_attr($history_card['image']['url']); ?>" alt="<?php echo esc_attr($history_card['title']); ?>">
                            </div><!-- /.history-timeline__image -->
                        <?php endif; ?>
                    </div><!-- /.col-md-12 col-lg-6 -->
                </div><!-- /.row -->
            <?php endforeach; ?>
        </div><!-- /.history-timeline__card -->

<?php
    }

    protected function _content_template()
    {
    }
}
