<?php

namespace Layerdrops\Linoor\Widgets;


class FooterAboutTwo extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'footer-about-two';
    }

    public function get_title()
    {
        return __('Footer About Two', 'linoor-addon');
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
                'label' => __('Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add title', 'linoor-addon'),
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



        $this->add_control(
            'copyright_text',
            [
                'label' => __('Copyright Text', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add text', 'linoor-addon'),
            ]
        );

        $this->add_control(
            'background_image',
            [
                'label' => __('Background Image', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>


        <!-- Main Footer -->
        <footer class="main-footer main-footer__two" style="background-image: url(<?php echo esc_url($settings['background_image']['url']); ?>);">
            <div class="auto-container">
                <div class="footer-widget text-center">
                    <h3><?php echo wp_kses($settings['title'], 'linoor_allowed_tags'); ?></h3>
                    <p><?php echo wp_kses($settings['text'], 'linoor_allowed_tags'); ?></p>
                    <ul class="social-links clearfix">
                        <?php foreach ($settings['social_icons'] as $social_icon) : ?>
                            <li><a href="<?php echo esc_url($social_icon['social_url']['url']); ?>"><span class="fab <?php echo esc_attr($social_icon['social_icon']); ?>"></span></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div><!-- /.footer-widget -->
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="auto-container">
                    <div class="inner clearfix">
                        <div class="copyright"><?php echo wp_kses($settings['copyright_text'], 'linoor_allowed_tags'); ?></div>
                    </div>
                </div>
            </div>

        </footer>

<?php
    }

    protected function _content_template()
    {
    }
}
