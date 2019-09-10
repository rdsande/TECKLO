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
class Widget_Reviewbox extends WPSM_Content_Widget_Base {
    public function __construct( array $data = [], array $args = null ) {
        parent::__construct( $data, $args );
        add_action( 'wp_ajax_get_name_posts_list', [ &$this, 'get_products_title_list'] );
    }

    /* Widget Name */
    public function get_name() {
        return 'wpsm-reviewbox';
    }

    /* Widget Title */
    public function get_title() {
        return __('Reviewbox', 'rehub-theme');
    }

    /**
     * Get widget icon.
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-favorite';
    }  

    public function get_categories() {
        return [ 'helpler-modules' ];
    }    

    protected function get_sections() {
        return [
            'query'   => esc_html__('Data query', 'rehub-theme'),
            'general'   => esc_html__('General', 'rehub-theme'),
            'pros'   => esc_html__('Positives', 'rehub-theme'),
            'cons'   => esc_html__('Negatives', 'rehub-theme'),
        ];
    }

    protected function general_fields() {
        $this->add_control(
            'title',
            [
                'label' => __('Title', 'rehub-theme'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Awesome',
                'dynamic'     => ['active' => true,],
            ]
        );    
        $this->add_control(
            'description',
            [
                'label' => __('Description', 'rehub-theme'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Place here Description for your reviewbox',
                'dynamic'     => ['active' => true,],
            ]
        ); 
        $this->add_control(
            'score',
            [
                'label' => __( 'Score Value', 'rehub-theme' ),
                'description' => __( 'By default, score is average between score criterias, but you can add own', 'rehub-theme' ),
                'type' => Controls_Manager::NUMBER,
                'default' => 10,
                'min' => 1,
                'max' => 10,
                'step' => 0.5,
            ]
        ); 
        $this->add_control( 'criteriacolor', [
            'label' => __( 'Set background color or leave blank', 'rehub-theme' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .rate-bar-bar' => 'background-color: {{VALUE}}',
                '{{WRAPPER}} .review-top .overall-score' => 'background-color: {{VALUE}}',
            ],
        ]);        
        $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'criteriatitle', [
                'label' => __( 'Title', 'rehub-theme' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'options'   => \Elementor\Control_Icon::get_icons(),
                'default' => 'Criteria name',
            ]);

            $repeater->add_control(
                'criterianum',
                [
                    'label' => __( 'Value', 'rehub-theme' ),
                    'type' => Controls_Manager::NUMBER,
                    'default' => 10,
                    'min' => 1,
                    'max' => 10,
                    'step' => 0.5,
                ]
            );             
        $this->add_control( 'criteriablock', [
            'label'    => __( 'Criterias', 'rehub-theme' ),
            'type'     => \Elementor\Controls_Manager::REPEATER,
            'fields'   => $repeater->get_controls(),
            'title_field' => '{{{ criteriatitle }}}',
        ]);                      
    }

    protected function query_fields() {
        $this->add_control( 'id', [
            'type'        => 'select2ajax',
            'label'       => esc_html__( 'Post names', 'rehub-theme' ),
            'description' => esc_html__( 'Choose post to import Review or add review below', 'rehub-theme' ),
            'options'     => [],
            'label_block'  => true,
            'multiple'     => false,
            'callback'    => 'get_name_posts_list',
            'dynamic'     => ['active' => true,],            
        ]);  
        $this->add_control( 'compact', [
            'type'        => \Elementor\Controls_Manager::SWITCHER,
            'label'       => esc_html__( 'Compact view', 'rehub-theme' ),
            'label_on'    => __('Yes', 'rehub-theme'),
            'label_off'   => __('No', 'rehub-theme'),
            'return_value'      => '1',
            'dynamic' => [
                'active' => true,
            ],
            'conditions'  => [
                'terms'   => [
                    [
                        'name'     => 'id',
                        'operator' => '!=',
                        'value'    => '',
                    ],
                ],
            ],            
        ]);                   
    } 

    protected function pros_fields(){
        $this->add_control(
            'prostitle',
            [
                'label' => __('Pros Title', 'rehub-theme'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Positive',
                'dynamic'     => ['active' => true,],
            ]
        );
        $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'prosititle', [
                'label' => __( 'Title', 'rehub-theme' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Positive',
            ]);            
        $this->add_control( 'prosblock', [
            'label'    => __( 'Positives', 'rehub-theme' ),
            'type'     => \Elementor\Controls_Manager::REPEATER,
            'fields'   => $repeater->get_controls(),
            'title_field' => '{{{ prosititle }}}',
        ]);        
    }   

    protected function cons_fields(){
        $this->add_control(
            'constitle',
            [
                'label' => __('Cons Title', 'rehub-theme'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Negatives',
                'dynamic'     => ['active' => true,],
            ]
        );
        $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'consititle', [
                'label' => __( 'Title', 'rehub-theme' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Negative',
            ]);            
        $this->add_control( 'consblock', [
            'label'    => __( 'Negatives', 'rehub-theme' ),
            'type'     => \Elementor\Controls_Manager::REPEATER,
            'fields'   => $repeater->get_controls(),
            'title_field' => '{{{ consititle }}}',
        ]);        
    }     

    /* Widget output Rendering */
    protected function render() {
        $settings = $this->get_settings_for_display();
        $criterias = $prosblock = $consblock = '';
        if ( $settings['criteriablock'] ){
            foreach ($settings['criteriablock'] as $key => $item) {
                $criterias .= $item["criteriatitle"].':'.(float)$item["criterianum"].';';
            }
        } 
        if($criterias){
            $settings['criterias'] = $criterias;
        }
        if ( $settings['prosblock'] ){
            foreach ($settings['prosblock'] as $key => $item) {
                $prosblock .= $item["prosititle"].';';
            }
        } 
        if($prosblock){
            $settings['pros'] = $prosblock;
        }        
        if ( $settings['consblock'] ){
            foreach ($settings['consblock'] as $key => $item) {
                $consblock .= $item["consititle"].';';
            }
        } 
        if($consblock){
            $settings['cons'] = $consblock;
        }   
        if($settings['id']){
            $settings['regular'] = 1;
        }
        echo wpsm_reviewbox( $settings );
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Reviewbox );
