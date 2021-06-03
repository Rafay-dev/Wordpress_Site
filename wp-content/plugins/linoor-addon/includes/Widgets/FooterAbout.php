<?php

namespace Layerdrops\Linoor\Widgets;


class FooterAbout extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'footer-about';
    }

    public function get_title()
    {
        return __('Footer About', 'linoor-addon');
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
            'logo',
            [
                'label' => __('Add Logo', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'logo_dimension',
            [
                'label' => __('Logo Dimension', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::IMAGE_DIMENSIONS,
                'description' => __('Set Custom Logo Size.', 'linoor-addon'),
                'default' => [
                    'width' => '134',
                    'height' => '34',
                ],
            ]
        );

        $this->add_control(
            'text',
            [
                'label' => __('Paragraph', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add paragraph text', 'linoor-addon'),
            ]
        );

        $social_icons = new \Elementor\Repeater();

        $social_icons->add_control(
            'social_icon',
            [
                'label' => __('Select Icon', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => linoor_get_fa_icons(),
                'default' => 'fa-facebook-f',
                'label_block' => true,
            ]
        );

        $social_icons->add_control(
            'social_url',
            [
                'label' => __('Add Url', 'linoor-addon'),
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
            'social_icons',
            [
                'label' => __('Social Icons', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $social_icons->get_controls(),
                'default' => [
                    [
                        'social_icon' => 'fa-facebook-f',
                        'social_url' => [
                            'url' => '#',
                            'is_external' => true,
                            'nofollow' => true,
                        ],
                    ],
                ],
                'title_field' => '{{{ social_icon }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <div class="footer-widget logo-widget">
            <div class="widget-content">
                <div class="logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>"><img id="fLogo" src="<?php echo esc_attr($settings['logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" /></a>
                </div>
                <div class="text"><?php echo wp_kses($settings['text'], 'linoor_allowed_tags'); ?></div>
                <ul class="social-links clearfix list-unstyled m-0">
                    <?php foreach ($settings['social_icons'] as $social_icon) : ?>
                        <li><a href="<?php echo esc_url($social_icon['social_url']['url']); ?>"><span class="fab <?php echo esc_attr($social_icon['social_icon']); ?>"></span></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
<?php
    }

    protected function _content_template()
    {
    }
}
