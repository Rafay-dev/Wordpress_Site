<?php $linoor_portfolio_category =  get_the_terms(get_the_iD(), 'portfolio_cat'); ?>
<?php $linoor_get_single_page_layout = !empty(get_post_meta(get_the_iD(), 'linoor_portfolio_single_layout', true)) ? get_post_meta(get_the_iD(), 'linoor_portfolio_single_layout', true) : 'layout_one'; ?>

<?php if ('layout_three' == $linoor_get_single_page_layout) : ?>
    <?php get_header('', ['page_banner_status' => 'off']); ?>
<?php else : ?>
    <?php get_header(); ?>
<?php endif; ?>

<?php if ('layout_one' == $linoor_get_single_page_layout) : ?>
    <!-- Project Single -->
    <section class="project-single style-two">
        <div class="auto-container">
            <figure class="image-box">
                <a href="<?php echo esc_url(get_the_post_thumbnail_url(get_the_iD(), 'full')); ?>" class="lightbox-image" data-fancybox="gallery"><img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_iD(), 'linoor_1170X556')); ?>" alt=""></a>
            </figure>
            <div class="text-content">
                <div class="row clearfix">
                    <!-- Text COl -->
                    <div class="text-col col-lg-8 col-md-12 col-sm-12">
                        <div class="inner">
                            <h5><?php the_title(); ?></h5>
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <!-- Text COl -->
                    <div class="text-col col-lg-4 col-md-12 col-sm-12">
                        <div class="inner">
                            <ul class="info m-0 list-unstyled">
                                <li><strong><?php esc_html_e('Clients', 'linoor-addon'); ?>:</strong> <br><?php echo esc_html(get_post_meta(get_the_iD(), 'linoor_portfolio_client', true)); ?></li>
                                <li><strong><?php esc_html_e('Category', 'linoor-addon'); ?>:</strong> <br>
                                    <?php foreach ($linoor_portfolio_category as $cat) {
                                        echo '<span>' . esc_attr($cat->name) . '</span>';
                                    } ?>
                                </li>
                                <li><strong><?php esc_html_e('Date', 'linoor-addon'); ?>:</strong> <br><?php echo esc_html(get_post_meta(get_the_iD(), 'linoor_portfolio_date', true)); ?></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <div class="post-control">
        <div class="auto-container">
            <div class="inner clearfix">
                <div class="control prev"><?php echo  get_previous_post_link('%link', '<span class="fa fa-angle-left"></span> &nbsp; ' . __('Previous', 'linoor-addon'))  ?></div>
                <div class="control next"><?php echo get_next_post_link('%link', __('Next', 'linoor-addon') . '&nbsp;<span class="fa fa-angle-right"></span>') ?></div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if ('layout_two' == $linoor_get_single_page_layout) : ?>
    <!-- Project Single -->
    <section class="project-single">
        <div class="auto-container">
            <div class="row clearfix">
                <!-- Images COl -->
                <div class="image-col col-lg-8 col-md-12 col-sm-12">
                    <div class="inner">
                        <?php $linoor_portfolio_single_gallery = get_post_meta(get_the_iD(), 'linoor_portfolio_gallery', true); ?>
                        <?php if (!empty($linoor_portfolio_single_gallery)) : ?>
                            <?php foreach ($linoor_portfolio_single_gallery as $attachment_id => $attachment_url) : ?>
                                <figure class="image-box">
                                    <a href="<?php echo esc_url($attachment_url); ?>" class="lightbox-image" data-fancybox="gallery">
                                        <?php echo wp_get_attachment_image($attachment_id, 'linoor_portfolio_details_770X466'); ?></a>
                                </figure>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </div>
                </div>

                <!-- Text COl -->
                <div class="text-col col-lg-4 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="text-content">
                            <h5><?php the_title(); ?></h5>
                            <?php the_content(); ?>
                            <ul class="info m-0 list-unstyled">
                                <li><strong><?php esc_html_e('Clients', 'linoor-addon'); ?>:</strong> <br><?php echo esc_html(get_post_meta(get_the_iD(), 'linoor_portfolio_client', true)); ?></li>
                                <li><strong><?php esc_html_e('Category', 'linoor-addon'); ?>:</strong> <br>
                                    <?php foreach ($linoor_portfolio_category as $cat) {
                                        echo '<span>' . esc_attr($cat->name) . '</span>';
                                    } ?>
                                </li>
                                <li><strong><?php esc_html_e('Date', 'linoor-addon'); ?>:</strong> <br><?php echo esc_html(get_post_meta(get_the_iD(), 'linoor_portfolio_date', true)); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <div class="post-control">
        <div class="auto-container">
            <div class="inner clearfix">
                <div class="control prev"><?php echo  get_previous_post_link('%link', '<span class="fa fa-angle-left"></span> &nbsp; ' . __('Previous', 'linoor-addon'))  ?></div>
                <div class="control next"><?php echo get_next_post_link('%link', __('Next', 'linoor-addon') . '&nbsp;<span class="fa fa-angle-right"></span>') ?></div>
            </div>
        </div>
    </div>
