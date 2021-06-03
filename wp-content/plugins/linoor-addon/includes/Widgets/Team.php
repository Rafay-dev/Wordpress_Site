<?php

namespace Layerdrops\Linoor\Widgets;


class Team extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'linoor-team';
    }

    public function get_title()
    {
        return __('Team', 'linoor-addon');
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
                    'layout_four' => __('Layout Four', 'linoor-addon'),
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
                'label' => __('Post Options', 'linoor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'post_count',
            [
                'label' => __('Number Of Posts', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['count'],
                'range' => [
                    'count' => [
                        'min' => 0,
                        'max' => 15,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'count',
                    'size' => 6,
                ],
            ]
        );


        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <?php if ('layout_one' == $settings['layout_type']) : ?>

            <!-- Team Section -->
            <section class="team-section no-padd-top">
                <div class="auto-container">
                    <?php if (!empty($settings['title'])) : ?>
                        <div class="sec-title centered">
                            <h2><?php echo wp_kses($settings['title'], 'linoor_allowed_tags'); ?></h2>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="carousel-box">
                    <div class="team-carousel owl-theme owl-carousel">
                        <?php $team_post_query_args = array(
                            'post_type' => 'team',
                            'posts_per_page' => $settings['post_count']['size']
                        );
                        $team_post_query = new \WP_Query($team_post_query_args);
                        ?>

                        <?php if ($team_post_query->have_posts()) : ?>
                            <?php while ($team_post_query->have_posts()) : ?>
                                <?php $team_post_query->the_post(); ?>
                                <!--Team-->
                                <div class="team-block">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <?php the_post_thumbnail('linoor_370X426'); ?>
                                            <ul class="social-links clearfix m-0 list-unstyled">
                                                <?php $team_socials = get_post_meta(get_the_ID(), 'linoor_team_social', true); ?>
                                                <?php if (!empty($team_socials)) : ?>
                                                    <?php foreach ($team_socials as $social) : ?>
                                                        <li><a href="<?php echo esc_url($social['linoor_link']); ?>"><span class="fab <?php echo esc_attr($social['linoor_icon']); ?>"></span></a></li>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                        <div class="lower-box">
                                            <h5><?php the_title(); ?></h5>
                                            <div class="designation"><?php echo esc_html(get_post_meta(get_the_ID(), 'linoor_designation', true)); ?></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php if ('layout_two' == $settings['layout_type']) : ?>
            <!-- Team Section -->
            <section class="team-section">
                <div class="auto-container">
                    <?php if (!empty($settings['title'])) : ?>
                        <div class="sec-title centered">
                            <h2><?php echo wp_kses($settings['title'], 'linoor_allowed_tags'); ?></h2>
                        </div>
                    <?php endif; ?>
                    <div class="row clearfix">
                        <?php $team_two_post_query_args = array(
                            'post_type' => 'team',
                            'posts_per_page' => $settings['post_count']['size']
                        );
                        $team_two_post_query = new \WP_Query($team_two_post_query_args);
                        ?>
                        <?php if ($team_two_post_query->have_posts()) : ?>
                            <?php while ($team_two_post_query->have_posts()) : ?>
                                <?php $team_two_post_query->the_post(); ?>

                                <!--Team-->
                                <div class="team-block col-lg-4 col-md-6 col-sm-12">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <?php the_post_thumbnail('linoor_370X426'); ?>
                                            <ul class="social-links clearfix m-0 list-unstyled">
                                                <?php $team_two_socials = get_post_meta(get_the_ID(), 'linoor_team_social', true); ?>
                                                <?php if (!empty($team_two_socials)) : ?>
                                                    <?php foreach ($team_two_socials as $social) : ?>
                                                        <li><a href="<?php echo esc_url($social['linoor_link']); ?>"><span class="fab <?php echo esc_attr($social['linoor_icon']); ?>"></span></a></li>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                        <div class="lower-box">
                                            <h5><?php the_title(); ?></h5>
                                            <div class="designation"><?php echo esc_html(get_post_meta(get_the_ID(), 'linoor_designation', true)); ?></div>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile; ?>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            </section>

        <?php endif; ?>

        <?php if ('layout_three' == $settings['layout_type']) : ?>

            <section class="team-three">
                <div class="auto-container">
                    <?php if (!empty($settings['title'])) : ?>
                        <div class="sec-title centered">
                            <h2><?php echo wp_kses($settings['title'], 'linoor_allowed_tags'); ?></h2>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <?php $team_three_post_query_args = array(
                            'post_type' => 'team',
                            'posts_per_page' => $settings['post_count']['size']
                        );
                        $team_three_post_query = new \WP_Query($team_three_post_query_args);
                        ?>
                        <?php if ($team_three_post_query->have_posts()) : ?>
                            <?php while ($team_three_post_query->have_posts()) : ?>
                                <?php $team_three_post_query->the_post(); ?>
                                <div class="col-md-6 col-lg-3">
                                    <div class="team-card-three">
                                        <div class="team-card-three__inner">
                                            <div class="team-card-three__image">
                                                <?php the_post_thumbnail('linoor_270X270'); ?>
                                            </div><!-- /.team-card-three__image -->
                                            <div class="team-card-three__content">
                                                <h5 class="team-card-three__name"><?php the_title(); ?></h5>
                                                <div class="team-card-three__designation"><?php echo esc_html(get_post_meta(get_the_ID(), 'linoor_designation', true)); ?></div>
                                            </div><!-- /.team-card-three__content -->
                                            <div class="team-card-three__hover">
                                                <h5 class="team-card-three__name"><?php the_title(); ?></h5>
                                                <div class="team-card-three__designation"><?php echo esc_html(get_post_meta(get_the_ID(), 'linoor_designation', true)); ?></div>
                                                <ul class="team-card-three__social clearfix m-0 list-unstyled">
                                                    <?php $team_two_socials = get_post_meta(get_the_ID(), 'linoor_team_social', true); ?>
                                                    <?php if (!empty($team_two_socials)) : ?>
                                                        <?php foreach ($team_two_socials as $social) : ?>
                                                            <li><a href="<?php echo esc_url($social['linoor_link']); ?>"><span class="fab <?php echo esc_attr($social['linoor_icon']); ?>"></span></a></li>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </ul>
                                            </div><!-- /.team-card-three__content -->
                                        </div><!-- /.team-card-three__inner -->
                                    </div><!-- /.team-card-three -->
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div><!-- /.row -->
                </div><!-- /.auto-container -->
            </section><!-- /.team-three -->

        <?php endif; ?>

        <?php if ('layout_four' == $settings['layout_type']) : ?>
            <!-- Team Section -->
            <section class="team-section">
                <div class="auto-container">
                    <?php if (!empty($settings['title'])) : ?>
                        <div class="sec-title centered">
                            <h2><?php echo wp_kses($settings['title'], 'linoor_allowed_tags'); ?></h2>
                        </div>
                    <?php endif; ?>
                    <div class="carousel-box">
                        <div class="team-carousel__one-page owl-theme owl-carousel">
                            <?php $team_two_post_query_args = array(
                                'post_type' => 'team',
                                'posts_per_page' => $settings['post_count']['size']
                            );
                            $team_two_post_query = new \WP_Query($team_two_post_query_args);
                            ?>
                            <?php if ($team_two_post_query->have_posts()) : ?>
                                <?php while ($team_two_post_query->have_posts()) : ?>
                                    <?php $team_two_post_query->the_post(); ?>

                                    <!--Team-->
                                    <div class="team-block">
                                        <div class="inner-box">
                                            <div class="image-box">
                                                <?php the_post_thumbnail('linoor_370X426'); ?>
                                                <ul class="social-links clearfix m-0 list-unstyled">
                                                    <?php $team_two_socials = get_post_meta(get_the_ID(), 'linoor_team_social', true); ?>
                                                    <?php if (!empty($team_two_socials)) : ?>
                                                        <?php foreach ($team_two_socials as $social) : ?>
                                                            <li><a href="<?php echo esc_url($social['linoor_link']); ?>"><span class="fab <?php echo esc_attr($social['linoor_icon']); ?>"></span></a></li>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                            <div class="lower-box">
                                                <h5><?php the_title(); ?></h5>
                                                <div class="designation"><?php echo esc_html(get_post_meta(get_the_ID(), 'linoor_designation', true)); ?></div>
                                            </div>
                                        </div>
                                    </div>

                                <?php endwhile; ?>
                            <?php endif; ?>
                            <?php wp_reset_postdata(); ?>
                        </div><!-- /.team-carousel__one-page owl-theme owl-carousel -->
                    </div><!-- /.carousel-box -->
                </div>
            </section>

        <?php endif; ?>


<?php
    }

    protected function _content_template()
    {
    }
}
