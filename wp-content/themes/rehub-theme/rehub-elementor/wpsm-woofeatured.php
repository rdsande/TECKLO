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
class Widget_Wpsm_Woo_Products_Featured extends WPSM_Widget_Base {
    public function __construct( array $data = [], array $args = null ) {
        parent::__construct( $data, $args );

        // AJAX callbacks
        add_action( 'wp_ajax_get_wc_products_cat_list', [ &$this, 'get_wc_products_cat_list'] );
        add_action( 'wp_ajax_get_wc_products_tag_list', [ &$this, 'get_wc_products_tag_list'] );
        add_action( 'wp_ajax_get_wc_products_posts_list', [ &$this, 'get_products_title_list'] );
    }

    /* Widget Name */
    public function get_name() {
        return 'wpsm_woofeaturedgrid';
    }

    /* Widget Title */
    public function get_title() {
        return __('Woo Featured section', 'rehub-theme');
    }
    public function get_icon() {
        return 'eicon-gallery-group';
    }    
    protected function get_sections() {
        return [
            'general'   => esc_html__('Data query', 'rehub-theme'),
            'taxonomy'  => esc_html__('Additional Taxonomy Query', 'rehub-theme'),
            'control'   => esc_html__('Design Control', 'rehub-theme')
        ];
    }
        protected function control_fields() {
        $this->add_control( 'feat_type', [
            'type'        => \Elementor\Controls_Manager::SELECT,
            'label'       => esc_html__( 'Type of area', 'rehub-theme' ),
            'description' => esc_html__( 'Featured area works only in full width row', 'rehub-theme' ),
            'default'     => '2',
            'options'     => [
                '1'             => esc_html__( 'Featured full width slider', 'rehub-theme' ),
                '2'             => esc_html__( 'Featured grid', 'rehub-theme' )
            ],
            'label_block' => true,
            'dynamic'     => [
                'active'  => true,
            ],
        ]);

        $this->add_control( 'dis_excerpt', [
            'type'        => \Elementor\Controls_Manager::SWITCHER,
            'label'       => esc_html__( 'Disable exerpt?', 'rehub-theme' ),
            'condition'   => [ 'feat_type' => [ '1' ] ],
            'label_on'    => __('Yes', 'rehub-theme'),
            'label_off'   => __('No', 'rehub-theme'),
            'return_value' => '1',
            'dynamic' => [
                'active' => true,
            ],
        ]);

        $this->add_control( 'bottom_style', [
            'type'        => \Elementor\Controls_Manager::SWITCHER,
            'label'       => esc_html__( 'Show text in left bottom side?', 'rehub-theme' ),
            'description' => __( 'Use only if your image is blured', 'rehub-theme' ),
            'condition'   => [ 'feat_type' => [ '1' ] ],
            'label_on'    => __('Yes', 'rehub-theme'),
            'label_off'   => __('No', 'rehub-theme'),
            'return_value' => '1',
            'dynamic' => [
                'active' => true,
            ],
        ]);

        $this->add_control( 'show', [
            'type'        => \Elementor\Controls_Manager::TEXT,
            'label'       => esc_html__( 'Number of posts to show in slider', 'rehub-theme' ),
            'default'     => '5',
            'condition'   => [ 'feat_type' => [ '1' ] ],
            'label_block' => true,
            'dynamic'     => [
                'active'  => true,
            ],
        ]);

        $this->add_control( 'custom_height', [
            'type'        => \Elementor\Controls_Manager::TEXT,
            'label'       => esc_html__( 'Custom height (default is 490) in px', 'rehub-theme' ),
            'condition'   => [ 'feat_type' => [ '1' ] ],
            'label_block' => true,
            'dynamic'     => [
                'active'  => true,
            ],
        ]);
    }

    /* Widget output Rendering */
    protected function render() {
        $settings = $this->get_settings_for_display();
        // Convert arrays to strings
        $this->normalize_arrays( $settings );
        // wp_enqueue_script('flexslider');
        $this->render_custom_js();
        echo wpsm_woofeatured_function( $settings );
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Wpsm_Woo_Products_Featured );
