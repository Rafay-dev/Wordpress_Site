<?php

namespace Layerdrops\Linoor\Widgets;


class Blog extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'linoor-blog';
    }

    public function get_title()
    {
        return __('Blog', 'linoor-addon');
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
                ]
            ]
        );



        $this->add_control(
            'pagination_status',
            [
                'label' => __('Enable Pagination?', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'linoor-addon'),
                'label_off' => __('No', 'linoor-addon'),
                'return_value' => 'yes',
                'default' => 'no',
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

            <!-- News Section -->
            <section class="news-section">
                <div class="auto-container">
                    <?php if (!empty($settings['title'])) : ?>
                        <div class="sec-title centered">
                            <h2><?php echo wp_kses($settings['title'], 'linoor_allowed_tags'); ?></h2>
                        </div>
                    <?php endif; ?>

                    <div class="row clearfix">
                        <?php
                        $blog_post_one_query_paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $blog_post_one_query_args = array(
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'ignore_sticky_posts' => true,
                            'paged'          => $blog_post_one_query_paged,
                            'posts_per_page' => $settings['post_count']['size']
                        );
                        $blog_post_one_query = new \WP_Query($blog_post_one_query_args);
                        ?>
                        <?php while ($blog_post_one_query->have_posts()) :
                            $blog_post_one_query->the_post(); ?>
                            <!--News Block-->
                            <div class="news-block col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('linoor_blog_370X254'); ?>
                                        </a>
                                    </div>
                                    <div class="lower-box">
                                        <div class="post-meta">
                                            <ul class="clearfix m-0 list-unstyled">
                                                <li><span class="far fa-clock"></span> <?php echo get_the_date('d M'); ?></li>
                                                <?php if (function_exists('linoor_posted_by')) : ?>
                                                    <li><?php linoor_posted_by(); ?></li>
                                                <?php endif; ?>
                                                <?php if (function_exists('linoor_comment_count') && !is_single() && !post_password_required() && (comments_open() || get_comments_number())) : ?>
                                                    <li><?php linoor_comment_count(); ?></li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                        <?php if (function_exists('linoor_excerpt')) : ?>
                                            <div class="text">
                                                <?php linoor_excerpt(10); ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="link-box"><a class="theme-btn" href="<?php the_permalink(); ?>"><span class="flaticon-next-1"></span></a></div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php if ('yes' == $settings['pagination_status']) : ?>
                            <div class="col-lg-12">
                                <div class="blog-post-pagination">
                                    <?php linoor_custom_query_pagination($blog_post_one_query_paged, $blog_post_one_query->max_num_pages); ?>
                                </div><!-- /.blog-post-pagination -->
                            </div><!-- /.col-lg-12 -->
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            </section>

        <?php endif; ?>


<?php
    }

    protected function _content_template()
    {
    }
}
