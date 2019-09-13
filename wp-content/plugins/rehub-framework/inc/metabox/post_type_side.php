<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php $def_p_types = REHub_Framework::get_option('rehub_ptype_formeta');?>
<?php $def_p_types = (!empty($def_p_types[0])) ? (array)$def_p_types : array('post', 'blog')?>
<?php

return array(
	'id'          => 'rehub_post_side',
	'types'       => $def_p_types,
	'title'       => __('Post settings', 'rehub-framework'),
	'priority'    => 'low',
	'mode'        => WPALCHEMY_MODE_EXTRACT,
	'context'     => 'side',
	'template'    => array(

		array(
			'type' => 'textbox',
			'name' => 'read_more_custom',
			'label' => __('Read More custom text', 'rehub-framework'),
			'description' => __('Will be used in some blocks instead of default read more text', 'rehub-framework'),
			'default' => '',
		),	

		array(
			'type' => 'textbox',
			'name' => '_notice_custom',
			'label' => __('Custom notice', 'rehub-framework'),
			'description' => __('Will be used as custom notice, for example, for cashback', 'rehub-framework'),
			'default' => '',
		),		

		array(
			'type' => 'select',
			'name' => '_post_layout',
			'label' => __('Post layout', 'rehub-framework'),
			'default' => 'normal_post',
			'items' => array(
				'data' => array(
					array(
						'source' => 'function',
						'value'  => 'rehub_get_post_layout_array',
					),
				),
			),			
		),			

		array(
			'type' => 'radiobutton',
			'name' => 'post_size',
			'label' => __('Post w/ sidebar or Full width', 'rehub-framework'),
			'default' => 'normal_post',
			'items' => array(
				array(
					'value' => 'normal_post',
					'label' => __('Post w/ Sidebar', 'rehub-framework'),
				),
				array(
					'value' => 'full_post',
					'label' => __('Full Width Post', 'rehub-framework'),
				)
			)
		),

		rehub_custom_badge_admin(),

		array(
			'type' => 'toggle',
			'name' => 'show_featured_image',
			'label' => __('Disable Featured Image, Video or Gallery in top part on post page', 'rehub-framework'),
			'default' => '0',
		),		
		array(
			'type' => 'textbox',
			'name' => 'rehub_branded_banner_image_single',
			'label' => __('Branded area', 'rehub-framework'),
			'description' => __('Set any custom code or link to image for branded banner after header ', 'rehub-framework'),
			'default' => '',
		),
		array(
			'type' => 'toggle',
			'name' => 'disable_parts',
			'label' => __('Disable parts?', 'rehub-framework'),
			'description' => __('Check this box if you want to disable tags, breadcrumbs, author box, share buttons in post', 'rehub-framework'),
		), 		

		array(
			'type' => 'toggle',
			'name' => 'show_banner_ads',
			'label' => __('Disable global ads in post', 'rehub-framework'),
			'description' => '',
			'default' => '0',			
		),		
	),
);

/**
 * EOF
 */