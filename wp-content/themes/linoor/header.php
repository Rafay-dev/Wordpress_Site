<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package linoor
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<?php $linoor_preloader_status = get_theme_mod('preloader', false); ?>
	<?php if (true === $linoor_preloader_status) : ?>
		<!-- Preloader -->
		<div class="preloader">
			<div class="icon"></div>
		</div>
	<?php endif; ?>

	<?php
	$linoor_get_boxed_wrapper_status = get_theme_mod('linoor_boxed_layout', false);
	$linoor_dynamic_boxed_wrapper_status = isset($_GET['boxed_status']) ? $_GET['boxed_status'] : $linoor_get_boxed_wrapper_status;


	?>

	<div class="page-wrapper <?php echo esc_attr((true == $linoor_dynamic_boxed_wrapper_status) ? 'boxed-wrapper' : ''); ?>">
		<div id="page" class="site">



			<?php $linoor_page_header_status = empty(get_post_meta(get_the_ID(), 'linoor_show_page_banner', true)) ? 'on' : get_post_meta(get_the_ID(), 'linoor_show_page_banner', true);
			$linoor_page_header_status_portfolio = isset($args['page_banner_status']) ? $args['page_banner_status'] : 'on';
			?>


			<!-- theme header -->
			<?php get_template_part('template-parts/header'); ?>

			<?php if (is_page() && 'on' === $linoor_page_header_status) : ?>
				<?php get_template_part('template-parts/page-header'); ?>
			<?php elseif (!is_page() && 'on' === $linoor_page_header_status_portfolio) :  ?>
				<?php get_template_part('template-parts/page-header'); ?>
			<?php endif; ?>