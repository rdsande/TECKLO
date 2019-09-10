<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php

return apply_filters('rh_layout_builder_fields', array(
	'id'          => 'vcr',
	'types'       => array('page'),
	'title'       => __('Page options', 'rehub-framework'),
	'priority'    => 'low',
	'context'     => 'side',
	'mode'        => WPALCHEMY_MODE_EXTRACT,
	'template'    => array(	
		array(
			'type' => 'radiobutton',
			'name' => 'header_disable',
			'label' => __('How to show header?', 'rehub-framework'),
			'default' => '0',
			'items' => array(
				array(
					'value' => '0',
					'label' => __('Default', 'rehub-framework'),
				),
				array(
					'value' => '1',
					'label' => __('Disable header', 'rehub-framework'),
				),
				array(
					'value' => '2',
					'label' => __('Transparent', 'rehub-framework'),
				),				
			)
		),		
		array(
			'type' => 'toggle',
			'name' => 'menu_disable',
			'label' => __('Disable menu', 'rehub-framework'),
		),			
		array(
			'type' => 'toggle',
			'name' => 'footer_disable',
			'label' => __('Disable footer', 'rehub-framework'),
		),
		array(
			'type' => 'radiobutton',
			'name' => 'content_type',
			'label' => __('Type of content area', 'rehub-framework'),
			'default' => 'normal_post',
			'items' => array(
				array(
					'value' => 'def',
					'label' => __('Default content box', 'rehub-framework'),
				),
				array(
					'value' => 'no_shadow',
					'label' => __('Content box without border', 'rehub-framework'),
				),
				array(
					'value' => 'full_post_area',
					'label' => __('Full width of browser window', 'rehub-framework'),
				),				
			),
			'default' => array(
				'full_post_area',
			),	
		),	
		array(
			'type' => 'toggle',
			'name' => 'bg_disable',
			'label' => __('Disable default background image', 'rehub-framework'),
		),																			
	),
	'include_template' => 'visual_builder.php',
));

/**
 * EOF
 */