<?php

namespace Layerdrops\Linoor\Widgets;


class ComingSoon extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'linoor-coming-soon';
    }

    public function get_title()
    {
        return __('Coming Soon', 'linoor-addon');
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
            'title',
            [
                'label' => __('Add Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Title', 'linoor-addon'),
            ]
        );

        $this->add_control(
            'text',
            [
                'label' => __('Add Text', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add Text', 'linoor-addon'),
            ]
        );

        $this->add_control(
            'countdown_time',
            [
                'label' => __('Add Countdown Time', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Add Date and Time', 'linoor-addon'),
            ]
        );

        $this->add_control(
            'countdown_time_year',
            [
                'label' => __('Enable Year Count', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Enable', 'linoor-addon'),
                'label_off' => __('Disable', 'linoor-addon'),
                'return_value' => 'yes',
                'default' => 'yes',
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
            'background_image',
            [
                'label' => __('Background Image', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'mailchimp_section',
            [
                'label' => __('Mailchimp Section', 'linoor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'mailchimp_title',
            [
                'label' => __('Add Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Explore', 'linoor-addon')
            ]
        );

        $this->add_control(
            'mailchimp_paragraph',
            [
                'label' => __('Add Text', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Some Text', 'linoor-addon'),
            ]
        );
        $this->add_control(
            'mailchimp_url',
            [
                'label' => __('Add Mailchimp URL', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '#',
            ]
        );


        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <?php $linoor_preloader_status = get_theme_mod('preloader', false); ?>
        <?php if (true === $linoor_preloader_status) : ?>
            <!-- Preloader -->
            <div class="preloader">
                <div class="icon"></div>
            </div>
        <?php endif; ?>


        <section class="coming-soon" style="background-image: url(<?php echo esc_url($settings['background_image']['url']); ?>);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="logo-box">
                            <div class="logo"><a href="<?php echo esc_url(home_url('/')); ?>"><img width="<?php echo esc_attr($settings['logo_dimension']['width']); ?>" height="<?php echo esc_attr($settings['logo_dimension']['height']); ?>" src="<?php echo esc_attr($settings['logo']['url']); ?>" id="thm-logo" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"></a></div>
                        </div>
                        <h3 class="coming-soon__title"><?php echo wp_kses($settings['title'], 'linoor_allowed_tags'); ?></h3><!-- /.coming-soon__title -->
                        <p class="coming-soon__text"><?php echo wp_kses($settings['text'], 'linoor_allowed_tags'); ?></p><!-- /.coming-soon__text -->
                        <?php
                        $coundown_year_status = 'yes' == $settings['countdown_time_year'] ? true : false;
                        ?>
                        <ul class="countdown-one__list coming-soon__countdown list-unstyled ml-0" data-leading-zeros="true" data-enable-years="<?php echo esc_attr($coundown_year_status); ?>" data-deadline-date="<?php echo esc_attr($settings['countdown_time']); ?>">
                            <!-- loading via js -->
                        </ul><!-- /.countdown-one__list list-unstyled -->
                        <h3 class="coming-soon__form-title"><?php echo wp_kses($settings['mailchimp_title'], 'linoor_allowed_tags'); ?></h3><!-- /.coming-soon__form-title -->
                        <p class="coming-soon__form-text"><?php echo wp_kses($settings['mailchimp_paragraph'], 'linoor_allowed_tags'); ?></p>
                        <!-- /.coming-soon__text -->
                        <form action="#" data-url="<?php echo esc_html($settings['mailchimp_url']); ?>" class="coming-soon__form mc-form">
                            <input type="email" name="EMAIL" value="" placeholder="<?php esc_html_e('Email Address', 'linoor-addon'); ?>">
                            <button type="submit"><span class="fa fa-envelope"></span></button>
                        </form>
                        <div class="mc-form__response"></div>
                        <ul class="coming-soon__social list-unstyled ml-0">
                            <?php foreach ($settings['social_icons'] as $social_icon) : ?>
                                <li><a href="<?php echo esc_url($social_icon['social_url']['url']); ?>"><span class="fab <?php echo esc_attr($social_icon['social_icon']); ?>"></span></a></li>
                            <?php endforeach; ?>
                        </ul><!-- /.coming-soon__social -->
                    </div><!-- /.col-lg-7 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.coming-soon -->

<?php
    }

    protected function _content_template()
    {
    }
}
