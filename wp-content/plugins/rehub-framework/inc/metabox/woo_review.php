<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php

return array(
	'id'          => 'rehub_review_woo',
	'types'       => array('product'),
	'title'       => __('Editor Review', 'rehub-framework'),
	'priority'    => 'low',
	'mode'        => WPALCHEMY_MODE_EXTRACT,
	'template'    => array(	
		array(
			'type'      => 'upload',
			'name'      => '_woo_review_image_bg',
			'label'     => __('Add Image to review', 'rehub-framework'),
			'description' => __('In Full width Photo Layout, this image will be visible in top section. In other layouts - in review box', 'rehub-framework'),
		),		
		array(
			'type'      => 'slider',
			'name'      => '_review_post_score_manual',
			'label'     => __('Set overall score', 'rehub-framework'),
			'description' => __('Enter overall score of review or leave blank to auto calculation based on criterias score', 'rehub-framework'),
			'min'       => 0,
			'max'       => 10,
			'step'      => 0.5,					
		),
		array(
			'type'      => 'textbox',
			'name'      => '_review_heading',
			'label'     => __('Review Heading', 'rehub-framework'),
		),		
		array(
			'type'      => 'textarea',
			'name'      => '_review_post_summary_text',
			'label'     => __('Summary Text (optional)', 'rehub-framework'),
		),								 				 													 
		array(
			'type'      => 'textarea',
			'name'      => '_review_post_pros_text',
			'label'     => __('PROS. Place each from separate line (optional)', 'rehub-framework'),
		),
		array(
			'type'      => 'textarea',
			'name'      => '_review_post_cons_text',
			'label'     => __('CONS. Place each from separate line (optional)', 'rehub-framework'),
		),								
		array(
			'type'      => 'group',
			'repeating' => true,
			'sortable'  => true,
			'name'      => '_review_post_criteria',
			'title'     => __('Review Criterias', 'rehub-framework'),
			'fields'    => array(
				array(
					'type'      => 'textbox',
					'name'      => 'review_post_name',
					'label'     => __('Name', 'rehub-framework'),
				),
				array(
					'type'      => 'slider',
					'name'      => 'review_post_score',
					'label'     => __('Score', 'rehub-framework'),
					'min'       => 0,
					'max'       => 10,
					'step'      => 0.5,
				),
			),
		),
	),
);

/**
 * EOF
 */