<?php endif; ?>


<?php if ('layout_three' == $linoor_get_single_page_layout) : ?>
    <section class="portfolio-details-header">
        <div class="auto-container clearfix">
            <h2 class="portfolio-details-header__title"><?php echo get_the_title(); ?></h2>
            <!-- /.portfolio-details-header__title -->
            <div class="clearfix">
                <div class="portfolio-details-header__image">
                    <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_iD(), 'full')); ?>" alt="">
                </div><!-- /.portfolio-details-header__image -->
            </div><!-- /.clearfix -->
            <div class="row flex-lg-row-reverse">
                <div class="col-sm-12 col-md-6">
                    <div class="portfolio-details-header__main-text">
                        <?php the_content(); ?>
                    </div><!-- /.portfolio-details-header__text -->
                </div><!-- /.col-sm-12 col-md-6 -->
                <div class="col-sm-12 col-md-6">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <h3 class="portfolio-details-header__sub-heading"><?php esc_html_e('Project demands:', 'linoor-addon'); ?></h3>
                            <!-- /.portfolio-details-header__sub-heading -->
                            <ul class="list-unstyled portfolio-details-header__list">
                                <?php $linoor_portfolio_single_work_demands = get_post_meta(get_the_ID(), 'linoor_work_demands', true); ?>
                                <?php foreach ($linoor_portfolio_single_work_demands as $work_demand) : ?>
                                    <li><?php echo wp_kses($work_demand['linoor_demands_name'], 'linoor_allowed_tags'); ?></li>
                                <?php endforeach; ?>
                            </ul><!-- /.list-unstyled -->
                            <h3 class="portfolio-details-header__sub-heading">
                                <?php echo esc_html(get_post_meta(get_the_iD(), 'linoor_portfolio_date', true)); ?>
                            </h3><!-- /.portfolio-details-header__sub-heading -->
                            <a href="<?php echo esc_url(get_post_meta(get_the_iD(), 'linoor_portfolio_preview_link', true)); ?>" class="portfolio-details-header__link"><?php esc_html_e('View Website', 'linoor-addon'); ?></a>
                        </div><!-- /.col-sm-12 -->
                        <div class="col-sm-12 col-md-6">
                            <h3 class="portfolio-details-header__sub-heading"><?php esc_html_e('Clients', 'linoor-addon'); ?>:</h3>
                            <!-- /.portfolio-details-header__sub-heading -->
                            <p class="portfolio-details-header__text"><?php echo esc_html(get_post_meta(get_the_iD(), 'linoor_portfolio_client', true)); ?></p>
                            <!-- /.portfolio-details-header__text -->
                            <h3 class="portfolio-details-header__sub-heading"><?php esc_html_e('Category', 'linoor-addon'); ?>:</h3>
                            <!-- /.portfolio-details-header__sub-heading -->
                            <div class="portfolio-details-header__links">
                                <?php foreach ($linoor_portfolio_category as $cat) {
                                    echo '<span>' . esc_attr($cat->name) . '</span>';
                                } ?>
                            </div><!-- /.portfolio-details-header__links -->
                        </div><!-- /.col-sm-12 -->
                    </div><!-- /.row -->
                </div><!-- /.col-sm-12 -->
            </div><!-- /.row -->
            <hr class="portfolio-details-header__separator">
        </div><!-- /.auto-container -->
    </section><!-- /.portfolio-details__header -->

    <section class="portfolio-details-info">
        <div class="auto-container">
            <?php $linoor_portfolio_single_feature_boxes = get_post_meta(get_the_ID(), 'linoor_feature_boxes', true); ?>
            <?php foreach ($linoor_portfolio_single_feature_boxes as $feature_box) : ?>
                <div class="row flex-md-row-reverse">
                    <div class="col-md-6">
                        <div class="portfolio-details-info__image">
                            <img src="<?php echo esc_url($feature_box['linoor_feature_image']); ?>" alt="">
                        </div><!-- /.portfolio-details-info__image -->
                    </div><!-- /.col-md-6 -->
                    <div class="col-md-6 d-flex">
                        <div class="my-auto">
                            <div class="portfolio-details-info__content">
                                <h3 class="portfolio-details-info__title"><?php echo wp_kses($feature_box['linoor_feature_title'], 'linoor_allowed_tags'); ?></h3>
                                <p class="portfolio-details-info__text"><?php echo wp_kses($feature_box['linoor_feature_text'], 'linoor_allowed_tags'); ?></p>
                                <!-- /.portfolio-details-info__text -->
                            </div><!-- /.portfolio-details-info__content -->
                        </div><!-- /.my-auto -->
                    </div><!-- /.col-md-6 -->
                </div><!-- /.row -->
            <?php endforeach; ?>
        </div><!-- /.auto-container -->
    </section><!-- /.portfolio-details-info -->


    <section class="portfolio-details-video">
        <div class="auto-container">
            <div class="portfolio-details-video__thumbnail">
                <img src="<?php echo esc_url(get_post_meta(get_the_ID(), 'linoor_portfolio_video_image', true)); ?>" alt="">
                <div class="vid-link">
                    <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'linoor_portfolio_video_link', true)); ?>" class="lightbox-image">
                        <div class="icon"><span class="flaticon-play-button-1"></span><i class="ripple"></i></div>
                    </a>
                </div><!-- /.vid-link -->
            </div><!-- /.portfolio-details-video__thumbnail -->
        </div><!-- /.auto-container -->
    </section><!-- /.portfolio-details-video -->

    <section class="portfolio-details-summery">
        <div class="auto-container">
            <div class="row">
                <?php $linoor_portfolio_single_summery = get_post_meta(get_the_ID(), 'linoor_summery', true); ?>
                <?php foreach ($linoor_portfolio_single_summery as $summery) : ?>
                    <div class="col-md-6">
                        <h3 class="portfolio-details-summery__heading"><?php echo wp_kses($summery['linoor_summery_title'], 'linoor_allowed_tags'); ?></h3>
                        <!-- /.portfolio-details-summery__heading -->
                        <p class="portfolio-details-summery__text"><?php echo wp_kses($summery['linoor_summery_text'], 'linoor_allowed_tags'); ?></p><!-- /.portfolio-details-summery__text -->
                    </div><!-- /.col-md-6 -->
                <?php endforeach; ?>

            </div><!-- /.row -->
        </div><!-- /.auto-container -->
    </section><!-- /.portfolio-details-summery -->

    <div class="post-control">
        <div class="auto-container">
            <div class="inner clearfix">
                <div class="control prev"><?php echo  get_previous_post_link('%link', '<span class="fa fa-angle-left"></span> &nbsp; ' . __('Previous', 'linoor-addon'))  ?></div>
                <div class="control next"><?php echo get_next_post_link('%link', __('Next', 'linoor-addon') . '&nbsp;<span class="fa fa-angle-right"></span>') ?></div>
            </div>
        </div>
    </div>
