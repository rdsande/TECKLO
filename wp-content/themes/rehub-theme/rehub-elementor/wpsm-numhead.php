<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Info box Widget class.
 *
 * 'NumHead' shortcode
 *
 * @since 1.0.0
 */
class Widget_NumHead extends Widget_Base {

	/* Widget Name */
	public function get_name() {
		return 'wpsm-numhead';
	}

	/* Widget Title */
	public function get_title() {
		return __('Numbered Heading', 'rehub-theme');
	}

	/* Widget Icon */
	public function get_icon() {
		return 'eicon-counter-circle';
	}

	/* Theme Category */
	public function get_categories() {
		return [ 'helpler-modules' ];
	}

	/* Widget Keywords */
	public function get_keywords() {
		return [ 'heading' ];
	}

	/* Widget Controls */
	protected function _register_controls() {

		$this->start_controls_section(
			'section_control_NumHead',
			[
				'label' => __('Control', 'rehub-theme'),
			]
		);
		$this->add_control(
			'num',
			[
				'label' => __( 'Number', 'rehub-theme' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '1',
			]
		);		
		$this->add_control(
			'heading',
			[
				'label' => __('Heading', 'rehub-theme'),
				'type' => Controls_Manager::SELECT,
				'default' => '2',
				'options' => [
					'1' => __('H1', 'rehub-theme'),
					'2' => __('H2', 'rehub-theme'),
					'3' => __('H3', 'rehub-theme'), 
					'4' => __('H4', 'rehub-theme'),
					'5' => __('H5', 'rehub-theme'),
					'6' => __('H6', 'rehub-theme'),
				]
			]
		);
        $this->add_control( 'color', [
            'label' => __( 'Color', 'rehub-theme' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#fb7203',
            'selectors' => [
                '{{WRAPPER}} .wpsm-numhead.wpsm-style1 span' => 'border-color: {{VALUE}}; color: {{VALUE}}',
            ],
        ]);				
		$this->add_control(
			'content',
			[
				'label' => __( 'Content', 'rehub-theme' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Heading text', 'rehub-theme' ),
			]
		);

		$this->end_controls_section();

	}
	
	/* Widget output Rendering */
	protected function render() {
		$settings = $this->get_settings_for_display();
		?> 	
			<div class="wpsm-numhead wpsm-style1">
				<span><?php echo intval($settings['num']);?></span>				
				<h<?php echo esc_attr($settings['heading']);?> <?php echo ''.$this->get_render_attribute_string( "content" );?>><?php echo ''.$settings['content'];?></h<?php echo esc_attr($settings['heading']);?>>
			</div>
	   	<?php	
	}

	protected function _content_template() {
		?>
		<#
		view.addInlineEditingAttributes( 'content', 'basic' );
		#>
		<div class="wpsm-numhead wpsm-style1">
			<span>{{{ settings.num }}}</span>				
			<h{{{ settings.heading }}} {{{ view.getRenderAttributeString( 'content' ) }}}>{{{ settings.content }}}</h{{{ settings.heading }}}>
		</div>		
		<?php
	}	

}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_NumHead );