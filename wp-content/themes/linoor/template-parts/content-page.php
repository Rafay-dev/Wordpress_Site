<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package linoor
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-details'); ?>>
	<div class="inner-box">
		<?php linoor_post_thumbnail(); ?>


		<div class="lower-box">

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
		</div><!-- /.lower-box -->

	</div><!-- /.inner-box -->
</article><!-- #post-<?php the_ID(); ?> -->