<?php endif; ?>



<!-- Similar Section -->
<section class="gallery-section similar-gallery">
    <div class="auto-container">
        <div class="sec-title centered">
            <h2><?php esc_html_e('Similar work', 'linoor-addon'); ?><span class="dot">.</span></h2>
        </div>
        <div class="row clearfix">
            <?php
            $linoor_portfolio_post_query = new WP_Query(array(
                'post_type' => 'portfolio',
                'posts_per_page' => 3,
            ));
            ?>
            <?php while ($linoor_portfolio_post_query->have_posts()) : ?>
                <?php $linoor_portfolio_post_query->the_post(); ?>
                <?php $linoor_similar_post_category =  get_the_terms(get_the_iD(), 'portfolio_cat'); ?>


                <!-- Gallery Item -->
                <div class="gallery-item col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <figure class="image"><?php the_post_thumbnail('linoor_370X426'); ?></figure>
                        <a href="<?php echo esc_url(get_the_post_thumbnail_url(get_the_iD(), 'full')); ?>" class="lightbox-image overlay-box" data-fancybox="gallery"></a>
                        <div class="cap-box">
                            <div class="cap-inner">
                                <div class="cat"><span><?php echo esc_html($linoor_similar_post_category[0]->name); ?></span></div>
                                <div class="title">
                                    <h5><a href="<?php the_permalink(); ?>"><?php echo wp_kses(get_the_title(), 'linoor_allowed_tags'); ?></a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>