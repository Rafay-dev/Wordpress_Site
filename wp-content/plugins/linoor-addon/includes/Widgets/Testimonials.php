<?php

namespace Layerdrops\Linoor\Widgets;


class Testimonials extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'linoor-testimonials';
    }

    public function get_title()
    {
        return __('Testimonials', 'linoor-addon');
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
                    'layout_five' => __('Layout Five', 'linoor-addon'),
                    'layout_six' => __('Layout Six', 'linoor-addon'),
                ]
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'linoor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
                'condition' => [
                    'layout_type' => 'layout_three'
                ]
            ]
        );


        $this->add_control(
            'title',
            [
                'label' => __('Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Awesome Title', 'linoor-addon'),
                'condition' => [
                    'layout_type' => ['layout_one', 'layout_five']
                ]
            ]
        );

        $this->add_control(
            'sub_text',
            [
                'label' => __('Sub Text', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Default Text', 'linoor-addon'),
                'condition' => [
                    'layout_type' => 'layout_five'
                ]
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

        <?php if ('layout_one' === $settings['layout_type']) : ?>
            <!--Testimonials Section-->
            <section class="testimonials-section">
                <div class="auto-container">

                    <?php if (!empty($settings['title'])) : ?>
                        <div class="sec-title">
                            <h2><?php echo wp_kses($settings['title'], 'linoor_allowed_tags'); ?></h2>
                        </div>
                    <?php endif; ?>


                    <div class="carousel-box">
                        <div class="testimonials-carousel owl-theme owl-carousel">
                            <?php $testimonials_post_query = new \WP_Query(array(
                                'post_type' => 'testimonial',
                                'posts_per_page' => $settings['post_count']['size']
                            )); ?>
                            <?php while ($testimonials_post_query->have_posts()) : ?>
                                <?php $testimonials_post_query->the_post(); ?>
                                <div class="testi-block">
                                    <div class="inner">
                                        <div class="icon"><span>“</span></div>
                                        <div class="info">
                                            <div class="image"><?php the_post_thumbnail('linoor_testimonials_73X73'); ?></div>
                                            <div class="name"><?php the_title(); ?></div>
                                            <div class="designation"><?php echo esc_html(get_post_meta(get_the_ID(), 'linoor_designation', true)); ?></div>
                                        </div>
                                        <div class="text"><?php echo wp_kses(get_post_meta(get_the_ID(), 'linoor_content', true), 'linoor_allowed_tags'); ?></div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>


        <?php if ('layout_two' === $settings['layout_type']) : ?>

            <!--Testimonials Section-->
            <section class="testimonials-section testimonials-page">
                <div class="auto-container">
                    <div class="row clearfix">
                        <?php $testimonials_layout_two_post_query = new \WP_Query(array(
                            'post_type' => 'testimonial',
                            'posts_per_page' => $settings['post_count']['size']
                        )); ?>
                        <?php while ($testimonials_layout_two_post_query->have_posts()) : ?>
                            <?php $testimonials_layout_two_post_query->the_post(); ?>
                            <div class="testi-block col-lg-6 col-md-12 col-sm-12 ">
                                <div class="inner">
                                    <div class="icon"><span>“</span></div>
                                    <div class="info">
                                        <div class="image"><?php the_post_thumbnail('linoor_testimonials_73X73'); ?></div>
                                        <div class="name"><?php the_title(); ?></div>
                                        <div class="designation"><?php echo esc_html(get_post_meta(get_the_ID(), 'linoor_designation', true)); ?></div>
                                    </div>
                                    <div class="text"><?php echo wp_kses(get_post_meta(get_the_ID(), 'linoor_content', true), 'linoor_allowed_tags'); ?></div>
                                </div>
                            </div>

                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>

                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php if ('layout_three' === $settings['layout_type']) : ?>

            <!-- Testimonials Section -->
            <section class="testimonials-section-two jarallax" data-jarallax data-speed="0.3" data-imgPosition="50% 50%">
                <img class="jarallax-img image-layer" src="<?php echo esc_attr($settings['background_image']['url']); ?>" alt="" />
                <div class="auto-container">
                    <div class="carousel-box">
                        <div class="testimonials-carousel-two owl-theme owl-carousel">
                            <?php $testimonials_layout_three_post_query = new \WP_Query(array(
                                'post_type' => 'testimonial',
                                'posts_per_page' => $settings['post_count']['size']
                            )); ?>
                            <?php while ($testimonials_layout_three_post_query->have_posts()) : ?>
                                <?php $testimonials_layout_three_post_query->the_post(); ?>
                                <div class="testi-block-two">
                                    <div class="inner">
                                        <div class="icon"><span>“</span></div>
                                        <div class="text"><?php echo wp_kses(wp_trim_words(get_post_meta(get_the_ID(), 'linoor_content', true), 22, ''), 'linoor_allowed_tags'); ?></div>
                                        <div class="info">
                                            <div class="name"><?php the_title(); ?></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Funfacts Section -->
        <?php endif; ?>

        <?php if ('layout_four' === $settings['layout_type']) : ?>
            <section class="testimonials-four">
                <div class="auto-container">
                    <div class="row">
                        <?php $testimonials_layout_four_post_query = new \WP_Query(array(
                            'post_type' => 'testimonial',
                            'posts_per_page' => $settings['post_count']['size']
                        )); ?>
                        <?php if ($testimonials_layout_four_post_query->have_posts()) : ?>
                            <?php while ($testimonials_layout_four_post_query->have_posts()) : ?>
                                <?php $testimonials_layout_four_post_query->the_post(); ?>
                                <div class="col-md-6 col-lg-4">
                                    <div class="testimonials-four-card">
                                        <div class="testimonials-four-card__content">
                                            <p><?php echo wp_kses(wp_trim_words(get_post_meta(get_the_ID(), 'linoor_content', true), 22, ''), 'linoor_allowed_tags'); ?></p>
                                            <div class="name"><?php the_title(); ?></div>
                                            <div class="designation"><?php echo esc_html(get_post_meta(get_the_ID(), 'linoor_designation', true)); ?></div>
                                        </div><!-- /.testimonials-four-card__content -->
                                        <div class="image"><?php the_post_thumbnail('linoor_testimonials_73X73'); ?></div>
                                    </div><!-- /.testimonials-four-card -->
                                </div><!-- /.col-md-6 col-lg-4 -->

                            <?php endwhile; ?>
                        <?php endif; ?>

                    </div><!-- /.row -->
                </div><!-- /.auto-container -->
            </section><!-- /.testimonials-four -->
        <?php endif; ?>

        <?php if ('layout_five' === $settings['layout_type']) : ?>
            <section class="testimonials-four">
                <div class="auto-container">
                    <div class="testimonials-four__block__top">
                        <?php if (!empty($settings['title'])) : ?>
                            <div class="sec-title">
                                <h2><?php echo wp_kses($settings['title'], 'linoor_allowed_tags'); ?></h2>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($settings['sub_text'])) : ?>
                            <div class="block-text">
                                <p><?php echo wp_kses($settings['sub_text'], 'linoor_allowed_tags'); ?></p>
                            </div>
                        <?php endif; ?>

                    </div><!-- /.testimonials-four__block__top -->
                    <div class="testimonials-four-carousel owl-carousel owl-theme">
                        <?php $testimonials_layout_four_post_query = new \WP_Query(array(
                            'post_type' => 'testimonial',
                            'posts_per_page' => $settings['post_count']['size']
                        )); ?>
                        <?php if ($testimonials_layout_four_post_query->have_posts()) : ?>
                            <?php while ($testimonials_layout_four_post_query->have_posts()) : ?>
                                <?php $testimonials_layout_four_post_query->the_post(); ?>
                                <div class="item">
                                    <div class="testimonials-four-card">
                                        <div class="testimonials-four-card__content">
                                            <p><?php echo wp_kses(wp_trim_words(get_post_meta(get_the_ID(), 'linoor_content', true), 22, ''), 'linoor_allowed_tags'); ?></p>
                                            <div class="name"><?php the_title(); ?></div>
                                            <div class="designation"><?php echo esc_html(get_post_meta(get_the_ID(), 'linoor_designation', true)); ?></div>
                                        </div><!-- /.testimonials-four-card__content -->
                                        <div class="image"><?php the_post_thumbnail('linoor_testimonials_73X73'); ?></div>
                                    </div><!-- /.testimonials-four-card -->
                                </div><!-- /.item -->

                            <?php endwhile; ?>
                        <?php endif; ?>

                    </div><!-- /.row -->
                </div><!-- /.auto-container -->
            </section><!-- /.testimonials-four -->
        <?php endif; ?>

        <?php if ('layout_six' === $settings['layout_type']) : ?>

            <section class="testimonials-five">
                <div class="auto-container">
                    <?php if (!empty($settings['title'])) : ?>
                        <div class="sec-title text-center">
                            <h2><?php echo wp_kses($settings['title'], 'linoor_allowed_tags'); ?></h2>
                        </div><!-- /.sec-title -->

                    <?php endif; ?>

                    <div class="testimonials-carousel-two owl-theme owl-carousel testimonials-five__carousel">

                        <?php $testimonials_layout_six_post_query = new \WP_Query(array(
                            'post_type' => 'testimonial',
                            'posts_per_page' => $settings['post_count']['size']
                        )); ?>
                        <?php if ($testimonials_layout_six_post_query->have_posts()) : ?>
                            <?php while ($testimonials_layout_six_post_query->have_posts()) : ?>
                                <?php $testimonials_layout_six_post_query->the_post(); ?>

                                <div class="item">
                                    <div class="testimonials-five-card">
                                        <?php the_post_thumbnail('linoor_testimonials_125x125', ['class' => 'testimonials-five-card__image']); ?>
                                        <p class="testimonials-five-card__text"><?php echo wp_kses(wp_trim_words(get_post_meta(get_the_ID(), 'linoor_content', true), 22, ''), 'linoor_allowed_tags'); ?></p>
                                        <h3 class="testimonials-five-card__title">
                                            <?php the_title(); ?>
                                        </h3><!-- /.testimonials-five-card__title -->
                                        <span class="testimonials-five-card__designation">
                                            <?php echo esc_html(get_post_meta(get_the_ID(), 'linoor_designation', true)); ?>
                                        </span><!-- /.testimonials-five-card__designation -->
                                    </div><!-- /.testimonials-five-card -->
                                </div><!-- /.item -->
                            <?php endwhile; ?>
                        <?php endif; ?>

                    </div><!-- /.testimonials-carousel-two owl-theme owl-carousel -->
                </div><!-- /.auto-container -->
            </section><!-- /.testimonials-five -->
        <?php endif; ?>

<?php
    }

    protected function _content_template()
    {
    }
}
