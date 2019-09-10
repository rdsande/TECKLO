<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit('Restricted Access');
} // Exit if accessed directly

/**
 * Prons And Cons Widget class.
 *
 * 'pros_cons_block' shortcode
 *
 * @since 1.0.0
 */
class WPSM_Pros_Cons_Block_Widget extends Widget_Base {

    /* Widget Name */
    public function get_name() {
        return 'pros_cons_block';
    }

    /* Widget Title */
    public function get_title() {
        return __('Prons And Cons Block', 'rehub-theme');
    }

        /**
     * Get widget icon.
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-check-circle';
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
    protected function _register_controls() {
        $this->start_controls_section( 'select_layout_block', [
            'label' => esc_html__( 'Blocks', 'rehub-theme' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);
        $this->add_control( 'select_block', [
            'type'        => \Elementor\Controls_Manager::SELECT,
            'label'       => esc_html__( 'Select Block', 'rehub-theme' ),
            'default'    => 'wpsm_pros_shortcode',
            'options'     => [
                'wpsm_pros_shortcode'       =>  esc_html__('Pros Block', 'rehub-theme'),
                'wpsm_cons_shortcode'       =>  esc_html__('Cons Block', 'rehub-theme'),
            ],
            'label_block'  => true,
        ]);
        $this->end_controls_section();
        $this->wpsm_pros_shortcode_fields();
        $this->wpsm_cons_shortcode_fields();
    }

    protected function wpsm_pros_shortcode_fields() {
        $this->start_controls_section( 'pros_block_section', [
            'label'     => esc_html__( 'Pros Block', 'rehub-theme' ),
            'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
            'condition' => [ 'select_block' => 'wpsm_pros_shortcode' ]
        ]);
        $this->add_control( 'title', [
            'type'        => \Elementor\Controls_Manager::TEXT,
            'label'       => esc_html__( 'Positives', 'rehub-theme' ),
            'default' => 'Positives:',
            'label_block'  => true,
            'dynamic' => [
                'active' => true,
            ],
        ]);
        $this->add_control( 'content', [
            'type'        => \Elementor\Controls_Manager::WYSIWYG,
            'label'       => esc_html__( 'Content', 'rehub-theme' ),
            'label_block'  => true,
            'default' => '<ul><li>Positive one</li><li>Positive two</li><li>Positive three</li></ul>',
            'dynamic' => [
                'active' => true,
            ],
        ]);
        $this->end_controls_section();
    }
    protected function wpsm_cons_shortcode_fields() {
        $this->start_controls_section( 'cons_block_section', [
            'label' => esc_html__( 'Cons Block', 'rehub-theme' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            'condition' => [ 'select_block' => 'wpsm_cons_shortcode' ]
        ]);
        $this->add_control( 'cons_title', [
            'type'        => \Elementor\Controls_Manager::TEXT,
            'label'       => esc_html__( 'Negatives', 'rehub-theme' ),
            'label_block'  => true,
            'default' => 'Negatives:',
            'dynamic' => [
                'active' => true,
            ],
        ]);
        $this->add_control( 'cons_content', [
            'type'        => \Elementor\Controls_Manager::WYSIWYG,
            'label'       => esc_html__( 'Content', 'rehub-theme' ),
            'label_block'  => true,
            'default' => '<ul><li>Negative one</li><li>Negative two</li><li>Negative three</li></ul>',
            'dynamic' => [
                'active' => true,
            ],
        ]);
        $this->end_controls_section();
    }

    /* Widget output Rendering */
    protected function render() {
        $settings = $this->get_settings_for_display();
        if( $settings['select_block'] == 'wpsm_cons_shortcode' ) {
           $settings = $this->replace_key( $settings, [ 'cons_title', 'cons_content' ], [ 'title', 'content' ] );
        }
        echo call_user_func( $settings['select_block'], $settings, $settings['content'] );
    }

    protected function replace_key( &$settings, $elementor_key, $orignal_keys) {
        $keys = array_keys( $settings );
        for ( $i = 0; $i < count( $elementor_key ); $i++ ) {
            if ( false === $index = array_search( $elementor_key[ $i ], $keys )) {
            throw new Exception(sprintf( 'Key "%s" does not exit', $elementor_key[ $i ] ) );
            }
            $keys[$index] =  $orignal_keys[ $i ];
        }
        return array_combine( $keys, array_values( $settings ) );
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new WPSM_Pros_Cons_Block_Widget );
