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
class Widget_Wpsm_Woo_Products_List extends WPSM_Widget_Base {
    public function __construct( array $data = [], array $args = null ) {
        parent::__construct( $data, $args );

        // AJAX callbacks
        add_action( 'wp_ajax_get_wc_products_cat_list', [ &$this, 'get_wc_products_cat_list'] );
        add_action( 'wp_ajax_get_wc_products_tag_list', [ &$this, 'get_wc_products_tag_list'] );
        add_action( 'wp_ajax_get_wc_products_posts_list', [ &$this, 'get_products_title_list'] );
    }

    /* Widget Name */
    public function get_name() {
        return 'wpsm_woolist';
    }

    /* Widget Title */
    public function get_title() {
        return __('List of woo products', 'rehub-theme');
    }

    public function get_icon() {
        return 'eicon-post-list';
    }    

    protected function get_sections() {
        return [
            'general'   => esc_html__('Data query', 'rehub-theme'),
            'data'      => esc_html__('Data Settings', 'rehub-theme'),
            'taxonomy'  => esc_html__('Additional Taxonomy Query', 'rehub-theme'),
            'filters'   => esc_html__('Filter Panel', 'rehub-theme'),
            'attribute'   => esc_html__('Custom Attribute Panel', 'rehub-theme'),            
        ];
    }

    protected function rehub_filter_values( $haystack ) {
        foreach ( $haystack as $key => $value ) {
            if ( is_array( $value ) ) {
                $haystack[ $key ] = $this->rehub_filter_values( $haystack[ $key ]);
            }

            if ( empty( $haystack[ $key ] ) ) {
                unset( $haystack[ $key ] );
            }
        }

        return $haystack;
    }    

    /* Widget output Rendering */
    protected function render() {
        $settings = $this->get_settings_for_display();
        if ( !empty( $settings['filterpanel'] ) ) {
            $settings['filterpanel'] = $this->rehub_filter_values( $settings['filterpanel'] );
            $settings['filterpanel'] = rawurlencode( json_encode( $settings['filterpanel'] ) );
        }
        if ( !empty( $settings['attrpanel'] ) ) {
            $settings['attrelpanel'] = rawurlencode( json_encode( $settings['attrpanel'] ) );
        }  
        // Convert arrays to strings
        $this->normalize_arrays( $settings );
        $this->render_custom_js();
        echo wpsm_woolist_shortcode( $settings );
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Wpsm_Woo_Products_List );
