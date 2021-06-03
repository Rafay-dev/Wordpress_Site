<?php

namespace Layerdrops\Linoor;

class Assets
{

    /**
     * Class constructor
     */
    function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'register_assets']);
        add_action('admin_enqueue_scripts', [$this, 'register_assets']);
    }

    /**
     * All available scripts
     *
     * @return array
     */
    public function get_scripts()
    {
        return [
            'appear' => [
                'src'     => LINOOR_ADDON_ASSETS . '/vendors/appear/appear.js',
                'version' => filemtime(LINOOR_ADDON_PATH . '/assets/vendors/appear/appear.js'),
                'deps'    => ['jquery']
            ],
            'jquery-ajaxchimp' => [
                'src'     => LINOOR_ADDON_ASSETS . '/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js',
                'version' => filemtime(LINOOR_ADDON_PATH . '/assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js'),
                'deps'    => ['jquery']
            ],
            'knob' => [
                'src'     => LINOOR_ADDON_ASSETS . '/vendors/knob/knob.js',
                'version' => filemtime(LINOOR_ADDON_PATH . '/assets/vendors/knob/knob.js'),
                'deps'    => ['jquery']
            ],
            'isotope' => [
                'src'     => LINOOR_ADDON_ASSETS . '/vendors/isotope/isotope.js',
                'version' => filemtime(LINOOR_ADDON_PATH . '/assets/vendors/isotope/isotope.js'),
                'deps'    => ['jquery']
            ],
            'jquery-fancybox' => [
                'src'     => LINOOR_ADDON_ASSETS . '/vendors/jquery-fancybox/jquery.fancybox.js',
                'version' => filemtime(LINOOR_ADDON_PATH . '/assets/vendors/jquery-fancybox/jquery.fancybox.js'),
                'deps'    => ['jquery']
            ],
            'jquery-easing' => [
                'src'     => LINOOR_ADDON_ASSETS . '/vendors/jquery-easing/jquery.easing.min.js',
                'version' => filemtime(LINOOR_ADDON_PATH . '/assets/vendors/jquery-easing/jquery.easing.min.js'),
                'deps'    => ['jquery']
            ],
            'wow' => [
                'src'     => LINOOR_ADDON_ASSETS . '/vendors/wow/wow.js',
                'version' => filemtime(LINOOR_ADDON_PATH . '/assets/vendors/wow/wow.js'),
                'deps'    => ['jquery']
            ],
            'owl-carousel' => [
                'src'     => LINOOR_ADDON_ASSETS . '/vendors/owl-carousel/owl.js',
                'version' => filemtime(LINOOR_ADDON_PATH . '/assets/vendors/owl-carousel/owl.js'),
                'deps'    => ['jquery']
            ],
            'mixitup' => [
                'src'     => LINOOR_ADDON_ASSETS . '/vendors/mixitup/mixitup.js',
                'version' => filemtime(LINOOR_ADDON_PATH . '/assets/vendors/mixitup/mixitup.js'),
                'deps'    => ['jquery']
            ],
            'jarallax' => [
                'src'     => LINOOR_ADDON_ASSETS . '/vendors/jarallax/jarallax.min.js',
                'version' => filemtime(LINOOR_ADDON_PATH . '/assets/vendors/jarallax/jarallax.min.js'),
                'deps'    => ['jquery']
            ],
            'countdown' => [
                'src'     => LINOOR_ADDON_ASSETS . '/vendors/countdown/countdown.js',
                'version' => filemtime(LINOOR_ADDON_PATH . '/assets/vendors/countdown/countdown.js'),
                'deps'    => ['jquery']
            ],
            'linoor-addon-script' => [
                'src'     => LINOOR_ADDON_ASSETS . '/js/linoor-addon.js',
                'version' => filemtime(LINOOR_ADDON_PATH . '/assets/js/linoor-addon.js'),
                'deps'    => ['jquery', 'jquery-ui-core', 'jquery-ui-selectmenu']
            ]
        ];
    }

    /**
     * All available styles
     *
     * @return array
     */
    public function get_styles()
    {
        return [
            'animate' => [
                'src'     => LINOOR_ADDON_ASSETS . '/vendors/animate/animate.min.css',
                'version' => filemtime(LINOOR_ADDON_PATH . '/assets/vendors/animate/animate.min.css')
            ],
            'jquery-fancybox' => [
                'src'     => LINOOR_ADDON_ASSETS . '/vendors/jquery-fancybox/jquery.fancybox.min.css',
                'version' => filemtime(LINOOR_ADDON_PATH . '/assets/vendors/jquery-fancybox/jquery.fancybox.min.css')
            ],
            'owl-carousel' => [
                'src'     => LINOOR_ADDON_ASSETS . '/vendors/owl-carousel/owl.css',
                'version' => filemtime(LINOOR_ADDON_PATH . '/assets/vendors/owl-carousel/owl.css')
            ],
            'jarallax' => [
                'src'     => LINOOR_ADDON_ASSETS . '/vendors/jarallax/jarallax.css',
                'version' => filemtime(LINOOR_ADDON_PATH . '/assets/vendors/jarallax/jarallax.css')
            ],
            'jquery-ui' => [
                'src'     => LINOOR_ADDON_ASSETS . '/vendors/jquery-ui/jquery-ui.css',
                'version' => filemtime(LINOOR_ADDON_PATH . '/assets/vendors/jquery-ui/jquery-ui.css')
            ],
            'linoor-addon-style' => [
                'src'     => LINOOR_ADDON_ASSETS . '/css/linoor-addon.css',
                'version' => filemtime(LINOOR_ADDON_PATH . '/assets/css/linoor-addon.css')
            ],
            'linoor-addon-admin-style' => [
                'src'     => LINOOR_ADDON_ASSETS . '/css/linoor-addon-admin.css',
                'version' => filemtime(LINOOR_ADDON_PATH . '/assets/css/linoor-addon-admin.css')
            ]
        ];
    }

    /**
     * Register scripts and styles
     *
     * @return void
     */
    public function register_assets()
    {
        $scripts = $this->get_scripts();
        $styles  = $this->get_styles();

        foreach ($scripts as $handle => $script) {
            $deps = isset($script['deps']) ? $script['deps'] : false;

            wp_register_script($handle, $script['src'], $deps, $script['version'], true);
        }

        foreach ($styles as $handle => $style) {
            $deps = isset($style['deps']) ? $style['deps'] : false;

            wp_register_style($handle, $style['src'], $deps, $style['version']);
        }
    }
}
