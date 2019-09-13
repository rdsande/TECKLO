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
class WPSM_Cart_Box_Widget extends Widget_Base {

    /* Widget Name */
    public function get_name() {
        return 'wpsm_cartbox';
    }

    /* Widget Title */
    public function get_title() {
        return __('Card Box', 'rehub-theme');
    }

        /**
     * Get widget icon.
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-call-to-action';
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
        $this->start_controls_section( 'cartbox_block_section', [
            'label' => esc_html__( 'Card Box Block', 'rehub-theme' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);
        $this->add_control( 'title', [
            'type'        => \Elementor\Controls_Manager::TEXT,
            'label'       => esc_html__( 'Title', 'rehub-theme' ),
            'label_block'  => true,
            'dynamic' => [
                'active' => true,
            ],
            'default' => 'Title',
        ]);
        $this->add_control( 'description', [
            'type'        => \Elementor\Controls_Manager::TEXT,
            'label'       => esc_html__( 'Description', 'rehub-theme' ),
            'description' => esc_html__( 'Enter the description', 'rehub-theme' ),
            'label_block'  => true,
            'dynamic' => [
                'active' => true,
            ],
            'default' => 'Description',
        ]);
        $this->add_control( 'image', [
            'type'        => \Elementor\Controls_Manager::MEDIA,
            'label'       => esc_html__( 'Image', 'rehub-theme' ),
            'label_block'  => true,
            'dynamic' => [
                'active' => true,
            ],
        ]);
        $this->add_control( 'design', [
            'type'        => \Elementor\Controls_Manager::SELECT,
            'label'       => esc_html__( 'Choose Design', 'rehub-theme' ),
            'default'     => '1',
            'options'     => [
                '1'       =>  esc_html__('Full width image', 'rehub-theme'),
                '2'        =>  esc_html__('Image in Right (compact)', 'rehub-theme'),
            ],
            'label_block' => true,
            'dynamic'     => [
                'active' => true,
            ],
        ]);
        $this->add_control( 'link', [
            'label' => __( 'URL:', 'rehub-theme' ),
            'type' => \Elementor\Controls_Manager::URL,
            'placeholder' => __( 'https://your-link.com', 'rehub-theme' ),
            'description' => __('Will be used on image and title', 'rehub-theme'),
            'show_external' => true,
            'default' => [
                'url' => '',
                'is_external' => true,
                'nofollow' => true,
            ],
        ]);
        $this->add_control( 'linktitle', [
            'type'        => \Elementor\Controls_Manager::TEXT,
            'label'       => esc_html__( 'Link Title', 'rehub-theme' ),
            'label_block'  => true,
            'dynamic' => [
                'active' => true,
            ],
            'default' => 'My link',
        ]);        
        $this->add_control( 'bg_contain', [
            'type'        => \Elementor\Controls_Manager::SWITCHER,
            'label'       => esc_html__( 'Make background image contain?', 'rehub-theme' ),
            'condition'   => [ 'design' => '1' ],
            'label_on'    => __('Yes', 'rehub-theme'),
            'label_off'   => __('No', 'rehub-theme'),
            'default'     => 'yes',
            'dynamic' => [
                'active' => true,
            ],
        ]);
        $this->add_control( 'revert_image', [
            'type'        => \Elementor\Controls_Manager::SWITCHER,
            'label'       => esc_html__( 'Show image first?', 'rehub-theme' ),
            'condition'   => [ 'design' => '1' ],
            'label_on'    => __('Yes', 'rehub-theme'),
            'label_off'   => __('No', 'rehub-theme'),
            'default'     => 'yes',
            'dynamic' => [
                'active' => true,
            ],
        ]);
        $this->add_control( 'revert_title', [
            'type'        => \Elementor\Controls_Manager::SWITCHER,
            'label'       => esc_html__( 'Show subtitle first?', 'rehub-theme' ),
            'condition'   => [ 'design' => '1' ],
            'label_on'    => __('Yes', 'rehub-theme'),
            'label_off'   => __('No', 'rehub-theme'),
            'dynamic' => [
                'active' => true,
            ],
        ]);        
        $this->add_control( 'imheight', [
            'type'    => \Elementor\Controls_Manager::NUMBER,
            'condition'   => [ 'design' => '1' ],
            'label'       => esc_html__( 'Image height', 'rehub-theme' ),
            'min'     => 1,
            'max'     => 1000,
            'step'    => 1,            
            'dynamic'     => [
                'active'  => true,
            ],
            'selectors' => [
                '{{WRAPPER}} .categoriesbox-bg' => 'height: {{VALUE}}px',
            ],            
        ]);  
        $this->add_control( 'cardpadding', [
            'type'    => \Elementor\Controls_Manager::NUMBER,
            'condition'   => [ 'design' => '1' ],
            'label'       => esc_html__( 'Padding', 'rehub-theme' ),
            'min'     => 0,
            'max'     => 100,
            'step'    => 1, 
            'default' => 0,           
            'dynamic'     => [
                'active'  => true,
            ],
            'selectors' => [
                '{{WRAPPER}} .rh-cartbox' => 'padding: {{VALUE}}px',
            ],            
        ]); 
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'maintitletypo',
                'label' => __( 'Title Typography', 'rehub-theme' ),
                'selector' => '{{WRAPPER}} .categoriesbox h3',
                'condition'   => [ 'design' => '1' ],
            ]
        );   

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitletypo',
                'label' => __( 'SubTitle Typography', 'rehub-theme' ),
                'selector' => '{{WRAPPER}} .categoriesbox p',
                'condition'   => [ 'design' => '1' ],
            ]
        ); 
        $this->add_control( 'colortext', [
            'label' => __( 'Title Color', 'rehub-theme' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'condition'   => [ 'design' => '1' ],
            'selectors' => [
                '{{WRAPPER}} {{WRAPPER}} .categoriesbox h3 a' => 'color: {{VALUE}}',
            ], 
        ]);

        $this->add_control( 'colorsubtext', [
            'label' => __( 'Subtitle Color', 'rehub-theme' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'condition'   => [ 'design' => '1' ],
            'selectors' => [
                '{{WRAPPER}} .categoriesbox p' => 'color: {{VALUE}}',
            ],
        ]);                              

        $this->end_controls_section();
    }

    /* Widget output Rendering */
    protected function render() {
        $settings = $this->get_settings_for_display();

        $settings['image'] = $settings['image']['id'];
        echo wpsm_cartbox_shortcode( $settings );
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new WPSM_Cart_Box_Widget );
