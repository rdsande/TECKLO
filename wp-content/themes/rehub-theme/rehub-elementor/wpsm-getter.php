<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit('Restricted Access');
} // Exit if accessed directly

/**
 * Cart Box Widget class.
 *
 *
 * @since 1.0.0
 */
class WPSM_Getter_Widget extends WPSM_Content_Widget_Base {

    public function __construct( array $data = [], array $args = null ) {
        parent::__construct( $data, $args );

        // AJAX callbacks
        add_action( 'wp_ajax_get_name_posts_list', [ &$this, 'get_products_title_list'] );
    }
    /* Widget Name */
    public function get_name() {
        return 'wpsm_get_custom_value';
    }

    /* Widget Title */
    public function get_title() {
        return __('Meta/attribute value', 'rehub-theme');
    }

        /**
     * Get widget icon.
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-code';
    }

    /**
     * category name in which this widget will be shown
     * @since 1.0.0
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories() {
        return [ 'helpler-modules' ];
    }
    protected function get_sections() {
        return [
            'general'   => esc_html__('Settings', 'rehub-theme'),
        ];
    } 
    protected function general_fields() {
        $this->add_control( 'type', [
            'type'        => \Elementor\Controls_Manager::SELECT,
            'label'       => esc_html__( 'Type', 'rehub-theme' ),
            'default'     => 'custom',
            'options'     => [
                'custom'       =>  esc_html__('Custom field', 'rehub-theme'),
                'attribute'        =>  esc_html__('Woocommerce Attribute', 'rehub-theme'),
                'attributelink'        =>  esc_html__('Woocommerce Attribute with Link', 'rehub-theme'),
                'author'        =>  esc_html__('User Meta of author of post', 'rehub-theme'),
                'swatch'        =>  esc_html__('Woocommerce attribute swatch', 'rehub-theme'),
                ],
            'label_block' => true,
            'dynamic'     => [
                'active' => true,
            ],
        ]);
        $this->add_control( 'field', [
            'type'        => \Elementor\Controls_Manager::TEXT,
            'label'       => esc_html__( 'Field', 'rehub-theme' ),
            'description' => esc_html__( 'Required. Set meta field key', 'rehub-theme'),
            'label_block'  => true,
            'dynamic' => [
                'active' => true,
            ],
            'default' => '',
            'condition'  => [ 'type' => [ 'custom', 'author'] ],
        ]);
        $this->add_control( 'attrfield', [
            'type'        => 'select2ajax',
            'label'       => esc_html__( 'Attribute name', 'rehub-theme' ),
            'options'     => [],
            'label_block'  => true,
            'multiple'     => false,
            'callback'    => 'rehub_wpsm_search_woo_attributes',
            'condition'  => [ 'type' => [ 'attribute', 'attributelink', 'swatch' ] ],
        ]);         
        $this->add_control( 'post_id', [
            'type'        => 'select2ajax',
            'label'       => esc_html__( 'Post ID', 'rehub-theme' ),
            'description' => esc_html__( 'Leave Blank to get value from current post', 'rehub-theme' ),
            'options'     => [],
            'label_block'  => true,
            'multiple'     => false,
            'callback'    => 'get_name_posts_list',
        ]); 
        $this->add_control( 'icon', [
            'type'        => \Elementor\Controls_Manager::TEXT,
            'label'       => esc_html__( 'Icon', 'rehub-theme' ),
            'description' => esc_html__( 'Icon class. Example: "fas fa-abacus". If you want to add more margin from right side of icon, add also class "mr5". All classes must be added with space between classes', 'rehub-theme'),
            'label_block'  => true,
            'dynamic' => [
                'active' => true,
            ],
            'default' => '',
        ]);
        $this->add_control( 'label', [
            'type'        => \Elementor\Controls_Manager::TEXT,
            'label'       => esc_html__( 'Label', 'rehub-theme' ),
            'label_block'  => true,
            'dynamic' => [
                'active' => true,
            ],
            'default' => '',
        ]);
        $this->add_control( 'labelclass', [
            'type'        => \Elementor\Controls_Manager::TEXT,
            'label'       => esc_html__( 'Label css class', 'rehub-theme' ),
            'label_block'  => true,
            'dynamic' => [
                'active' => true,
            ],
            'default' => '',
        ]);        
        $this->add_control( 'posttext', [
            'type'        => \Elementor\Controls_Manager::TEXT,
            'label'       => esc_html__( 'Text after value', 'rehub-theme' ),
            'label_block'  => true,
            'dynamic' => [
                'active' => true,
            ],
            'default' => '',
        ]);
        $this->add_control( 'posttextclass', [
            'type'        => \Elementor\Controls_Manager::TEXT,
            'label'       => esc_html__( 'Text css class', 'rehub-theme' ),
            'label_block'  => true,
            'dynamic' => [
                'active' => true,
            ],
            'default' => '',
        ]);          
        $this->add_control( 'showempty', [
            'type'        => \Elementor\Controls_Manager::SWITCHER,
            'label'       => esc_html__( 'Show Empty', 'rehub-theme' ),
            'label_on'    => __('Yes', 'rehub-theme'),
            'label_off'   => __('No', 'rehub-theme'),
            'description' => 'Show value as "-" if value is empty',
            'return_value'=> '1',
            'default'     => '1',
            'dynamic' => [
                'active' => true,
            ],
        ]);                                                
    }


    /* Widget output Rendering */
    protected function render() {
        $settings = $this->get_settings_for_display();
        echo wpsm_get_custom_value( $settings );
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new WPSM_Getter_Widget );
