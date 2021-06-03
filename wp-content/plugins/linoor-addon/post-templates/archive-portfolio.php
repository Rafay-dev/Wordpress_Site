<?php get_header(); ?>

<!-- Gallery Section -->
<section class="gallery-section">
    <div class="auto-container">
        <!--MixitUp Galery-->
        <div class="mixitup-gallery">
            <!--Filter-->
            <div class="filters centered clearfix">
                <?php

                $linoor_archive_portfolio_category = get_terms('portfolio_cat', array(
                    'hide_empty' => true,
                ));

                ?>

                <?php if (!empty($linoor_archive_portfolio_category) && !is_wp_error($linoor_archive_portfolio_category)) : ?>
                    <!--Filter-->
                    <ul class="filter-tabs m-0 list-unstyled filter-btns clearfix">
                        <li class="active filter" data-role="button" data-filter="all"><?php esc_html_e('All', 'linoor-addon'); ?><sup>[<?php echo esc_html(wp_count_posts('portfolio')->publish); ?>]</sup></li>
                        <?php foreach ($linoor_archive_portfolio_category as $category) : ?>
                            <li class="filter" data-role="button" data-filter=".<?php echo esc_attr($category->slug); ?>"><?php echo esc_html($category->name); ?><sup>[<?php echo esc_html($category->count); ?>]</sup>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

            </div>
            <div class="filter-list row" id="portfolio-posts">
                <?php
                $linoor_archive_portfolio_paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $linoor_archive_portfolio_query = new WP_Query(array(
                    'post_type' => 'portfolio',
                    'paged' => $linoor_archive_portfolio_paged,
                    'posts_per_page' => get_theme_mod('linoor_theme_portfolio_archive_post_count', 9),
                ));
                ?>
                <?php if ($linoor_archive_portfolio_query->have_posts()) : ?>
                    <?php while ($linoor_archive_portfolio_query->have_posts()) : ?>
                        <?php $linoor_archive_portfolio_query->the_post(); ?>
                        <?php $linoor_archive_category =  get_the_terms(get_the_iD(), 'portfolio_cat'); ?>
                        <!-- Gallery Item -->
                        <div class="gallery-item mix all <?php
                                                            foreach ($linoor_archive_category as $cat) {
                                                                echo esc_attr(' ' . $cat->slug);
                                                            }
                                                            ?> col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <figure class="image"><?php the_post_thumbnail('linoor_370X426'); ?></figure>
                                <a href="<?php echo esc_url(get_the_post_thumbnail_url(get_the_iD(), 'full')); ?>" class="lightbox-image overlay-box" data-fancybox="gallery"></a>
                                <div class="cap-box">
                                    <div class="cap-inner">
                                        <div class="cat"><span><?php echo esc_html($linoor_archive_category[0]->name); ?></span></div>
                                        <div class="title">
                                            <h5><a href="<?php the_permalink(); ?>"><?php echo wp_kses(get_the_title(), 'linoor_allowed_tags'); ?></a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>

                    <div class="col-lg-12">
                        <div class="blog-post-pagination">
                            <?php linoor_custom_query_pagination($linoor_archive_portfolio_paged, $linoor_archive_portfolio_query->max_num_pages); ?>
                        </div><!-- /.blog-post-pagination -->
                    </div><!-- /.col-lg-12 -->
                <?php endif; ?>
            </div>
        </div>

    </div>
</section>

<?php get_footer(); ?>