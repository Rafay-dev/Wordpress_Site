<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
							get_template_part('template-parts/content', get_post_type());

						endwhile; ?>

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
