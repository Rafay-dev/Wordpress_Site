<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
					if (have_posts()) :
						/* Start the Loop */
						while (have_posts()) :
							the_post();

							/*
								* Include the Post-Type-specific template for the content.
								* If you want to override this in a child theme, then include a file
								* called content-___.php (where ___ is the Post Type name) and that will be used instead.
								*/
					?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('news-block-two'); ?>>
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

											<?php
											if (is_singular()) :
												the_title('<h4 class="entry-title">', '</h4>');
											else :
												the_title('<h4 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h4>');
											endif; ?>

										</header><!-- .entry-header -->

										<div class="entry-content clearfix text">
											<?php
											linoor_excerpt(40);

											?>

											<div class="link-box"><a class="theme-btn" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'linoor'); ?></a>
											</div><!-- .entry-content -->
										</div><!-- /.lower-box -->
									</div>
							</article><!-- #post-<?php the_ID(); ?> -->

						<?php endwhile; ?>

						<div class="col-lg-12">
							<div class="blog-post-pagination">
								<?php linoor_pagination(); ?>
							</div><!-- /.blog-post-pagination -->
						</div><!-- /.col-lg-12 -->

					<?php else :

						get_template_part('template-parts/content', 'none');

					endif;
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
