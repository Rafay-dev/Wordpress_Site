<?php

/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package linoor
 */

if (!function_exists('linoor_posted_on')) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function linoor_posted_on()
	{
		$time_linoortring = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if (get_the_time('U') !== get_the_modified_time('U')) {
			$time_linoortring = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_linoortring = sprintf(
			$time_linoortring,
			esc_attr(get_the_date(DATE_W3C)),
			esc_html(get_the_date()),
			esc_attr(get_the_modified_date(DATE_W3C)),
			esc_html(get_the_modified_date())
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x(' %s', 'post date', 'linoor'),
			'<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_linoortring . '</a>'
		);

		echo '<span class="posted-on"><i class="far fa-clock"></i>' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if (!function_exists('linoor_posted_by')) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function linoor_posted_by()
	{
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x('%s', 'post author', 'linoor'),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
		);

		echo '<span class="byline"><span class="far fa-user-circle"></span> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if (!function_exists('linoor_comment_count')) {
	function linoor_comment_count()
	{
		if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
			echo '<span class="comments-link"><span class="far fa-comments"></span>';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'linoor'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post(get_the_title())
				)
			);
			echo '</span>';
		}
	}
}

if (!function_exists('linoor_entry_footer')) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function linoor_entry_footer()
	{
		// Hide category and tag text for pages.
		if ('post' === get_post_type()) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list(esc_html__(', ', 'linoor'));
			if ($categories_list) {
				/* translators: 1: list of categories. */
				printf('<span class="cat-info cat-links"><strong>' . esc_html__('Posted in %1$s', 'linoor') . '</span>', '</strong>' . $categories_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'linoor'));
			if ($tags_list) {
				/* translators: 1: list of tags. */
				printf('<span class="tags-links tags-info"><strong>' . esc_html__('Tagged %1$s', 'linoor') . '</span>', '</strong>' . $tags_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}
	}
endif;

if (!function_exists('linoor_post_thumbnail')) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function linoor_post_thumbnail()
	{
		if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
			return;
		}

		if (is_singular()) :
?>

			<div class="image-box post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>
			<div class="image-box">
				<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
					<?php
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
					?>
				</a>
			</div><!-- /.image-box -->

<?php
		endif; // End is_singular().
	}
endif;

if (!function_exists('wp_body_open')) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open()
	{
		do_action('wp_body_open');
	}
endif;


if (!function_exists('linoor_pagination')) :
	/**
	 * Prints HTML with post pagination links.
	 */
	function linoor_pagination()
	{
		global $wp_query;
		$links = paginate_links(array(
			'current'   => max(1, get_query_var('paged')),
			'total'     => $wp_query->max_num_pages,
			'prev_text' => '<i class="fa fa-angle-left"></i>',
			'next_text' => '<i class="fa fa-angle-right"></i>',
		));
		echo wp_kses($links, 'linoor_allowed_tags');
	}
endif;

if (!function_exists('linoor_custom_query_pagination')) :
	/**
	 * Prints HTML with post pagination links.
	 */
	function linoor_custom_query_pagination($paged = '', $max_page = '')
	{
		global $wp_query;
		$big = 999999999; // need an unlikely integer
		if (!$paged)
			$paged = get_query_var('paged');
		if (!$max_page)
			$max_page = $wp_query->max_num_pages;

		$links = paginate_links(array(
			'base'       => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
			'format'     => '?paged=%#%',
			'current'    => max(1, $paged),
			'total'      => $max_page,
			'mid_size'   => 1,
			'prev_text' => '<i class="fa fa-angle-left"></i>',
			'next_text' => '<i class="fa fa-angle-right"></i>',
		));

		echo wp_kses($links, 'linoor_allowed_tags');
	}
endif;
