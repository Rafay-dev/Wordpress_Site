<?php

namespace Layerdrops\Linoor\Widgets;


class Header extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'linoor-header';
    }

    public function get_title()
    {
        return __('Header', 'linoor-addon');
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
                'label' => __('Layout Type', 'linoor-addon'),
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
            'logo_section',
            [
                'label' => __('Site Logo', 'linoor-addon'),
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
            'sticky_logo',
            [
                'label' => __('Add Sticky Logo', 'linoor-addon'),
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


        $this->end_controls_section();

        $this->start_controls_section(
            'nav_section',
            [
                'label' => __('Navigation', 'linoor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'nav_menu',
            [
                'label' => __('Select Nav Menu', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => linoor_get_nav_menu(),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'others_section',
            [
                'label' => __('Others', 'linoor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );



        $this->add_control(
            'search_status',
            [
                'label' => __('Enable Search?', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'linoor-addon'),
                'label_off' => __('No', 'linoor-addon'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'call_text',
            [
                'label' => __('Call Text'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Call Anytime', 'linoor-addon'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'call_number',
            [
                'label' => __('Call Number'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('666 000 888', 'linoor-addon'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'call_url',
            [
                'label' => __('Call URL'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('#', 'linoor-addon'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'mobile_menu_section',
            [
                'label' => __('Mobile Drawer', 'linoor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'mobile_menu_logo',
            [
                'label' => __('Mobile Drawer Logo', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );



        $this->add_control(
            'mobile_menu_text',
            [
                'label' => __('Mobile Drawer Content'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Default Text', 'linoor-addon'),
                'label_block' => true,
            ]
        );

        $mobile_menu_social_icons = new \Elementor\Repeater();

        $mobile_menu_social_icons->add_control(
            'social_icon',
            [
                'label' => __('Select Icon', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => linoor_get_fa_icons(),
                'default' => 'fa-facebook-f',
                'label_block' => true,
            ]
        );

        $mobile_menu_social_icons->add_control(
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
            'mobile_menu_social_icons',
            [
                'label' => __('Social Icons', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $mobile_menu_social_icons->get_controls(),
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



        <?php $linoor_sticky_menu_class = get_theme_mod('header_stricked_menu', true) && !is_admin_bar_showing() ? 'sticky-menu' : ''; ?>
        <?php $search_status = $settings['search_status']; ?>


        <?php if ('layout_one' === $settings['layout_type']) : ?>

            <!-- Main Header -->
            <header class="main-header header-style-one <?php echo esc_attr($linoor_sticky_menu_class); ?>">



                <!-- Header Upper -->
                <div class="header-upper">
                    <div class="inner-container clearfix">
                        <!--Logo-->
                        <div class="logo-box">
                            <div class="logo"><a href="<?php echo esc_url(home_url('/')); ?>"><img width="<?php echo esc_attr($settings['logo_dimension']['width']); ?>" height="<?php echo esc_attr($settings['logo_dimension']['height']); ?>" src="<?php echo esc_attr($settings['logo']['url']); ?>" id="thm-logo" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"></a></div>
                        </div>
                        <div class="nav-outer clearfix">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler"><span class="icon flaticon-menu-2"></span><span class="txt"><?php esc_html_e('Menu', 'linoor'); ?></span></div>

                            <!-- Main Menu -->
                            <nav class="main-menu navbar-expand-md navbar-light">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <?php
                                    wp_nav_menu(
                                        array(
                                            'menu' => $settings['nav_menu'],
                                            'menu_class' => 'navigation clearfix',
                                        )
                                    );
                                    ?>
                                </div>
                            </nav>
                        </div>

                        <div class="other-links clearfix">
                            <?php $search_status = $settings['search_status']; ?>
                            <?php if (('yes' == $search_status)) : ?>
                                <!--Search Btn-->
                                <div class="search-btn">
                                    <button type="button" class="theme-btn search-toggler"><span class="flaticon-loupe"></span></button>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($settings['call_text'])) : ?>
                                <div class="link-box">
                                    <div class="call-us">
                                        <a class="link" href="<?php echo esc_url($settings['call_url']); ?>">
                                            <span class="icon"></span>
                                            <span class="sub-text"><?php echo esc_html($settings['call_text']); ?></span>
                                            <span class="number"><?php echo esc_html($settings['call_number']); ?></span>
                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
                <!--End Header Upper-->

            </header>
            <!-- End Main Header -->
        <?php endif; ?>

        <?php if ('layout_two' === $settings['layout_type']) : ?>

            <!-- Main Header -->
            <header class="main-header header-style-two <?php echo esc_attr($linoor_sticky_menu_class); ?>">

                <!-- Header Upper -->
                <div class="header-upper">
                    <div class="inner-container clearfix">
                        <!--Logo-->
                        <div class="logo-box">
                            <div class="logo"><a href="<?php echo esc_url(home_url('/')); ?>">
                                    <img src="<?php echo esc_attr($settings['logo']['url']); ?>" class="main-logo" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" width="<?php echo esc_attr($settings['logo_dimension']['width']); ?>" height="<?php echo esc_attr($settings['logo_dimension']['height']); ?>">
                                    <img src="<?php echo esc_attr($settings['sticky_logo']['url']); ?>" id="thm-logo" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" class="stricked-logo" width="<?php echo esc_attr($settings['logo_dimension']['width']); ?>" height="<?php echo esc_attr($settings['logo_dimension']['height']); ?>">
                                </a></div>
                        </div>
                        <div class="nav-outer clearfix">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler"><span class="icon flaticon-menu-2"></span><span class="txt">Menu</span></div>

                            <!-- Main Menu -->
                            <nav class="main-menu navbar-expand-md navbar-light">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">

                                    <?php
                                    wp_nav_menu(
                                        array(
                                            'menu' => $settings['nav_menu'],
                                            'menu_class' => 'navigation clearfix',
                                        )
                                    );
                                    ?>

                                </div>
                            </nav>
                        </div>

                        <div class="other-links clearfix">
                            <?php $search_status = $settings['search_status']; ?>
                            <?php if (('yes' == $search_status)) : ?>
                                <!--Search Btn-->
                                <div class="search-btn">
                                    <button type="button" class="theme-btn search-toggler"><span class="flaticon-loupe"></span></button>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($settings['call_text'])) : ?>
                                <div class="link-box">
                                    <div class="call-us">
                                        <a class="link" href="<?php echo esc_url($settings['call_url']); ?>">
                                            <span class="icon"></span>
                                            <span class="sub-text"><?php echo esc_html($settings['call_text']); ?></span>
                                            <span class="number"><?php echo esc_html($settings['call_number']); ?></span>
                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
                <!--End Header Upper-->


            </header>
            <!-- End Main Header -->

        <?php endif; ?>

        <?php if ('layout_three' === $settings['layout_type']) : ?>

            <!-- Main Header -->
            <header class="main-header header-style-one header-style-four <?php echo esc_attr($linoor_sticky_menu_class); ?>">

                <!-- Header Upper -->
                <div class="header-upper">
                    <div class="inner-container clearfix">
                        <!--Logo-->
                        <div class="logo-box">
                            <div class="logo"><a href="<?php echo esc_url(home_url('/')); ?>"><img width="<?php echo esc_attr($settings['logo_dimension']['width']); ?>" height="<?php echo esc_attr($settings['logo_dimension']['height']); ?>" src="<?php echo esc_attr($settings['logo']['url']); ?>" id="thm-logo" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"></a></div>
                        </div>
                        <div class="nav-outer clearfix">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler"><span class="icon flaticon-menu-2"></span><span class="txt"><?php esc_html_e('Menu', 'linoor'); ?></span></div>

                            <!-- Main Menu -->
                            <nav class="main-menu navbar-expand-md navbar-light">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <?php
                                    wp_nav_menu(
                                        array(
                                            'menu' => $settings['nav_menu'],
                                            'menu_class' => 'navigation clearfix one-page-scroll-menu',
                                        )
                                    );
                                    ?>
                                </div>
                            </nav>
                        </div>

                        <div class="other-links clearfix">
                            <?php if (('yes' == $search_status)) : ?>
                                <!--Search Btn-->
                                <div class="search-btn">
                                    <button type="button" class="theme-btn search-toggler"><span class="flaticon-loupe"></span></button>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($settings['call_text'])) : ?>
                                <div class="link-box">
                                    <div class="call-us">
                                        <a class="link" href="<?php echo esc_url($settings['call_url']); ?>">
                                            <span class="icon"></span>
                                            <span class="sub-text"><?php echo esc_html($settings['call_text']); ?></span>
                                            <span class="number"><?php echo esc_html($settings['call_number']); ?></span>
                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
                <!--End Header Upper-->


            </header>
            <!-- End Main Header -->

        <?php endif; ?>

        <?php if ('layout_four' === $settings['layout_type']) : ?>

            <!-- Main Header -->
            <header class="main-header header-style-one header-style-four header-style-five <?php echo esc_attr($linoor_sticky_menu_class); ?>">

                <!-- Header Upper -->
                <div class="header-upper">
                    <div class="inner-container clearfix">
                        <!--Logo-->
                        <div class="logo-box">
                            <div class="logo"><a href="<?php echo esc_url(home_url('/')); ?>"><img width="<?php echo esc_attr($settings['logo_dimension']['width']); ?>" height="<?php echo esc_attr($settings['logo_dimension']['height']); ?>" src="<?php echo esc_attr($settings['logo']['url']); ?>" id="thm-logo" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"></a></div>
                        </div>
                        <div class="nav-outer clearfix">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler"><span class="icon flaticon-menu-2"></span><span class="txt"><?php esc_html_e('Menu', 'linoor'); ?></span></div>

                            <!-- Main Menu -->
                            <nav class="main-menu navbar-expand-md navbar-light">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <?php
                                    wp_nav_menu(
                                        array(
                                            'menu' => $settings['nav_menu'],
                                            'menu_class' => 'navigation clearfix',
                                        )
                                    );
                                    ?>
                                </div>
                            </nav>
                        </div>


                    </div>
                </div>
                <!--End Header Upper-->


            </header>
            <!-- End Main Header -->

        <?php endif; ?>


        <?php if ('layout_five' === $settings['layout_type']) : ?>


            <!-- Main Header -->
            <header class="main-header header-style-one header-style-six  <?php echo esc_attr($linoor_sticky_menu_class); ?>">

                <!-- Header Upper -->
                <div class="header-upper">
                    <div class="inner-container clearfix">
                        <!--Logo-->
                        <div class="logo-box">
                            <div class="logo"><a href="<?php echo esc_url(home_url('/')); ?>">
                                    <img src="<?php echo esc_attr($settings['logo']['url']); ?>" class="main-logo" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" width="<?php echo esc_attr($settings['logo_dimension']['width']); ?>" height="<?php echo esc_attr($settings['logo_dimension']['height']); ?>">
                                    <img src="<?php echo esc_attr($settings['sticky_logo']['url']); ?>" id="thm-logo" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" class="stricked-logo" width="<?php echo esc_attr($settings['logo_dimension']['width']); ?>" height="<?php echo esc_attr($settings['logo_dimension']['height']); ?>">
                                </a></div>
                        </div>
                        <div class="nav-outer clearfix">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler"><span class="icon flaticon-menu-2"></span><span class="txt">Menu</span></div>

                            <!-- Main Menu -->
                            <nav class="main-menu navbar-expand-md navbar-light">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <?php
                                    wp_nav_menu(
                                        array(
                                            'menu' => $settings['nav_menu'],
                                            'menu_class' => 'navigation clearfix',
                                        )
                                    );
                                    ?>
                                </div>
                            </nav>
                        </div>

                        <div class="right-menu">
                            <?php if (('yes' == $search_status)) : ?>
                                <!--Search Btn-->
                                <div class="search-btn">
                                    <button type="button" class="theme-btn search-toggler"><span class="flaticon-loupe"></span></button>
                                </div>
                            <?php endif; ?>
                            <div class="mobile-nav-toggler">
                                <span class="bar"></span><!-- /.bar -->
                                <span class="bar"></span><!-- /.bar -->
                                <span class="bar"></span><!-- /.bar -->
                                <span class="txt">Menu</span>
                            </div>
                        </div><!-- /.right-menu -->
                    </div>
                </div>
                <!--End Header Upper-->


            </header>
            <!-- End Main Header -->
        <?php endif; ?>




        <!--Mobile Menu-->
        <div class="side-menu__block">


            <div class="side-menu__block-overlay custom-cursor__overlay">
                <div class="cursor"></div>
                <div class="cursor-follower"></div>
            </div><!-- /.side-menu__block-overlay -->
            <div class="side-menu__block-inner ">
                <div class="side-menu__top justify-content-between">
                    <div class="logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <img width="<?php echo esc_attr($settings['logo_dimension']['width']); ?>" height="<?php echo esc_attr($settings['logo_dimension']['height']); ?>" src="<?php echo esc_attr($settings['mobile_menu_logo']['url']); ?>" id="thm-logo" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                        </a>
                    </div>
                    <a href="#" class="side-menu__toggler side-menu__close-btn"></a>
                </div><!-- /.side-menu__top -->



                <nav class="mobile-nav__container">
                    <!-- content is loading via js -->
                </nav>
                <div class="side-menu__sep"></div><!-- /.side-menu__sep -->
                <div class="side-menu__content">
                    <?php echo wp_kses($settings['mobile_menu_text'], 'linoor_allowed_tags'); ?>
                    <div class="side-menu__social">
                        <?php foreach ($settings['mobile_menu_social_icons'] as $social_icon) : ?>
                            <a href="<?php echo esc_url($social_icon['social_url']['url']); ?>"><i class="fab <?php echo esc_attr($social_icon['social_icon']); ?>"></i></a>

                        <?php endforeach; ?>
                    </div>
                </div><!-- /.side-menu__content -->
            </div><!-- /.side-menu__block-inner -->
        </div><!-- /.side-menu__block -->

        <?php if ('yes' == $search_status) : ?>
            <!--Search Popup-->
            <div class="search-popup">
                <div class="search-popup__overlay custom-cursor__overlay">
                    <div class="cursor"></div>
                    <div class="cursor-follower"></div>
                </div><!-- /.search-popup__overlay -->
                <div class="search-popup__inner">
                    <?php echo get_search_form(); ?>
                </div><!-- /.search-popup__inner -->
            </div><!-- /.search-popup -->
        <?php endif; ?>


        <?php $linoor_back_to_top_status = get_theme_mod('scroll_to_top', false); ?>
        <?php if (true === $linoor_back_to_top_status) : ?>
            <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa <?php echo esc_attr(get_theme_mod('scroll_to_top_icon', 'fa-angle-up')); ?>"></i></a>

        <?php endif; ?>


<?php
    }

    protected function _content_template()
    {
    }
}
