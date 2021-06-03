<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package linoor
 */

get_header();
?>

<main id="primary" class="site-main">

	<!--Error Section-->
	<section class="error-section">
		<div class="auto-container">
			<div class="content">
				<?php if (!empty(get_theme_mod('error_404_image'))) : ?>
					<img id="error-404" class="img-fluid" src="<?php echo esc_url(get_theme_mod('error_404_image')); ?>" alt="<?php echo esc_html__('error page image', 'linoor'); ?>">
				<?php endif; ?>

				<h2><?php esc_html_e('Sorry We can&rsquo;t Find That Page!', 'linoor'); ?></h2>
				<div class="text"><?php esc_html_e('The page you are looking for was moved, removed, renamed or never existed.', 'linoor'); ?></div>
				<div class="error-form">
					<?php echo get_search_form(); ?>
				</div>
				<div class="link-box">
					<a class="theme-btn btn-style-one" href="<?php echo esc_url(home_url('/')); ?>">
						<i class="btn-curve"></i>
						<span class="btn-title"><?php echo esc_html_e('Back to home', 'linoor'); ?></span>
					</a>
				</div>
			</div>
		</div>
	</section>

</main><!-- #main -->

<?php
get_footer();
