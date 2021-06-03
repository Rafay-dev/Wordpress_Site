<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package linoor
 */

?>


<?php
$linoor_page_id     = get_queried_object_id();
$linoor_custom_footer_status = !empty(get_post_meta($linoor_page_id, 'linoor_custom_footer_status', true)) ? get_post_meta($linoor_page_id, 'linoor_custom_footer_status', true) : 'off';

$linoor_custom_footer_id = '';
if (is_page() && 'on' === $linoor_custom_footer_status) {
	$linoor_custom_footer_id = get_post_meta($linoor_page_id, 'linoor_select_custom_footer', true);
} elseif (true == get_theme_mod('footer_custom')) {
	$linoor_custom_footer_id = get_theme_mod('footer_custom_post');
} else {
	$linoor_custom_footer_id = 'default_footer';
}

$linoor_dynamic_footer = isset($_GET['custom_footer_id']) ? $_GET['custom_footer_id'] : $linoor_custom_footer_id;
?>


<?php if ('default_footer' == $linoor_dynamic_footer) : ?>

	<!-- Main Footer -->
	<footer class="main-footer normal-padding">
		<!-- Footer Bottom -->
		<div class="footer-bottom">
			<div class="auto-container">
				<div class="inner clearfix">
					<?php $linoor_footer_copyright = get_theme_mod('footer_copytext', '&copy; All right reserved'); ?>
					<div class="copyright"><?php echo wp_kses($linoor_footer_copyright, 'linoor_allowed_tags'); ?></div>
				</div>
			</div>
		</div>
	</footer>

<?php else : ?>
	<?php echo do_shortcode('[linoor-footer id="' . $linoor_dynamic_footer . '"]');
	?>
<?php endif; ?>

</div><!-- #page -->

</div><!-- /.page-wrapper -->




<?php wp_footer(); ?>

</body>

</html>