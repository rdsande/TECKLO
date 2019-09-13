<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Info box Widget class.
 *
 * 'wpsm_box' shortcode
 *
 * @since 1.0.0
 */
class Widget_Wpsm_Box extends Widget_Base {

	/* Widget Name */
	public function get_name() {
		return 'wpsm-box';
	}

	/* Widget Title */
	public function get_title() {
		return __('Info box', 'rehub-theme');
	}

	/* Widget Icon */
	public function get_icon() {
		return 'eicon-alert';
	}

	/* Theme Category */
	public function get_categories() {
		return [ 'helpler-modules' ];
	}

	/* Widget Keywords */
	public function get_keywords() {
		return [ 'box', 'info', 'warning' ];
	}

	/* Widget Controls */
	protected function _register_controls() {

		$this->start_controls_section(
			'section_control_wpsm_box',
			[
				'label' => __('Control', 'rehub-theme'),
			]
		);
		$this->add_control(
			'type',
			[
				'label' => __('Box type', 'rehub-theme'),
				'type' => Controls_Manager::SELECT,
				'default' => 'green',
				'options' => [
					'title' => __('Titlebox', 'rehub-theme'),
					'info' => __('Info', 'rehub-theme'),
					'warning' => __('Warning', 'rehub-theme'), 
					'error' => __('Error', 'rehub-theme'),
					'download' => __('Download', 'rehub-theme'),
					'green' => __('Green color box', 'rehub-theme'),
					'gray' => __('Gray color box', 'rehub-theme'),
					'blue' => __('Blue color box', 'rehub-theme'),
					'red' => __('Red color box', 'rehub-theme'),
					'yellow' => __('Yellow color box', 'rehub-theme'),
					'dashed_border' => __('Dashed', 'rehub-theme'),
					'solid_border' => __('Solid border', 'rehub-theme'),
				]
			]
		);
		$this->add_control(
			'title',
			[
				'label' => __('Title', 'rehub-theme'),
				'type' => Controls_Manager::TEXT,
				'default' => 'Title',
				'condition'   => [ 'type' => 'title' ],
			]
		);	
        $this->add_control( 'color', [
            'label' => __( 'Color', 'rehub-theme' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#fb7203',
            'condition'   => [ 'type' => 'title' ],
            'selectors' => [
                '{{WRAPPER}} .wpsm-titlebox' => 'border-color: {{VALUE}}',
                '{{WRAPPER}} .wpsm-titlebox > strong:first-child' => 'color: {{VALUE}}',
            ],
        ]);			
		$this->add_control(
			'float',
			[
				'label' => __('Box float', 'rehub-theme'),
				'type' => Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [
					'none' =>  __('None', 'rehub-theme'),
					'left' => __('Left', 'rehub-theme'),
					'right' => __('Right', 'rehub-theme'),
				]
			]
		);
		$this->add_control(
			'textalign',
			[
				'label' => __('Text align', 'rehub-theme'),
				'type' => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left' => __('Left', 'rehub-theme'),
					'right' => __('Right', 'rehub-theme'),
					'justify' =>  __('Justify', 'rehub-theme'),
					'center' =>  __('Center', 'rehub-theme'),					
				]
			]
		);		
		$this->add_control(
			'content',
			[
				'label' => __( 'Content', 'rehub-theme' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => __( 'Box Content', 'rehub-theme' ),
				'show_label' => false,
			]
		);

		$this->end_controls_section();

	}
	
	/* Widget output Rendering */
	protected function render() {
		$settings = $this->get_settings_for_display();
		?> 	
			<?php $class = ($settings['type'] == 'title') ? 'wpsm-titlebox wpsm_style_main' : 'wpsm_box';?>
			<div class="<?php echo ''.$class;?> <?php echo ''.$settings['type'];?>_type <?php echo ''.$settings['float'];?>float_box" style="text-align:<?php echo ''.$settings['textalign'];?>;">				
				<?php if ($settings['type'] == 'title'):?>
					<strong><?php echo ''.$settings['title'];?></strong>
				<?php endif;?>
				<i></i>
				<div>
					<?php $mycontent = '<div '.$this->get_render_attribute_string( "content" ).'>'.$settings['content'].'</div>';?>
					<?php echo do_shortcode($mycontent);?>
				</div>
			</div>
	   	<?php	
	}

	protected function _content_template() {
		?>
		<#
		view.addInlineEditingAttributes( 'content', 'advanced' );

		if('title' === settings.type){
			var classbox = 'wpsm-titlebox wpsm_style_main';
		} else {
			var classbox = 'wpsm_box';
		}
		#>
		<div class="{{classbox}} {{{ settings.type }}}_type {{{ settings.float }}}float_box" style="text-align:{{{ settings.textalign }}}">
			<# if (settings.type === 'title'){ #>
				<strong>{{{settings.title}}}</strong>
			<# } #>
			<i></i>			
			<div>
				<div {{{ view.getRenderAttributeString( 'content' ) }}}>{{{ settings.content }}}</div>
			</div>
		</div>
		<?php
	}	

}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_Wpsm_Box );