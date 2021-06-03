<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
					while (have_posts()) :
						the_post();

						get_template_part('template-parts/content', 'page');

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
