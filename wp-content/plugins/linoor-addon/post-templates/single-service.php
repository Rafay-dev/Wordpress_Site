<?php
get_header(); ?>


<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">

            <!--Content Side-->
            <div class="content-side col-lg-8 col-md-12 col-sm-12">
                <div class="service-details">
                    <div class="main-image image">
                        <?php the_post_thumbnail('linoor_service_details_770X424'); ?>
                    </div>
                    <div class="text-content">
                        <h3><?php the_title(); ?></h3>
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>

            <!--Sidebar Side-->
            <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                <aside class="sidebar blog-sidebar">

                    <div class="sidebar-widget services">
                        <div class="widget-inner">
                            <div class="sidebar-title">
                                <h4><?php echo wp_kses(get_theme_mod('linoor_sidebar_menu_title', __('Need Linoor Help?', 'linoor')), 'linoor_allowed_tags'); ?></h4>
                            </div>
                            <?php if (!empty(get_theme_mod('linoor_sidebar_menu_item'))) : ?>
                                <?php wp_nav_menu(array(
                                    'menu' => get_theme_mod('linoor_sidebar_menu_item'),
                                    'menu_class' => 'list-unstyled m-0'
                                )); ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="sidebar-widget call-up">
                        <div class="widget-inner">
                            <div class="sidebar-title">
                                <h4><?php echo wp_kses(get_theme_mod('linoor_sidebar_contact_title', __('Need Linoor Help?', 'linoor')), 'linoor_allowed_tags'); ?></h4>
                            </div>
                            <div class="text"><?php echo wp_kses(get_theme_mod('linoor_sidebar_contact_text', __('Default Text?', 'linoor')), 'linoor_allowed_tags'); ?></div>
                            <div class="phone"><a href="<?php echo esc_url(get_theme_mod('linoor_sidebar_contact_number_link', __('#', 'linoor'))); ?>"><span class="icon flaticon-call"></span><?php echo esc_html(get_theme_mod('linoor_sidebar_contact_number', __('666 888 000', 'linoor'))); ?></a></div>
                        </div>
                    </div>


                </aside>
            </div>

        </div>
    </div>
</div>



<!-- Call To Section -->
<section class="call-to-section-two alternate">
    <div class="auto-container">
        <div class="inner clearfix">
            <h2><?php echo wp_kses(get_theme_mod('linoor_theme_service_cta_title', __('Default title', 'linoor')), 'linoor_allowed_tags'); ?></h2>
            <div class="link-box">
                <a class="theme-btn btn-style-two" href="<?php echo esc_url(get_theme_mod('linoor_theme_service_cta_btn_url', __('#', 'linoor'))); ?>">
                    <i class="btn-curve"></i>
                    <span class="btn-title"><?php echo wp_kses(get_theme_mod('linoor_theme_service_cta_btn_label', __('button label', 'linoor')), 'linoor_allowed_tags'); ?></span>
                </a>
            </div>
        </div>
    </div>
</section>


<?php
get_footer();
