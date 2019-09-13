<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php

return array(
	'id'          => 'rehub_top_chart',
	'types'       => array('page'),
	'title'       => __('Comparison chart settings', 'rehub-framework'),
	'priority'    => 'low',
	'mode'        => WPALCHEMY_MODE_EXTRACT,
	'template'    => array(		
		array(
			'type' => 'textbox',
			'name' => 'top_chart_ids',
			'label' => __('Enter post ids for comparison', 'rehub-framework'),
			'description' => __('Set with comma without spaces, example: 2,34,67,88', 'rehub-framework'),			
		),	
		array(
			'type' => 'textbox',
			'name' => 'top_chart_type',
			'label' => __('Enter name of custom post type or leave blank (default, post). For woocommerce - type "product"', 'rehub-framework'),			
		),												
	    array(
			'type'      => 'group',
			'repeating' => true,
			'sortable'  => true,
			'name'      => 'columncontents',
			'title'     => __('Row', 'rehub-framework'),
			'fields'    => array(
				array(
					'type' => 'textbox',
					'name' => 'column_name',
					'label' => __('Set heading name for row', 'rehub-framework'),				
				),			    				
				array(
					'type' => 'select',
					'name' => 'column_type',
					'label' => __('Select generated content:', 'rehub-framework'),
					'items' => array(
						array(
							'value' => 'heading',
							'label' => __('Row heading', 'rehub-framework'),
						),						
						array(
							'value' => 'image',
							'label' => __('Thumbnail with title', 'rehub-framework'),
						),
						array(
							'value' => 'imagefull',
							'label' => __('Thumbnail with title, review score, button and price', 'rehub-framework'),
						),						
						array(
							'value' => 'title',
							'label' => __('Title', 'rehub-framework'),
						),	
						array(
							'value' => 'excerpt',
							'label' => __('Short description', 'rehub-framework'),
						),																							
						array(
							'value' => 'meta_value',
							'label' => __('Meta value', 'rehub-framework'),
						),
						array(
							'value' => 'taxonomy_value',
							'label' => __('Taxonomy value / Woocommerce attribute', 'rehub-framework'),
						),																
						array(
							'value' => 'review_function',
							'label' => __('Editor\'s Review score', 'rehub-framework'),
						),	
						array(
							'value' => 'user_review_function',
							'label' => __('User stars rating', 'rehub-framework'),
						),
						array(
							'value' => 'static_user_review_function',
							'label' => __('Static User stars rating (based on full user reviews)', 'rehub-framework'),
						),						
						array(
							'value' => 'review_link',
							'label' => __('Link on post review', 'rehub-framework'),
						),
						array(
							'value' => 'review_criterias',
							'label' => __('Review Criterias (Editor)', 'rehub-framework'),
						),												
						array(
							'value' => 'affiliate_btn',
							'label' => __('Affiliate button', 'rehub-framework'),
						),
						array(
							'value' => 'woo_attribute',
							'label' => __('Woocommerce attribute by slug', 'rehub-framework'),
						),						
						array(
							'value' => 'woo_review',
							'label' => __('Woocommerce review score', 'rehub-framework'),
						),	
						array(
							'value' => 'woo_btn',
							'label' => __('Woocommerce button with price', 'rehub-framework'),
						),
						array(
							'value' => 'woo_vendor',
							'label' => __('Woocommerce vendor', 'rehub-framework'),
						),																		
						array(
							'value' => 'shortcode',
							'label' => __('Shortcode', 'rehub-framework'),
						),																												
					),
				),
			    array(
			        'type' => 'notebox',
			        'name' => 'nb_1',
			        'label' => __('Note', 'rehub-framework'),
			        'description' => __('By default button will grab data from product review, but you can set your own meta names where data are stored', 'rehub-framework'),
			        'status' => 'normal',
					'dependency' => array(
						'field'    => 'column_type',
						'function' => 'rehub_column_is_btn',
					),			        
			    ),
				array(
					'type' => 'textbox',
					'name' => 'btn_text',
					'label' => __('Insert button text or leave blank', 'rehub-framework'),	
					'dependency' => array(
						'field'    => 'column_type',
						'function' => 'rehub_column_is_btn',
					),					
				),	
				array(
					'type' => 'textbox',
					'name' => 'btn_url',
					'label' => __('Insert meta value where affiliate url is stored', 'rehub-framework'),	
					'dependency' => array(
						'field'    => 'column_type',
						'function' => 'rehub_column_is_btn',
					),					
				),
				array(
					'type' => 'textbox',
					'name' => 'btn_price',
					'label' => __('Insert meta value where affiliate price is stored', 'rehub-framework'),	
					'dependency' => array(
						'field'    => 'column_type',
						'function' => 'rehub_column_is_btn',
					),					
				),															
				array(
					'type' => 'textbox',
					'name' => 'tax_name',
					'label' => __('Enter taxonomy slug', 'rehub-framework'),
					'description' => __('Enter slug of your taxonomy. If you want to get woocommerce attribute, enable checkbox below.', 'rehub-framework'),
					'dependency' => array(
						'field'    => 'column_type',
						'function' => 'rehub_column_is_tax',
					),					
				),
				array(
					'type' => 'textbox',
					'name' => 'woo_attr',
					'label' => __('Enter attribute slug', 'rehub-framework'),
					'description' => __('Enter slug of your woocommerce attribute.', 'rehub-framework'),
					'dependency' => array(
						'field'    => 'column_type',
						'function' => 'rehub_column_is_attr',
					),					
				),				
				array(
					'type' => 'toggle',
					'name' => 'is_attribute',
					'label' => __('Is this woocommerce attribute?', 'rehub-framework'),
					'default' => '0',
					'dependency' => array(
						'field'    => 'column_type',
						'function' => 'rehub_column_is_tax',
					),					
				),							    
				array(
					'type' => 'toggle',
					'name' => 'image_link_affiliate',
					'label' => __('Enable link on affiliate product from thumbnail?', 'rehub-framework'),
					'default' => '0',
					'dependency' => array(
						'field'    => 'column_type',
						'function' => 'rehub_column_is_image',
					),					
				),
				array(
					'type' => 'toggle',
					'name' => 'title_link_affiliate',
					'label' => __('Enable link on affiliate product from title?', 'rehub-framework'),
					'default' => '0',
					'dependency' => array(
						'field'    => 'column_type',
						'function' => 'rehub_column_is_image',
					),					
				),	
				array(
					'type' => 'toggle',
					'name' => 'sticky_header',
					'label' => __('Enable sticky on scroll in this row (expiremental)?', 'rehub-framework'),
					'default' => '0',
					'dependency' => array(
						'field'    => 'column_type',
						'function' => 'rehub_column_is_image',
					),					
				),	
				array(
					'type' => 'toggle',
					'name' => 'enable_diff',
					'label' => __('Enable checkbox for dynamic differences?', 'rehub-framework'),
					'default' => '0',
					'dependency' => array(
						'field'    => 'column_type',
						'function' => 'rehub_column_is_image',
					),					
				),				    
				array(
					'type'      => 'group',
					'repeating' => false,
					'sortable'  => false,
					'name'      => 'column_meta_fields',
					'dependency' => array(
						'field'    => 'column_type',
						'function' => 'rehub_column_is_meta_value',
					),					
					'title'     => __('Value from custom field', 'rehub-framework'),
					'fields'    => array(
						array(
							'type' => 'select',
							'name' => 'column_meta_type',
							'label' => __('Type of meta value', 'rehub-framework'),					
							'items' => array(
								array(
									'value' => 'text',
									'label' => __('Text value', 'rehub-framework'),
								),
								array(
									'value' => 'checkbox',
									'label' => __('Checkbox (true or false)', 'rehub-framework'),
								),	
								array(
									'value' => 'acfmulti',
									'label' => __('ACF multichoice field', 'rehub-framework'),
								),																			
							),
							'default' => 'text',
						),
						array(
							'type'      => 'textbox',
							'name'      => 'column_meta_name',
							'label'     => __('Key (slug) of custom field', 'rehub-framework'),
							'description'     => esc_html__('Find some important', 'rehub-theme').'<a href="http://rehubdocs.wpsoul.com/docs/rehub-theme/list-of-important-meta-fields/" target="_blank"> '.esc_html__('meta keys', 'rehub-theme').'</a>',
						),
						array(
							'type'      => 'textbox',
							'name'      => 'column_meta_prefix',
							'label'     => __('Prefix for field', 'rehub-framework'),
						),
						array(
							'type'      => 'textbox',
							'name'      => 'column_meta_postfix',
							'label'     => __('Postfix for field', 'rehub-framework'),
						),																																												
						array(
							'type' => 'toggle',
							'name' => 'column_customize',
							'label' => __('Customize font size and colors of column?', 'rehub-framework'),
							'default' => '0',
						),
						array(
						    'type' => 'slider',
						    'name' => 'column_meta_value_size',
						    'label' => __('Meta Value Font size', 'rehub-framework'),
						    'description' => __('Default - 15px', 'rehub-framework'),
						    'min' => '10',
						    'max' => '36',
						    'step' => '1',
						    'default' => '',
							'dependency' => array(
								'field' => 'column_customize',
								'function' => 'vp_dep_boolean',
						 	),						    
						),
						array(
						    'type' => 'color',
						    'name' => 'column_meta_value_color',
						    'label' => __('Meta Value Font Color', 'rehub-framework'),
						    'description' => __('Default - #111111', 'rehub-framework'),
						    'default' => '',
						    'format' => 'hex',	
							'dependency' => array(
								'field' => 'column_customize',
								'function' => 'vp_dep_boolean',
						 	),						    					    
						),																					
					),
				),	
				array(
					'type' => 'select',
					'name' => 'top_review_circle',
					'label' => __('Design of rating', 'rehub-framework'),
					'dependency' => array(
						'field'    => 'column_type',
						'function' => 'rehub_column_is_review_function',
					),					
					'items' => array(
						array(
							'value' => '0',
							'label' => __('Simple text', 'rehub-framework'),
						),
						array(
							'value' => '1',
							'label' => __('Circle design', 'rehub-framework'),
						),
						array(
							'value' => '2',
							'label' => __('Star design', 'rehub-framework'),
						),															
					),
					'default' => '2',
				),
				array(
					'type' => 'textbox',
					'name' => 'shortcode_value',
					'label' => __('Enter shortcode', 'rehub-framework'),
					'description' => __('Enter shortcode value. Example, [shortcode]', 'rehub-framework'),
					'dependency' => array(
						'field'    => 'column_type',
						'function' => 'rehub_column_is_short',
					),					
				),															
			),
		),	
		array(
			'type' => 'toggle',
			'name' => 'top_chart_width',
			'label' => __('Make page full width?', 'rehub-framework'),
			'default' => '1',
		),														
		array(
			'type' => 'html',
			'name' => 'shortcode_charts',
			'label' => __('Shortcode', 'rehub-framework'),
			'description' => __('Shortcode', 'rehub-framework'),
			'binding' => array(
				'field' => '',
				'function' => 'top_charts_shortcode',
			)
		),
		array(
			'type' => 'toggle',
			'name' => 'shortcode_charts_enable',
			'label' => __('If enabled - content of chart will be inserted on page only by shortcode above', 'rehub-framework'),
			'default' => '0',
		),									
	),
    'include_template' => 'template-topcharts.php',
);

/**
 * EOF
 */