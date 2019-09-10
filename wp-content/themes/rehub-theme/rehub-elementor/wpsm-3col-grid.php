<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit('Restricted Access');
} // Exit if accessed directly

/**
 * Info box Widget class.
 *
 * 'wpsm_box' shortcode
 *
 * @since 1.0.0
 */
class Widget_Wpsm_three_colgrid_Mod extends WPSM_Content_Widget_Base {
    public function __construct( array $data = [], array $args = null ) {
        parent::__construct( $data, $args );

        // AJAX callbacks
        add_action( 'wp_ajax_get_rehub_post_cat_list', [ &$this, 'get_rehub_post_cat_list'] );
        add_action( 'wp_ajax_get_rehub_post_tag_list', [ &$this, 'get_rehub_post_tag_list'] );
        add_action( 'wp_ajax_get_name_posts_list', [ &$this, 'get_products_title_list'] );
    }

    /* Widget Name */
    public function get_name() {
        return 'three_colgrid_mod';
    }

    /* Widget Title */
    public function get_title() {
        return __('3 column grid', 'rehub-theme');
    }

    /**
     * Get widget icon.
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-slider-push';
    } 

    public function get_categories() {
        return [ 'content-modules' ];
    }

    protected function get_sections() {
        return [
            'general'   => esc_html__('Data query', 'rehub-theme'),
            'control'   => esc_html__('Design Control', 'rehub-theme'),
        ];
    }    

    protected function control_fields() {

        $this->add_control( 'dis_meta', [
            'type'        => \Elementor\Controls_Manager::SWITCHER,
            'label'       => esc_html__( 'Disable meta?', 'rehub-theme' ),
            'label_on'    => __('Yes', 'rehub-theme'),
            'label_off'   => __('No', 'rehub-theme'),
            'return_value'      => '1',
            'dynamic' => [
                'active' => true,
            ],
            'selectors' => [
                 '{{WRAPPER}} .post-meta' => 'display:none',
            ],            
        ]);
    }


    /* Widget output Rendering */
    protected function render() {
        $settings = $this->get_settings_for_display();
        $this->normalize_arrays( $settings );
        $this->render_custom_js();
        echo wpsm_three_col_posts_function( $settings );
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Wpsm_three_colgrid_Mod );
