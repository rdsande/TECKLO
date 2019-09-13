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
class WPSM_Hover_Banner_Widget extends Widget_Base {

    /* Widget Name */
    public function get_name() {
        return 'wpsm_hover_banner';
    }

    /* Widget Title */
    public function get_title() {
        return __('Hover Banner', 'rehub-theme');
    }

        /**
     * Get widget icon.
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-image-rollover';
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
        $this->general_controls();
        $this->style_controls();
    }
    protected function general_controls() {
        $this->start_controls_section( 'general_section', [
            'label' => esc_html__( 'General', 'rehub-theme' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control( 'title', [
            'type'        => \Elementor\Controls_Manager::TEXT,
            'label'       => esc_html__( 'Title', 'rehub-theme' ),
            'label_block'  => true,
            'default' => 'Main title',
            'dynamic' => [
                'active' => true,
            ],
        ]);      

        $this->add_control( 'subtitle', [
            'type'        => \Elementor\Controls_Manager::TEXT,
            'label'       => esc_html__( 'Subtitle', 'rehub-theme' ),
            'label_block'  => true,
            'default' => 'Sub title',
            'dynamic' => [
                'active' => true,
            ],
        ]);

        $this->add_control( 'image_id', [
            'label' => __( 'Upload background', 'rehub-theme' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
            'label_block'  => true,
            'dynamic' => [
                'active' => true,
            ],
        ]);

        $this->add_control( 'enable_icon', [
            'type'        => \Elementor\Controls_Manager::SWITCHER,
            'label'       => esc_html__( 'Enable Icon?', 'rehub-theme' ),
            'label_on'    => __('Yes', 'rehub-theme'),
            'label_off'   => __('No', 'rehub-theme'),
            'dynamic' => [
                'active' => true,
            ],
        ]);

        $this->add_control( 'icon', [
            'label' => __( 'Icon', 'rehub-theme' ),
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
                'value' => 'fas fa-gift',
                'library' => 'fa-solid',
            ],            
            'condition'=> [ 'enable_icon' => 'yes' ],
        ]);        

        $this->add_control( 'height', [
            'type' => \Elementor\Controls_Manager::NUMBER,
            'label'       => esc_html__( 'Height, px', 'rehub-theme' ),
            'dynamic' => [
                'active' => true,
            ],
        ]);       

        $this->add_control( 'padding', [
            'type' => \Elementor\Controls_Manager::NUMBER,
            'label'       => esc_html__( 'Padding, px', 'rehub-theme' ),
            'default'     => '40',
            'dynamic' => [
                'active' => true,
            ],
        ]);

        $this->add_control( 'align', [
            'type'        => \Elementor\Controls_Manager::SELECT,
            'label'       => esc_html__( 'Text Position', 'rehub-theme' ),
            'default'    => 'center',
            'options'     => [
                'left'   =>  esc_html__('Left', 'rehub-theme'),
                'right'   =>  esc_html__('Right', 'rehub-theme'),
                'center'   =>  esc_html__('Center', 'rehub-theme')
            ],
            'label_block'  => true,
        ]);

        $this->add_control( 'vertical', [
            'type'        => \Elementor\Controls_Manager::SELECT,
            'label'       => esc_html__( 'Vertical align', 'rehub-theme' ),
            'default'    => 'middle',
            'options'     => [
                'middle'   =>  esc_html__('Middle', 'rehub-theme'),
                'top'   =>  esc_html__('Top', 'rehub-theme'),
                'bottom'   =>  esc_html__('Bottom', 'rehub-theme')
            ],
            'label_block'  => true,
        ]);

        $this->add_control( 'url', [
            'type'        => \Elementor\Controls_Manager::TEXT,
            'label'       => esc_html__( 'Banner URL', 'rehub-theme' ),
            'label_block'  => true,
            'dynamic' => [
                'active' => true,
            ],
        ]);

        $this->add_control( 'targetself', [
            'type'        => \Elementor\Controls_Manager::SWITCHER,
            'label'       => esc_html__( 'Open in the same window?', 'rehub-theme' ),
            'label_on'    => __('Yes', 'rehub-theme'),
            'label_off'   => __('No', 'rehub-theme'),
            'default'     => 'yes',
            'dynamic' => [
                'active' => true,
            ],
        ]);
        $this->add_control( 'overlay', [
            'type'        => \Elementor\Controls_Manager::SWITCHER,
            'label'       => esc_html__( 'Enable Overlay?', 'rehub-theme' ),
            'label_on'    => __('Yes', 'rehub-theme'),
            'label_off'   => __('No', 'rehub-theme'),
            'default'     => '1',
            'return_value' => '1',
            'dynamic' => [
                'active' => true,
            ],
        ]);

        $this->end_controls_section();
    }
    protected function style_controls() {
        $this->start_controls_section( 'style_content', [
            'label' => __( 'Style', 'rehub-theme' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'maintitletypo',
                'label' => __( 'Title Typography', 'rehub-theme' ),
                'selector' => '{{WRAPPER}} .wpsm-banner-wrapper h4',
            ]
        );   

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitletypo',
                'label' => __( 'SubTitle Typography', 'rehub-theme' ),
                'selector' => '{{WRAPPER}} .wpsm-banner-wrapper h6',
            ]
        );                

        $this->add_control( 'bg', [
            'label' => __( 'Set background color', 'rehub-theme' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .wpsm-banner-wrapper .wpsm-banner-image' => 'background-color: {{VALUE}}',
            ],
            'default'     => '#555555',              
        ]);

        $this->add_control( 'color', [
            'label' => __( 'Icon and Hover border Color', 'rehub-theme' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .wpsm-banner-wrapper .wpsm-banner-text i:before' => 'color: {{VALUE}} !important',
                '{{WRAPPER}} .wpsm-banner-wrapper .wpsm-banner-text:after' => 'border-color: {{VALUE}} !important',
                '{{WRAPPER}} .wpsm-banner-wrapper .wpsm-banner-text:before' => 'border-color: {{VALUE}} !important',
            ],
            'default'     => '#ffffff',            
        ]);

        $this->add_control( 'colortext', [
            'label' => __( 'Title Color', 'rehub-theme' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .wpsm-banner-wrapper h4' => 'color: {{VALUE}}',
            ],
            'default'     => '#ffffff', 
        ]);

        $this->add_control( 'colorsubtext', [
            'label' => __( 'Subtitle Color', 'rehub-theme' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .wpsm-banner-wrapper h6' => 'color: {{VALUE}} !important',
            ],
            'default'     => '#ffffff', 
        ]);        

        $this->end_controls_section();
    }

    /* Widget output Rendering */
    protected function render() {
        $settings = $this->get_settings_for_display();

        $settings['image_id'] = $settings['image_id']['id'];
        if(!empty($settings['icon']) && is_array($settings['icon'])){
            $settings['icon'] = $settings['icon']['value'];
        }
        echo wpsm_banner_shortcode( $settings );
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new WPSM_Hover_Banner_Widget );
