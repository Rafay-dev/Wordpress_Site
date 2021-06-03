<?php

namespace Layerdrops\Linoor;

class Utility
{
    public function __construct()
    {
        $this->register_image_size();
        add_filter('single_template', [$this, 'load_portfolio_template']);
        add_filter('single_template', [$this, 'load_service_template']);
        add_filter('archive_template', [$this, 'load_portfolio_archive_template']);
    }
    public function register_image_size()
    {
        add_image_size('linoor_370X426', 370, 426, true);
        add_image_size('linoor_blog_370X254', 370, 254, true);
        add_image_size('linoor_testimonials_73X73', 73, 73, true);
        add_image_size('linoor_testimonials_125x125', 125, 125, true);
        add_image_size('linoor_service_details_770X424', 770, 424, true);
        add_image_size('linoor_portfolio_details_770X466', 770, 466, true);
        add_image_size('linoor_brand_logo_150X80', 150, 80, true);
        add_image_size('linoor_1170X556', 1170, 556, true);
        add_image_size('linoor_470X426', 470, 426, true);
        add_image_size('linoor_370X426', 370, 426, true);
        add_image_size('linoor_270X270', 270, 270, true);
        add_image_size('linoor_570X0', 570, 0, true);
        add_image_size('linoor_380X0', 380, 0, true);
    }

    public function load_portfolio_template($template)
    {
        global $post;

        if ('portfolio' === $post->post_type && locate_template(array('single-portfolio.php')) !== $template) {
            /*
            * This is a 'portfolio' post
            * AND a 'single portfolio template' is not found on
            * theme or child theme directories, so load it
            * from our plugin directory.
            */
            return LINOOR_ADDON_PATH . '/post-templates/single-portfolio.php';
        }

        return $template;
    }

    public function load_service_template($template)
    {
        global $post;

        if ('service' === $post->post_type && locate_template(array('single-service.php')) !== $template) {
            /*
            * This is a 'service' post
            * AND a 'single service template' is not found on
            * theme or child theme directories, so load it
            * from our plugin directory.
            */
            return LINOOR_ADDON_PATH . '/post-templates/single-service.php';
        }

        return $template;
    }

    public function load_portfolio_archive_template($template)
    {
        global $post;

        if ('portfolio' === $post->post_type && locate_template(array('archive-portfolio.php')) !== $template) {
            /*
            * This is a 'portfolio' post
            * AND a 'archive portfolio template' is not found on
            * theme or child theme directories, so load it
            * from our plugin directory.
            */
            return LINOOR_ADDON_PATH . '/post-templates/archive-portfolio.php';
        }

        return $template;
    }
}
