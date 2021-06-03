<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package linoor
 */

get_header();
?>

<div class="sidebar-page-container">
	<div class="auto-container">
		<div class="row clearfix">
			<!--Content Side-->
			<div class="content-side <?php echo esc_attr(is_active_sidebar('sidebar-1') ? 'col-lg-8' : ''); ?> col-md-12 col-sm-12">
				<main id="primary" class="site-main blog-posts">

					<?php
					while (have_posts()) :
						the_post();

					?>
						<article id="post-<?php the_ID(); ?>" <?php post_class('post-details'); ?>>
							<div class="inner-box">
								<?php linoor_post_thumbnail(); ?>

								<div class="lower-box">
									<header class="entry-header">
										<?php if ('post' === get_post_type()) : ?>
											<div class="post-meta">
												<ul class="clearfix list-unstyled m-0 p-0">
													<li><?php linoor_posted_on(); ?></li>
													<li><?php linoor_posted_by(); ?></li>
													<?php if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) : ?>
														<li><?php linoor_comment_count(); ?></li>
													<?php endif; ?>
												</ul>
											</div><!-- .post-meta -->
										<?php endif; ?>
									</header><!-- .entry-header -->

									<div class="entry-content clearfix text">
										<?php
										the_content();

										wp_link_pages(
											array(
												'before' => '<div class="page-links">' . esc_html__('Pages:', 'linoor'),
												'after'  => '</div>',
											)
										);

										?>
									</div><!-- .entry-content -->

									<div class="entry-footer info-row">
										<?php linoor_entry_footer(); ?>
									</div><!-- /.entry-footer -->
								</div><!-- /.lower-box -->
							</div><!-- /.inner-box -->
						</article><!-- #post-<?php the_ID(); ?> -->

					<?php

						// If comments are open or we have at least one comment, load up the comment template.
						if (comments_open() || get_comments_number()) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>



				</main><!-- #main -->
			</div>

			<?php if (is_active_sidebar('sidebar-1')) : ?>
				<!--Sidebar Side-->
				<div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
					<aside class="sidebar blog-sidebar">
						<?php get_sidebar(); ?>
					</aside>
				</div>
			<?php endif; ?>

		</div>
	</div>
</div>

<?php
get_footer();
