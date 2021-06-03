<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package linoor
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
	</div>
</article><!-- #post-<?php the_ID(); ?> -->