<?php

namespace Layerdrops\Linoor\Widgets;


class FooterNavMenu extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'footer-nav-menu';
    }

    public function get_title()
    {
        return __('Footer Nav Menus', 'linoor-addon');
    }

    public function get_icon()
    {
        return 'eicon-cogs';
    }

    public function get_categories()
    {
        return ['linoor-category'];
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'linoor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Add Title', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Explore', 'linoor-addon')
            ]
        );

        $nav_menus = new \Elementor\Repeater();

        $nav_menus->add_control(
            'nav_menu',
            [
                'label' => __('Select Nav Menu', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => linoor_get_nav_menu(),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'nav_menus',
            [
                'label' => __('Nav Menus', 'linoor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $nav_menus->get_controls(),
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <div class="footer-widget links-widget">
            <div class="widget-content">
                <h6><?php echo esc_html($settings['title']); ?></h6>
                <div class="row clearfix">
                    <?php foreach ($settings['nav_menus'] as $nav_menu) : ?>
                        <div class="col-md-6 col-sm-12">
                            <?php wp_nav_menu(array(
                                'menu' => $nav_menu['nav_menu'],
                                'menu_class' => 'list-unstyled m-0'
                            )); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
<?php
    }

    protected function _content_template()
    {
    }
}
