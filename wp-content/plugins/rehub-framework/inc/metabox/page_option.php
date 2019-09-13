<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php

return apply_filters('rh_layout_builder_fields', array(
	'id'          => 'page_opt',
	'types'       => array('page'),
	'title'       => __('Page options', 'rehub-framework'),
	'priority'    => 'low',
	'context'     => 'side',
	'mode'        => WPALCHEMY_MODE_EXTRACT,
	'template'    => array(
		array(
			'type' => 'radiobutton',
			'name' => 'content_type',
			'label' => __('Type of content area', 'rehub-framework'),
			'default' => 'def',
			'items' => array(
				array(
					'value' => 'def',
					'label' => __('Content with sidebar', 'rehub-framework'),
				),
				array(
					'value' => 'full_width',
					'label' => __('Full Width Content Box', 'rehub-framework'),
				),
				array(
					'value' => 'full_post_area',
					'label' => __('Full width of browser window', 'rehub-framework'),
				),				
			),
			'default' => array(
				'def',
			),	
		),		
		array(
			'type' => 'radiobutton',
			'name' => '_header_disable',
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
			'name' => '_title_disable',
			'label' => __('Disable title', 'rehub-framework'),
		),
		array(
			'type' => 'toggle',
			'name' => '_enable_preloader',
			'label' => __('Enable preloader', 'rehub-framework'),
		),			
		array(
			'type' => 'toggle',
			'name' => '_enable_comments',
			'label' => __('Enable comments', 'rehub-framework'),
		),					
		array(
			'type' => 'toggle',
			'name' => 'menu_disable',
			'label' => __('Disable menu', 'rehub-framework'),
		),			
		array(
			'type' => 'toggle',
			'name' => '_footer_disable',
			'label' => __('Disable footer', 'rehub-framework'),
		),	
		array(
			'type' => 'toggle',
			'name' => 'bg_disable',
			'label' => __('Disable default background image', 'rehub-framework'),
		),																			
	),
	'include_template' => 'def_page.php',
));

/**
 * EOF
 */