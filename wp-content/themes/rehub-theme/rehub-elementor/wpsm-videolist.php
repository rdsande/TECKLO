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
class WPSM_Video_Playlist_Block_Widget extends Widget_Base {

    /* Widget Name */
    public function get_name() {
        return 'video_mod';
    }

    /* Widget Title */
    public function get_title() {
        return __('Video playlist block', 'rehub-theme');
    }

        /**
     * Get widget icon.
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-thumbnails-down';
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
        $this->start_controls_section( 'general_section', [
            'label' => esc_html__( 'General', 'rehub-theme' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);
        $this->add_control( 'videolinks', [
            'type'        => \Elementor\Controls_Manager::TEXTAREA,
            'label'       => esc_html__( 'Links on videos', 'rehub-theme' ),
            'description'   => __( 'Each link must be divided by COMMA. Works with youtube and vimeo. Example for youtube: https://www.youtube.com/watch?v=ZZZZZZZZZZZ, https://www.youtube.com/watch?v=YYYYYY', 'rehub-theme' ),
            'label_block'  => true,
        ]);
        $this->add_control( 'playlist_type', [
            'type'        => \Elementor\Controls_Manager::SELECT,
            'label'       => esc_html__( 'Playlist type', 'rehub-theme' ),
            'description' => __('Video gallery works only with youtube or vimeo, but not at once. Also, playlist type can be only one on page. Slider type can have multiple instances', 'rehub-theme'),
            'options'     => array(
                'playlist'  => __('Playlist', 'rehub-theme'),
                'slider'    => __('Slider', 'rehub-theme'),
            ),
            'default' => 'playlist'
        ]);
        $this->add_control( 'playlist_auto_play', [
            'type'        => \Elementor\Controls_Manager::SELECT,
            'label'       => esc_html__( 'Autoplay ON / OFF:', 'rehub-theme' ),
            'description' => __('Autoplay does not work on mobile devices (android, windows phone, iOS)', 'rehub-theme'),
            'options'     => array(
                '0'  => __('OFF', 'rehub-theme'),
                '1'    => __('ON', 'rehub-theme'),
            ),
            'default' => '0',
            'condition' => [ 'playlist_type' => 'playlist' ]
        ]);
        $this->add_control( 'playlist_width', [
            'type'        => \Elementor\Controls_Manager::SELECT,
            'label'       => esc_html__( 'Column style', 'rehub-theme' ),
            'options'     => array(
                'full'  => __('Full width', 'rehub-theme'),
                'stack'    => __('Stack', 'rehub-theme'),
            ),
            'default' => 'full',
            'condition' => [ 'playlist_type' => 'playlist' ]
        ]);
        $this->add_control( 'playlist_host', [
            'type'        => \Elementor\Controls_Manager::SELECT,
            'label'       => esc_html__( 'Video host', 'rehub-theme' ),
            'options'     => array(
                'youtube'  => __('Youtube', 'rehub-theme'),
                'vimeo'    => __('Vimeo', 'rehub-theme'),
            ),
            'default' => 'youtube',
        ]);

        $this->end_controls_section();
    }

    /* Widget output Rendering */
    protected function render() {
        $settings = $this->get_settings_for_display();
        echo video_mod_function( $settings );      
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new WPSM_Video_Playlist_Block_Widget );
